<?php 

class Signup extends Controller
{
	public function index()
	{
		$this->cek_session();
		$data['title'] = 'Sign Up';
		$this->view('templates/header', $data);
		$this->view('sign up/index');
		$this->view('templates/footer');
	}
	public function register($type)
	{
		$this->cek_session();
		switch ($type)
		{
			case 'customer':
				$data['title'] = 'Register Customer';
				$this->view('templates/header', $data);
				$this->view('sign up/register/customer', $data);
				$this->view('templates/footer');
				break;

			case 'mitra':
				$data['title'] = 'Register Mitra';
				$this->view('templates/header', $data);
				$this->view('sign up/register/mitra', $data);
				$this->view('templates/footer');
				break;
		}
	}	

	public function daftar($type)
	{
		switch ($type)
		{
			case 'customer':
				switch($this->model('Customer_model')->daftar($_POST))
				{
					case -1:
						Flasher::setFlash('username sudah pernah digunakan', 'danger');
						$data['title'] = 'Register Customer';
						$this->view('templates/header', $data);
						$this->view('sign up/register/customer', $data);
						$this->view('templates/footer');
						break;
					case -2:
						Flasher::setFlash('alamat email sudah pernah digunakan', 'danger');
						$data['title'] = 'Register Customer';
						$this->view('templates/header', $data);
						$this->view('sign up/register/customer', $data);
						$this->view('templates/footer');
						break;
					case -3:
						Flasher::setFlash('konfirmasi password salah', 'danger');
						$data['title'] = 'Register Customer';
						$this->view('templates/header', $data);
						$this->view('sign up/register/customer', $data);
						$this->view('templates/footer');
						break;
					case 1:
						Flasher::setFlash('Pendaftaran akun berhasil', 'success');
						header('location:' . BASEURL . '/login');
						break;
				}
				break;

			case 'mitra':
				switch($this->model('Mitra_model')->daftar($_POST))
				{
					case -1:
						Flasher::setFlash('username sudah pernah digunakan', 'danger');
						$data['title'] = 'Register Mitra';
						$this->view('templates/header', $data);
						$this->view('sign up/register/Mitra', $data);
						$this->view('templates/footer');
						break;
					case -2:
						Flasher::setFlash('alamat email sudah pernah digunakan', 'danger');
						$data['title'] = 'Register Mitra';
						$this->view('templates/header', $data);
						$this->view('sign up/register/Mitra', $data);
						$this->view('templates/footer');
						break;
					case -3:
						Flasher::setFlash('konfirmasi password salah', 'danger');
						$data['title'] = 'Register Mitra';
						$this->view('templates/header', $data);
						$this->view('sign up/register/Mitra', $data);
						$this->view('templates/footer');
						break;
					case 1:
						Flasher::setFlash('Pendaftaran akun berhasil', 'success');
						header('location:' . BASEURL . '/login');
						break;
				}
				break;
		}
	}

}