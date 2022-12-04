<?php 

class Produk_model
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getProduk($kategori, $jumlah)
	{
		$this->db->query("SELECT * FROM produk WHERE kategori = '$kategori' LIMIT $jumlah");
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function getDetailProduk($id_produk)
	{
		$this->db->query("SELECT * FROM produk WHERE id_produk = $id_produk");
		$this->db->execute();
		return $this->db->single();
	}

	public function cariProduk($keyword)
	{
		$this->db->query("SELECT *  FROM produk WHERE nama LIKE '%$keyword%'")	;
		$this->db->execute();
		if($this->db->affectedRows() < 1)
		{
			# produk tidak tersedia
			return -1;
		}
		else
		{
			return $this->db->resultSet();
		}
	}
}