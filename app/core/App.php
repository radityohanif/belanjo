<?php 

class App{
	// controller, method & parameter default
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

	public function __construct()
	{
		// baca alamat url dengan method parseURL()
		$url = $this->parseURL();

		// jika alamat url tidak kosong
		if(!empty($url))
		{
			// inisiasi controller berdasarkan alamat url (jika ada)
			if(file_exists('../app/controllers/' . $url[0] . '.php'))
			{
				$this->controller = $url[0];
				unset($url[0]);
			}
		}
		// inisiasi object controller
		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		// inisiasi method berdasarkan alamat url (jika ada)
		if(isset($url[1]))
		{
			if(method_exists($this->controller, $url[1]))
			{
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		// inisiasi parameter berdasarkan alamat url (jika ada)
		if(!empty($url))
		{
			$this->params = array_values($url);
		}
		// jalankan method dari controller, serta kirimkan parameter (jika ada)
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL()
	{
		// jika terdapat data pada alamat url, maka rapihkan alamat url-nya
		if(isset($_GET['url']))
		{
			// hilangkan karakter '/' di akhir string
			$url = rtrim($_GET['url'], '/');
			// hilangkan karakter aneh
			$url = filter_var($url, FILTER_SANITIZE_URL);
			// split string dengan seperator '/' lalu ubah hasilnya menjadi array
			$url = explode('/', $url);
			// kembalikan alamat url-nya
			return $url;
		}
	}
}