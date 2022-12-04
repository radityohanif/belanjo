<?php

class Customer extends Controller
{
	public function index()
	{
		$data['title'] = 'Halaman Customer';	
		$this->view('templates/header', $data);
		$this->view('templates/navbar-customer', $data);
		$this->view('templates/slideshow');
		$this->view('home/index', $data);
		$this->create_list_produk('Daily Needs', $this->model('Produk_model')->getProduk('makanan bayi', 8));
		$this->create_list_produk('Weekly Needs', $this->model('Produk_model')->getProduk('makanan pokok', 8));
		$this->create_list_produk('Monthly Needs', $this->model('Produk_model')->getProduk('kebutuhan bulanan', 8));
		$this->view('templates/footer-content');
		$this->view('templates/footer');
	}

	public function userprofile()
	{
		$data['title'] = 'User Profile';
		$data['user'] = $this->model('Customer_model')->getUserProfile($_SESSION['username']);
		$this->view('templates/header', $data);
		$this->view('templates/navbar-customer');
		$this->view('customer/user-profile', $data);
		$this->view('templates/footer');
	}

	public function editprofile()
	{
		switch ($this->model('Customer_model')->editUserProfile()) {
			case -1:
				Flasher::setFlash('Informasi akun kamu gagal diperbarui', 'danger');
				break;
			default:
				Flasher::setFlash('Informasi akun kamu berhasil diperbarui', 'success');
				break;
		}
		
		header('Location:' . BASEURL . '/customer/userprofile');
	}
}