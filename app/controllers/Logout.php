<?php

class Logout extends Controller
{
	public function index()
	{
		// mulai session
		session_start();

		// bersihkan session
		session_unset();
		session_destroy();
		$_SESSION = [];
		
		// catat waktu terakhir login user
		// code... (belum ada)

		// arahkan ke halaman utama
		header("location:". BASEURL);
	}
}