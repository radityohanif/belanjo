<?php

class Home extends Controller
{
	public function index()
	{
		$this->cek_session();
		$data['title'] = 'Home';		
		$this->view('templates/header', $data);
		$this->view('templates/navbar-umum');
		$this->view('templates/slideshow');
		$this->view('home/index', $data);
		$this->create_list_produk('Daily Needs', $this->model('Produk_model')->getProduk('makanan bayi', 8));
		$this->create_list_produk('Weekly Needs', $this->model('Produk_model')->getProduk('makanan pokok', 8));
		$this->create_list_produk('Monthly Needs', $this->model('Produk_model')->getProduk('kebutuhan bulanan', 8));
		$this->view('templates/footer-content');
		$this->view('templates/footer');
	}

	public function produk($id_produk)
	{
		$data['title'] = 'Halaman Detail Produk';
		$data['produk'] = $this->model('Produk_model')->getDetailProduk($id_produk);
		$data['mitra'] = $this->model('Mitra_model')->getUserProfile($data['produk']['username_mitra']);
		// var_dump($data); die;
		$this->view('templates/header', $data);
		if(isset($_SESSION['type'])){
			if($_SESSION['type'] == 'customer'){
				$this->view('templates/navbar-customer');
			}
		}
		else{
			$this->view('templates/navbar-umum');
		}
		$this->view('home/detail-produk', $data);
		$this->view('templates/footer-content');
		$this->view('templates/footer');
	}	

	public function etalase($username_mitra)
	{
		$data['mitra'] = $this->model('Mitra_model')->getUserProfile($username_mitra);
		$data['title'] = 'Etalase ' . $username_mitra;
		$this->view('templates/header', $data);

		if(isset($_SESSION['type'])){
			if($_SESSION['type'] == 'customer'){
				$this->view('templates/navbar-customer');
			}
		}
		else{
			$this->view('templates/navbar-umum');
		}
		
		$this->view('home/etalase', $data);
		$this->create_list_produk('Produk yang dijual', $this->model('Mitra_model')->getAllProduk($username_mitra));
		$this->view('templates/footer-content');
		$this->view('templates/footer');
	}

	public function kategori($kategori)
	{
		$kategori = Kategori::setJudul($kategori);
		$data['title'] = "kategori $kategori" ;
		$this->view('templates/header', $data);
		$this->view('templates/navbar-umum');
		echo "<br>";
		echo "<br>";
		echo "<br>";
		$this->create_list_produk($kategori, $this->model('Produk_model')->getProduk("$kategori", 8));
		$this->view('templates/footer-content');
		$this->view('templates/footer');
	}
}