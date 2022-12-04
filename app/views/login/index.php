<style type="text/css">
	body{
		background: linear-gradient(160deg, limegreen 0%, darkgreen 100%);
		color: white;
	}
	section{
		display: block;
		width: 50%;
		position: relative;
		top: 30;
		margin: auto;
		border-radius: 20px;
	}
	a{
		color: yellow;
		text-decoration: none;	
	}
	a:hover{
		color: white;
	}
	.btn-green:active{
		background-color: green;
	}
</style>
<section class="" data-aos="fade-down">
	<h1 class="text-center mt-5 mb-5">Login</h1>
	<div class="row justify-content-center mt-2">
		<div class="col-8">
			
			<!-- Flash Message -->
			<?php Flasher::flash(); ?>

			<form action="<?= BASEURL; ?>/login/masuk" method="post">
				  <div class="mb-3">
					    <label for="email" class="form-label">Email</label>
					    <input type="Email" class="form-control" id="email" name="email" autocomplete="off" required>
				  </div>
				  <div class="mb-3">
					    <label for="password" class="form-label">Password</label>
					    <input type="password" class="form-control" id="password" name="password" required>
				  </div>
				  <button type="submit" class="btn btn-green container-fluid" name="login_btn" value="ok">Login</button>
				  <p class="text-center mt-5 mb-5">Kamu belum punya akun? <a href="<?= BASEURL; ?>/signup">silahkan daftar dulu</a></p>
			</form>
		</div>
	</div>
</section>