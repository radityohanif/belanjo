<?php 

class Controller
{
	public function view($view, $data=[])
	{
		require '../app/views/' . $view . '.php';
	}

	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model;
	}

	public function cek_session()
	{
		if(isset($_SESSION['type']))
		{
			switch ($_SESSION['type'])
			{
				case 'customer':
					header('location:' . BASEURL . '/customer');
					break;
				case 'mitra':
					header('location:' . BASEURL . '/mitra');
					break;
			}
		}
	}

	public function create_list_produk($judul, $produk)
	{
		$data['judul'] = $judul;
		$data['produk'] = $produk;
		$this->view('templates/list-produk', $data);
	}

	public function create_list_produk_cari($judul, $produk)
	{
		$data['judul'] = $judul;
		$data['produk'] = $produk;
		$this->view('templates/list-produk-cari', $data);
	}

	public function create_list_produk_mitra($judul, $produk)
	{
		$data['judul'] = $judul;
		$data['produk'] = $produk;
		$this->view('mitra/list-produk', $data);
	}
}