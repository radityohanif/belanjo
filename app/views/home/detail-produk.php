<div class="mt-7 container">
	<div class="row">

		<!-- Flash Message -->
		<?php Flasher::flash(); ?>

		<div class="col-4">
			<?php $img_src = BASEURL . '/asset/' . $data['produk']['kategori'] . '/' . $data['produk']['nama'] . '.' . $data['produk']['format_foto'];?>
			<img src="<?= $img_src; ?>" alt="Foto Produk" style="width: 200px;">
		</div>
		<div class="col">
			<div class="row" style="text-align: right;">
				<div class="col">
					<a href="<?= BASEURL ?>/home/etalase/<?= $data['produk']['username_mitra']; ?>" class="text-green"><b><?= $data['produk']['username_mitra']; ?></b></a>
					<p>Jawa Barat, Pondok Rajeg</p>
				</div>
				<div class="col-2">
					<?php 

						// $namaFoto = $data['mitra']['username'] . '.' .  $data['mitra']['format_foto'];
						$img_src = BASEURL . '/asset/userprofile/' . $data['mitra']['foto'];

					?>
					<img src="<?= $img_src; ?>" alt="Foto Produk" style="width: 60px; height: 60px; border-radius: 100%; object-fit: cover;">
				</div>
			</div>
			<div class="row">
				<h2 class="display-5"><?= $data['produk']['nama']; ?></h2>
				<h3 class="text-green mb-3">Rp. <?= PRICER::setPrice($data['produk']['harga']); ?></h3>
				<p><?= $data['produk']['deskripsi']; ?></p>
				<form action="<?= BASEURL ?>/keranjang/tambah/<?= $data['produk']['id_produk']; ?>">
					<button class="btn btn-green">Tambahkan ke keranjang</button>
				</form>
			</div>
		</div>
	</div>
</div>