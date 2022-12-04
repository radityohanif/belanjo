<?php

class Login_model
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAkunDetail($email)
	{
		$this->db->query("SELECT * FROM akun WHERE email = '$email'");
		$this->db->execute();
		return $this->db->single();
	}

	public function masuk($data)
	{
		// inisiasi data input
		$email = $data['email'];
		$password = $data['password'];
		// periksa apakah email terdaftar didalam database
		$this->db->query("SELECT * FROM akun WHERE email = '$email'");
		$this->db->execute();
		if($this->db->affectedRows() < 1) {
			// jika tidak ada baris yang terpengaruh, maka email tidak terdaftar, login gagal
			// kirim pesan error
			return -1;
		}
		else {
			// periksa password	
			$this->db->query("SELECT * FROM akun WHERE email = '$email' and password = '$password'");
			$this->db->execute();
			if($this->db->affectedRows() < 1){
				// jika tidak ada baris yang terpengaruh, maka password salah, login gagal
				// kirim pesan error
				return -2;
			}
			else {
				// login berhasil
				// mulai session dan masuk ke halaman dashboard sesuai dengan jenis akun
				return 1;
			}
		}
	}
}