<?php 
	$img_src = BASEURL . '/asset/' . $data['produk']['kategori'] . '/' . $data['produk']['nama'] . '.' . $data['produk']['format_foto'];
?>

<div class="row mt-7 justify-content-center">
	<div class="col-10 col-lg-4">
		<img src="<?= $img_src; ?>" alt="Foto Produk" style="width: 300px; margin-bottom: 20px;">
	</div>
	<div class="col-10 col-lg-6">
		<!-- Flash Message -->
		<?php 
			Flasher::flash(); 
		?>
		<form action="<?= BASEURL ?>/mitra/editproduk/<?= $data['produk']['id_produk'] ?>" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				    <label for="nama" class="form-label">Nama Produk</label>
				    <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required value="<?= $data['produk']['nama'] ?>">
			  </div>
			  <div class="mb-3">
				    <label for="harga" class="form-label">Harga</label>
				    <input type="number" class="form-control" id="harga" name="harga" required value="<?= $data['produk']['harga'] ?>">
			  </div>
			  <div class="mb-3">
				    <label for="nama" class="form-label">Deskripsi Produk</label>
				    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" ><?= $data['produk']['deskripsi'] ?></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary container-fluid" name="login_btn" value="ok">Edit Perubahan</button>
		</form>
	</div>
</div>

<script>
	let x = document.getElementById('deskripsi');
	x.value = x.value.replaceAll('<br />', '');
	x.innerHTML = x.value;
</script>