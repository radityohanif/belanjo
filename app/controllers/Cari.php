<?php

class Cari extends Controller
{
	public function index()
	{
		$data['title'] = 'Hasil Pencarian';
		$this->view('templates/header', $data);
		$this->view('templates/header', $data);
		if(isset($_SESSION['type'])){
			if($_SESSION['type'] == 'customer'){
				$this->view('templates/navbar-customer');
			}
		}
		else{
			$this->view('templates/navbar-umum');
		}

		$data['hasil_pencarian'] = $this->model('Produk_model')->cariProduk($_POST['keyword']);

		switch ($data['hasil_pencarian']) {
			case -1 :
				# Produk yang dicari tidak tersedia
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<h5 class='text-center'>Maaf, produk yang kamu maksud tidak tersedia</h5>";
				break;
			
			default:
				echo "<br>";
				echo "<br>";
				echo "<br>";
				$this->create_list_produk_cari('Hasil Pencarian', $data['hasil_pencarian']);
				break;
		}
 	}
}