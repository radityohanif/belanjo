<?php

class Database
{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $password = DB_PASSWORD;
	private $db_name = DB_NAME;

	private $stmt; # Statement
	private $dbh; # Database Handler

	public function __construct()
	{
		# Data Source Name
		$dsn = 'mysql:host='. $this->host .';dbname=' . $this->db_name;

		# Optimasi koneksi ke database menggunakan option
		$option = 
		[
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		# Mencoba membuat koneksi dengan database
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->password, $option);
		} catch(PDOException $error) {
			die($error->getMessage());
		}
	}

	public function query($query) 
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	public function execute() 
	{
		$this->stmt->execute();
	}

	public function affectedRows() 
	{
		return $this->stmt->rowCount();
	}

	# Hasil query > 1
	public function resultSet() 
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	# Hasil query = 1
	public function single() 
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
}