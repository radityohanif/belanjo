<div class="mt-7 container">
	<?php Flasher::flash(); ?>
	<?php $img_src = BASEURL . '/asset/userprofile/' . $data['user']['foto'];?>
	
	<div class="row container justify-content-center mt-2">
		<img src="<?= $img_src ?>" style="margin: auto; width: 220px; height: 200px; border-radius: 100%; object-fit: cover;" alt="foto profil" class="">
		<h1 class="display-5 fs-2 mt-2 text-center"><?= $_SESSION['username'] ?></h1>
		<div class="col-lg-5 col-8">
			<form action="<?= 	BASEURL; ?>/<?= $_SESSION['type']; ?>/editprofile" method="post" enctype="multipart/form-data">
				  <div class="mb-3">
					    <label for="Gambar" class="form-label">Ganti foto</label>
					    <input type="file" class="form-control" id="Gambar" name="Gambar">
						<?php 
						$_FILES['Gambar']['name'] = 'ini nama';
						$_FILES['Gambar']['tmp_name'] = 'ini tmp_name';
						?>
				  </div>
				  <button type="submit" class="btn btn-green container">Edit</button>
			</form>
		</div>
	</div>
</div>
<br>
<br>
<br>