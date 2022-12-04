<link rel="stylesheet" href="<?= BASEURL ?>/css/signup.css">
	<div class="">
		<div class="kotak shadow">
			<h1 class="text-center mt-5">SIGN UP</h1>
			<p class="text-center" id="subjudul"> as our mitra</p>
			<div class="row justify-content-center mt-5">
				<div class="col-9">
				
				<!-- Flash Message -->
				<?php Flasher::flash(); ?>

				<!-- Reset Variabel Global $_POST -->
				<?php $_POST = array(); ?>
					
					<form action="<?= BASEURL; ?>/signup/daftar/mitra" method="post">
						<div class="row">
							  <div class="mb-3">
								    <label for="username" class="form-label">Username</label>
									    <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
							  </div>
							  <div class="mb-3">
								    <label for="email" class="form-label">Email Address</label>
								    <input type="text" class="form-control" id="email" name="email" autocomplete="off" required>
							  </div>
						</div>
						<div class="row">
							  <div class="mb-3">
								    <label for="password" class="form-label">Password</label>
								    <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
							  </div>
							  <div class="mb-3">
								    <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
								    <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" autocomplete="off" required>
							  </div>
						</div>
						<button type="submit" class="btn btn-green container-fluid" name="daftar_btn" value="ok">Daftar</button>
						<p class="text-center mt-5">Kamu sudah punya akun? <a href="<?= BASEURL; ?>/login">silahkan login</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="d-flex justify-content-end">
		<img src="<?= BASEURL ?>/asset/ui-design/Illustration Mitra.png" alt="mitra" class="gambar">
	</div>