<div class="mt-7 container">
	<?php Flasher::flash(); ?>
	<h2>Selamat Datang</h2>
	<p>di halaman mitra <span><?= $_SESSION['username']; ?></span></p>
	<a href="<?= BASEURL ?>/mitra/produkbaru" class="btn btn-green"><i class="bi bi-plus"></i>Tambah Produk Baru</a>
</div>