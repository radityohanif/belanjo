<?php

class Mitra_model
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function daftar($data)
	{
		// ~ inisiasi data input ~
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
			$this->db->query("INSERT INTO akun VALUES('$username', '$password', '$email', 'mitra')");
			$this->db->execute();
			
			# insert into table ~ customer ~ :
			$this->db->query("INSERT INTO mitra(username, foto) VALUES('$username','default.jpg')");
			$this->db->execute();
			return 1;
		}
	}

	public function tambahProduk($data)
	{
		// ~ inisiasi data input ~
		$username_mitra = $_SESSION['username'];
		$nama 			= ucwords(strtolower($_POST['nama']));
		$harga 			= $data['harga'];
		$kategori 		= $data['kategori'];
		$deskripsi		= nl2br($data['deskripsi']);
		$namaFile 		= $_FILES['Gambar']['name'];
		$tmpName 		= $_FILES['Gambar']['tmp_name'];
		
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
		move_uploaded_file($tmpName,'asset/'. $kategori . '/' . $nama . '.' . $ekstensiGambar);

		// ~ kirim ke data ke database ~
		$this->db->query("INSERT INTO produk (username_mitra, nama, harga, kategori, format_foto, deskripsi) VALUES ('$username_mitra', '$nama', '$harga', '$kategori', '$ekstensiGambar', '$deskripsi');");
		$this->db->execute();
		
		// ~ periksa status pengiriman ~
		if($this->db->affectedRows() >= 1) {
			return 1;
			# Kirim Pesan Sukses : Produk $nama_produk berhasil diupload
		}
		else {
			return -2;
			# Kirim Pesan Error : Produk $nama_produk gagal diupload
		}
	}

	public function getAllProduk($username_mitra)
	{
		$this->db->query("SELECT * FROM produk WHERE username_mitra = '$username_mitra'");
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function getUserProfile($username)
	{
		$this->db->query("SELECT * FROM mitra WHERE username = '$username'");
		$this->db->execute();
		return $this->db->single();
	}

	public function hapusProduk($id_produk)
	{
		// DELETE FROM `produk` WHERE `produk`.`id_produk` = 97"?
		$this->db->query("DELETE FROM produk WHERE produk.id_produk = $id_produk");
		$this->db->execute();
		return $this->db->affectedRows();
	}

	public function editUserProfile()
	{
		// ~ inisiasi data input ~
		$username 		= $_SESSION['username'];
		$namaFile 		= $_FILES['Gambar']['name'];
		$tmpName 		= $_FILES['Gambar']['tmp_name'];
		
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
		$this->db->query("UPDATE `mitra` SET `foto` = '$namaFile' WHERE `mitra`.`username` = '$username';");
		$this->db->execute();
	}

	public function editProduk($id_produk)
	{
		// ~ inisiasi data input ~
		$username_mitra = $_SESSION['username'];
		$nama 			= ucwords(strtolower($_POST['nama']));
		$harga 			= $_POST['harga'];
		// $kategori 		= $_POST['kategori'];
		$deskripsi		= nl2br($_POST['deskripsi']);
		// $namaFile 		= $_FILES['Gambar']['name'];
		// $tmpName 		= $_FILES['Gambar']['tmp_name'];
		
		// ~ periksa data input ~
		# cek extensi gambar yang diupload
		// $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		// $ekstensiGambar = explode('.', $namaFile);
		// $ekstensiGambar = strtolower(end($ekstensiGambar));
		// if(!in_array($ekstensiGambar, $ekstensiGambarValid)) 
		// {
		// 	return -1;
		// 	# Kirim Pesan Error : Format gambar yang diizinkan hanya jpg, jpeg dan png
		// }
		
		// ~ lolos pengecekan, gambar siap diupload ~
		// move_uploaded_file($tmpName,'asset/'. $kategori . '/' . $nama . '.' . $ekstensiGambar);
		
		$sql = 
		"
			SELECT nama, format_foto, kategori FROM produk WHERE id_produk = '$id_produk';
		";

		$this->db->query($sql);
		$this->db->execute();
		$old = $this->db->single();

		$namaFileLama = $old['nama'] . '.' . $old['format_foto'];
		$namaFileBaru = $nama . '.' . $old['format_foto'];

		$lokasiFileLama = 'asset/' . $old['kategori'] . '/' . $namaFileLama;
		$lokasiFileBaru = 'asset/' . $old['kategori'] . '/' . $namaFileBaru;


		// periksa apakah file dengan nama tersebut ada ?
		// if(file_exists($lokasiFileLama)){
		// 	die("Filenya ketemu nih alhamdulillah");
		// }
		// else{
		// 	die("Sayang sekali file tidak ditemukan");
		// }


		// update nama file yang ada di direktori biar namanya sinkron dengan nama yang di database
		rename($lokasiFileLama, $lokasiFileBaru);

		
		// ~ kirim ke data ke database ~
		$sql = "
			UPDATE produk
			SET nama = '$nama'
			WHERE id_produk = '$id_produk';

			UPDATE produk
			SET harga = '$harga'
			WHERE id_produk = '$id_produk';

			UPDATE produk
			SET deskripsi = '$deskripsi'
			WHERE id_produk = '$id_produk';
		";
		$this->db->query($sql);
		$this->db->execute();


		
		// ~ periksa status pengiriman ~
		if($this->db->affectedRows() >= 1) {
			return 1;
			# Kirim Pesan Sukses : Produk $nama_produk berhasil diupload
		}
		else {
			return -2;
			# Kirim Pesan Error : Produk $nama_produk gagal diupload
		}
	}

	public function getNotifikasi()
	{
		$username_mitra = $_SESSION['username'];

		$sql = 
		"
			SELECT 
			pembelian.id id_pembelian, pembelian.username_customer, pembelian.nama_penerima, pembelian.alamat_penerima, pembelian.quantity, pembelian.total, pembelian.waktu,
			produk.nama, produk.format_foto, produk.kategori

			FROM pembelian, produk WHERE pembelian.username_mitra = '$username_mitra' AND pembelian.id_produk = produk.id_produk AND pembelian.status = 'menunggu konfirmasi';
		";
		$this->db->query($sql);
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function getJumlahNotifikasi()
	{	
		$username_mitra = $_SESSION['username'];
		$sql = 
		"
			SELECT * FROM pembelian 
			WHERE username_mitra = '$username_mitra'
			AND status = 'menunggu konfirmasi';
		";
		$this->db->query($sql);
		$this->db->execute();
		return $this->db->affectedRows();
	}

	public function konfirmasi_pembelian($id_pembelian)
	{
		# inisiasi data input
		$sql = 
		"
		UPDATE pembelian 
		SET pembelian.status = 'dikonfirmasi'
		WHERE pembelian.id = $id_pembelian;
		";

		$this->db->query($sql);
		$this->db->execute();
		return $this->db->affectedRows();
	}

	public function getDataPenjualan()
	{
		$username_mitra = $_SESSION['username'];
		$sql = 
		"
		SELECT * FROM penjualan 
		WHERE username_mitra = '$username_mitra'
		";
		$this->db->query($sql);
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function getTotalPenjualan()
	{
		$username_mitra = $_SESSION['username'];
		$sql = "SELECT SUM(total) total_penjualan  FROM `penjualan` WHERE username_mitra = '$username_mitra'";
		$this->db->query($sql);
		$this->db->execute();
		return $this->db->single();
	}
}
