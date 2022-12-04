<?php

class Customer_model
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function daftar($data)
	{
		# inisiasi data input
		$username 	= $data['username'];
		$password 	= $data['password'];
		$password_k = $data['konfirmasi_password'];
		$email 		= $data['email'];
		# periksa apakah username sudah pernah digunakan
		$this->db->query("SELECT * FROM akun WHERE username = '$username'");
		$this->db->execute();
		if($this->db->affectedRows() >= 1){
			# jika sudah, register gagal, kirim pesan error
			return -1;
		}
		# periksa apakah email sudah pernah digunakan
		$this->db->query("SELECT * FROM akun WHERE email = '$email'");
		$this->db->execute();
		if($this->db->affectedRows() >= 1){
			# jika sudah, register gagal, kirim pesan error
			return -2;
		}
		# periksa apakah password dan konfirmasi password sudah sama
		else if($password != $password_k){
			# jika tidak, register gagal, kirim pesan error
			return -3;
		}
		# register berhasil, masuk ke halaman login
		else{
			# insert into table ~ akun ~ :
			$this->db->query("INSERT INTO akun VALUES('$username', '$password', '$email', 'customer')");
			$this->db->execute();
			# insert into table ~ customer ~ :
			$this->db->query("INSERT INTO customer(username, foto) VALUES('$username','default.jpg')");
			$this->db->execute();
			# buat tabel keranjang belanja 
			$this->buat_keranjang_belanja($username);
			return 1;
		}
	}

	public function get_keranjang_belanja(){
		$nama_tabel = 'keranjang_' . $_SESSION['username'];	
		$this->db->query("SELECT * FROM `$nama_tabel`");
		$this->db->execute();
		if($this->db->affectedRows() < 1){
			# kirim pesan : keranjang belanja kamu masih kosong nih
			return -1;
		}
		else{
			return $this->db->resultSet();
		}
	}
	
	public function buat_keranjang_belanja($username){
		$nama_tabel = 'keranjang_' . $username;
		$this->db->query("CREATE TABLE `belanjo`.`$nama_tabel` ( `id` INT NOT NULL AUTO_INCREMENT , `id_produk` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
		$this->db->execute();
		$this->db->query("ALTER TABLE `$nama_tabel` ADD FOREIGN KEY (`id_produk`) REFERENCES `produk`(`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;");
		$this->db->execute();
		$this->db->query("ALTER TABLE `$nama_tabel` ADD `quantity` INT NOT NULL AFTER `id_produk`;");
		$this->db->execute();
	}

	public function tambah_keranjang_belanja($id_produk){
		$nama_tabel = 'keranjang_' . $_SESSION['username'];

		# cek apakah produk sudah ada di keranjang
		$this->db->query("SELECT * FROM $nama_tabel WHERE id_produk = $id_produk");
		$this->db->execute();
		if($this->db->affectedRows() > 0){
			# jika produk yang dimaksud sudah ada di keranjang maka update quantity produk tersebut
			$this->db->query("UPDATE $nama_tabel SET quantity = quantity + 1 WHERE id_produk = $id_produk");
			$this->db->execute();
			return $this->db->affectedRows();
		}
		else{
			# jika produk yang dimaksud belum ada di keranjang maka masukkan produk tersebut
			$this->db->query("INSERT INTO `$nama_tabel` (`id_produk`, `quantity`) VALUES ('$id_produk', 1);");
			$this->db->execute();
			return $this->db->affectedRows();
		}
	}

	public function hapus_keranjang_belanja($id){
		$nama_tabel = 'keranjang_' . $_SESSION['username'];
		$this->db->query("DELETE FROM `$nama_tabel` WHERE `$nama_tabel`.`id` = $id;");
		$this->db->execute();
		return $this->db->affectedRows();
	}

	public function getUserProfile($username)
	{
		$this->db->query("SELECT * FROM customer WHERE username = '$username'");
		$this->db->execute();
		return $this->db->single();
	}

	public function editUserProfile()
	{
		// ~ inisiasi data input ~
		$username 		= $_SESSION['username'];
		$namaFile 		= $_FILES['Gambar']['name'];
		$tmpName 		= $_FILES['Gambar']['tmp_name'];
		$nama 			= $_POST['nama'];
		$alamat_rumah 	= $_POST['alamat_rumah'];
		
		// ~ periksa data input ~
		# cek extensi gambar yang diupload
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if(!in_array($ekstensiGambar, $ekstensiGambarValid)) 
		{
			return -1;
			# Kirim Pesan Error : Format gambar yang diizinkan hanya jpg, jpeg dan png
		}
		
		// ~ lolos pengecekan, gambar siap diupload ~
		$namaFile = $username . '.' . $ekstensiGambar;
		move_uploaded_file($tmpName,'asset/userprofile/' . $namaFile);

		// ~ kirim ke data ke database ~
		$this->db->query("UPDATE `customer` SET `foto` = '$namaFile' WHERE `customer`.`username` = '$username';");
		$this->db->execute();
	}

	public function getTotalBelanjaan()
	{
		$namaKeranjang = "keranjang_" . $_SESSION['username'];
			// SELECT SUM(harga) total FROM $namaKeranjang;
		$sql = 
		"
			SELECT SUM(produk.harga * $namaKeranjang.quantity) total
			FROM $namaKeranjang, produk
			WHERE $namaKeranjang.id_produk = produk.id_produk
		";
		$this->db->query($sql);
		return $this->db->single();
	}

	public function checkout()
	{

		$username_customer = $_SESSION['username'];
		$nama_penerima = $_POST['nama_penerima'];
		$alamat_penerima = $_POST['alamat_penerima'];

		# lakukan pengulangan sebanyak jumlah data belanjaan
		for ($i=0 ; $i < count($_SESSION['belanjaan']); $i++)
		{
			$id_produk = $_SESSION['belanjaan'][$i]['id_produk'];
			$quantity = $_SESSION['keranjang_belanja'][$i]['quantity'];
			$total = $_SESSION['belanjaan'][$i]['harga'] * $_SESSION['keranjang_belanja'][$i]['quantity'];
			$sql = 
			"
			INSERT INTO pembelian (username_mitra, username_customer, nama_penerima, alamat_penerima, id_produk, quantity, total, waktu)
			SELECT produk.username_mitra, '$username_customer', '$nama_penerima', '$alamat_penerima', $id_produk, $quantity, $total, NOW()
			FROM produk WHERE produk.id_produk = $id_produk
			";

			$this->db->query($sql);
			$this->db->execute();
		}

		return $this->db->affectedRows();
	}

	public function edit_quantity($id_produk)
	{
		
		$quantity_baru = $_POST['quantity'];
		$namaKeranjang = "keranjang_" . $_SESSION['username'];
		$sql = 
		"
			UPDATE $namaKeranjang SET quantity = $quantity_baru WHERE id_produk = $id_produk;
		";

		$this->db->query($sql);
		$this->db->execute();
		return $this->db->affectedRows();
	}
}