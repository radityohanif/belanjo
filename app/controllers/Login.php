<?php

class Login extends Controller
{
	private $db;
	
	public function index()
	{	
		$this->cek_session();
		$data['title'] = 'Login';
		$this->view('templates/header', $data);
		$this->view('login/index');
		$this->view('templates/footer');
	}

	public function masuk()
	{
		$this->cek_session();
		switch ($this->model('Login_model')->masuk($_POST))
		{
			case -1:
				Flasher::setFlash('Login gagal, alamat email tidak terdaftar', 'danger');
				header('Location:' . BASEURL . '/login');
				break;

			case -2:
				Flasher::setFlash('Login gagal, password salah', 'danger');
				header('Location:' . BASEURL . '/login');
				break;

			case 1:
				# ~ login berhasil ~
				# ambil informasi detail akun dari database berdasarkan emailnya
				$akun = $this->model('Login_model')->getAkunDetail($_POST['email']);

				# inisiasi variabel session untuk user
				$_SESSION['type'] = $akun['type'];
				$_SESSION['email'] = $akun['email'];
				$_SESSION['username'] = $akun['username'];
				
				# masuk ke halaman dashboard sesuai dengan jenis akun
				switch ($_SESSION['type'])
				{
					case 'customer':
						header('location:' . BASEURL . '/customer');
						break;
					case 'mitra':
						header('location:' . BASEURL . '/mitra');
						break;
				}
				break;
		}
	}
}