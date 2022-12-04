<?php

class Mitra extends Controller
{
	public function index()
	{
		$data['title'] = 'Halaman Mitra';
		$data['jumlah_notifikasi'] = $this->model('Mitra_model')->getJumlahNotifikasi();
		$this->view('templates/header', $data);
		$this->view('templates/navbar-mitra', $data);
		$this->view('mitra/index');
		$this->create_list_produk_mitra('Daftar Dagangan kamu', $this->model('Mitra_model')->getAllProduk($_SESSION['username']));
		$this->view('templates/footer-content');
		$this->view('templates/footer');
	}

	public function produkbaru()
	{
		$data['title'] = 'Tambah Produk Baru';
		$data['jumlah_notifikasi'] = $this->model('Mitra_model')->getJumlahNotifikasi();
		$this->view('templates/header', $data);
		$this->view('templates/navbar-mitra', $data);
		$this->view('mitra/produkbaru');
		$this->view('templates/footer-content');
		$this->view('templates/footer');
	}

	public function hapusproduk($id_produk)
	{
		switch ($this->model('Mitra_model')->hapusProduk($id_produk)) 
		{
			case -1:
				Flasher::setFlash('Produk gagal dihapus', 'danger');
				header('location:' . BASEURL . '/produkbaru');
				break;

			case 1:
				Flasher::setFlash('Produk berhasil dihapus', 'success');
				header('location:' . BASEURL );
				break;
		}
	}

	public function tambahproduk()
	{
		switch ($this->model('Mitra_model')->tambahProduk($_POST)) 
		{
			case -1:
				Flasher::setFlash('format gambar yang di izinkan hanya jpeg, jpg dan png', 'danger');
				header('location:' . BASEURL . '/produkbaru');
				break;

			case 1:
				Flasher::setFlash('Produk baru sukses ditambahkan', 'success');
				header('location:' . BASEURL );
				break;
		}
	}

	public function userprofile()
	{
		$data['title'] = 'User Profile';
		$data['user'] = $this->model('Mitra_model')->getUserProfile($_SESSION['username']);
		$data['jumlah_notifikasi'] = $this->model('Mitra_model')->getJumlahNotifikasi();
		$this->view('templates/header', $data);
		$this->view('templates/navbar-mitra', $data);
		$this->view('home/user-profile', $data);
		$this->view('templates/footer');
	}

	public function editprofile()
	{
		switch ($this->model('Mitra_model')->editUserProfile()) {
			case -1:
				Flasher::setFlash('Format gambar yang diizinkan hanya jpg, jpeg dan png', 'danger');
				break;
			default:
				Flasher::setFlash('Foto profil kamu berhasil diganti', 'success');
				break;
		}
		
		header('Location:' . BASEURL . '/mitra/userprofile');
	}

	public function produk($id_produk)
	{
		$data['title'] = 'Halaman Detail Produk';
		$data['produk'] = $this->model('Produk_model')->getDetailProduk($id_produk);
		$data['jumlah_notifikasi'] = $this->model('Mitra_model')->getJumlahNotifikasi();
		$this->view('templates/header', $data);
		$this->view('templates/navbar-mitra', $data);
		$this->view('mitra/detail-produk', $data);
		$this->view('templates/footer');
	}

	public function editproduk($id_produk)
	{
		switch ($this->model('Mitra_model')->editProduk($id_produk)) {
			default:
				Flasher::setFlash('Perubahan berhasil disimpan', 'success');
				break;
		}
		header('Location:' . BASEURL . '/mitra/produk/' . $id_produk);
	}

	public function notifikasi()
	{
		$data['pembelian'] = $this->model('Mitra_model')->getNotifikasi();
		$data['title'] = 'Notifikasi kamu';
		$data['jumlah_notifikasi'] = $this->model('Mitra_model')->getJumlahNotifikasi();
		$this->view('templates/header', $data);
		$this->view('templates/navbar-mitra', $data);
		$this->view('mitra/notifikasi', $data);
		$this->view('templates/footer');
	}
	public function konfirmasi($id_pembelian){
		switch ($this->model('Mitra_model')->konfirmasi_pembelian($id_pembelian)) {
			case -1:
				Flasher::setFlash('Pembelian gagal dikonfirmasi', 'danger');
				break;
			default:
				Flasher::setFlash('Pembelian berhasil dikonfirmasi', 'success');
				break;
		}
		
		header('Location:' . BASEURL . '/mitra/notifikasi');
	}

	public function penjualan()
	{
		$data['title'] = 'Laporan Penjualan';
		$data['jumlah_notifikasi'] = $this->model('Mitra_model')->getJumlahNotifikasi();
		$data['penjualan'] = $this->model('Mitra_model')->getDataPenjualan();
		$data['total_penjualan'] = $this->model('Mitra_model')->getTotalPenjualan();
		$this->view('templates/header', $data);
		$this->view('templates/navbar-mitra', $data);
		$this->view('mitra/penjualan', $data);
		$this->view('templates/footer');

	}
}