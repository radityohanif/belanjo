<div class="mt-7 container">
	<?php Flasher::flash(); ?>
	<div class="row text-center">
		<?php $img_src = BASEURL . '/asset/userprofile/' . $data['user']['foto'];?>
		<img src="<?= $img_src ?>" style="margin: auto; width: 220px; height: 200px; border-radius: 100%; object-fit: cover;" alt="foto profil" class="">
		<h1 class="display-5 fs-2 mt-2"><?= $_SESSION['username'] ?></h1>
	</div>
	<div class="row container justify-content-center mt-2">
		<div class="col-5">
			<form action="<?= BASEURL; ?>/<?= $_SESSION['type']; ?>/editprofile" method="post" enctype="multipart/form-data">
				  <div class="mb-3">
					    <label for="Gambar" class="form-label">Ganti foto</label>
					    <input type="file" class="form-control" id="Gambar" name="Gambar" required>
				  </div>
				  <button type="submit" class="btn btn-green container-fluid">Edit</button>
			</form>
		</div>
	</div>
</div>