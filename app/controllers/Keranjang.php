<?php 

class Keranjang extends Controller
{
	public function index()
	{
		$data['title'] = 'Keranjang Belanja';
		$this->view('templates/header', $data);
		$this->view('templates/navbar-customer');

		$data['keranjang_belanja'] = $this->model('Customer_model')->get_keranjang_belanja();

		switch ($data['keranjang_belanja']) 
		{
			case -1:
				$this->view('customer/belum-ada-keranjang');
				break;
			default:
				foreach ($data['keranjang_belanja'] as $produk) 
				{
					$data['belanjaan'][] = $this->model('Produk_model')->getDetailProduk($produk['id_produk']);
				}
				$data['checkout'] = $this->model('Customer_model')->getTotalBelanjaan();
				$this->view('customer/keranjang', $data);
				break;
		}
		
		$this->view('templates/footer');
	}

	public function tambah($id_produk)
	{
		# periksa apakah sudah login ?
		if(!(isset($_SESSION['type']))){
			$data['title'] = 'Kamu Harus Login';
			$this->view('templates/header', $data);
			$this->view('templates/navbar-umum');
			$this->view('home/harus-login');
			$this->view('templates/footer');
			die;
		}

		switch ($this->model('Customer_model')->tambah_keranjang_belanja($id_produk)) {
			case 0:
				Flasher::setFlash('Produk gagal ditambahkan ke keranjang belanja', 'danger');
				header('Location:' . BASEURL . '/home/produk/' . $id_produk);
				break;
			default:
				Flasher::setFlash('Produk berhasil ditambahkan ke keranjang belanja', 'success');
				header('Location:' . BASEURL . '/home/produk/' . $id_produk);
				break;
		}
	}

	public function hapus($id_produk)
	{
		if (($this->model('Customer_model')->hapus_keranjang_belanja($id_produk)) > 0) {
			Flasher::setFlash('Produk berhasil dihapus dari keranjang belanja', 'success');
			header('Location:' . BASEURL . '/keranjang');
		}
		else{
			Flasher::setFlash('Produk gagal dihapus dari keranjang belanja', 'danger');
			header('Location:' . BASEURL . '/keranjang');
		}
	}

	public function checkout()
	{
		if($this->model('Customer_model')->checkout() > 0){
			Flasher::setFlash('Pembelian produk berhasil, saat ini pesanan kamu sedang diproses oleh mitra terkait', 'success');
			header('Location:' . BASEURL . '/keranjang');
		}
		else{
			Flasher::setFlash('Pembelian produk gagal, coba lagi beberapa saat nanti', 'danger');
			header('Location:' . BASEURL . '/keranjang');
		}
	}

	public function edit($id_produk)
	{
		if($this->model('Customer_model')->edit_quantity($id_produk) > 0){
			Flasher::setFlash('Produk berhasil di edit', 'success');
			header('Location:' . BASEURL . '/keranjang');
		}
		else{
			Flasher::setFlash('Produk gagal di edit', 'danger');
			header('Location:' . BASEURL . '/keranjang');
		}
	}
}