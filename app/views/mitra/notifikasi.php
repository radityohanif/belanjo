<div class="container mt-7">
	<?php 
		Flasher::flash();
	?>
	<h2 class="mb-5">Notifikasi</h2>
	<?php
		$id = 0;
		// var_dump($data['pembelian']);
		// die;
		foreach ($data['pembelian'] as $item): 
	?>
		<div class="row container-fluid shadow mb-5 p-3" id="<?= $id ?>">
			<div class="col-3">
				<img style="width: 150;" src="<?= BASEURL ?>/asset/<?= $item['kategori'] ?>/<?= $item['nama'] ?>.<?= $item['format_foto'] ?>" alt="foto belanjaan">
			</div>
			<div class="col-7">
				<h5><?= $item['nama']; ?></h5>
				<p class="display-5" style="font-size: 15px;"><b><i class="bi bi-person-fill fs-5"></i> dibeli oleh <span style="color:limegreen; font-weight: bold;"><?= $item['username_customer'] ?></span></b></p>
				<p class="display-5" style="font-size: 15px;"><b><i class="bi bi-cart-fill fs-5"></i> Jumlah Barang : <span style="font-weight: bold;"><?= $item['quantity'] ?> buah</span></b></p>
				<p class="display-5" style="font-size: 15px;"><b><i class="bi bi-calendar-check-fill fs-5"></i> Waktu Pembelian : <span style="font-weight: bold;"><?= $item['waktu'] ?></span></b></p>
				<p class="display-5" style="font-size: 15px;"><b><i class="bi bi-tags-fill fs-5"></i> Total Harga : </b></p>
				<h5 class="text-green">Rp. <?= PRICER::setPrice($item['total']); ?></h5>
			</div>
			<div class="col align-self-center">
				<div class="row mb-2">
					<button class="btn btn-primary container-fluid" data-bs-toggle="modal" data-bs-target="#modal-konfirmasi-<?= $id ?>">Konfirmasi Pembelian</button>
				</div>
				<div class="row">
					<button class="btn btn-danger container-fluid" data-bs-toggle="modal" data-bs-target="#modal-pembatalan">Batalkan Pembelian</button>
				</div>
			</div>
		</div>
<!-- Modal Konfirmasi -->
<div class="modal fade" id="modal-konfirmasi-<?= $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembelian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img style="width: 300;" src="<?= BASEURL ?>/asset/<?= $data['pembelian'][$id]['kategori'] ?>/<?= $data['pembelian'][$id]['nama'] ?>.<?= $data['pembelian'][$id]['format_foto'] ?>" alt="">
        <br><br>
        <h4><?= $data['pembelian'][$id]['nama'] ?></h4>
        <br><br>
        <div style="text-align:left;">
        	<p class="display-5" style="font-size: 15px;"><b><i class="bi bi-cart-fill fs-5"></i> Jumlah Barang : <span style="font-weight: bold;"><?= $data['pembelian'][$id]['quantity'] ?> buah</span></b></p>
        	<p class="display-5" style="font-size: 15px;"><b><i class="bi bi-tags-fill fs-5"></i> Total Harga : <span style="font-weight: bold; color: limegreen;">Rp. <?= PRICER::setPrice($data['pembelian'][$id]['total']) ?> </span></b></p>
        	<p class="display-5" style="font-size: 15px;"><b><i class="bi bi-person-fill fs-5"></i> Nama Penerima : <span style="font-weight: bold;"><?= $data['pembelian'][$id]['nama_penerima'] ?></span></b></p>
        	<p class="display-5" style="font-size: 15px; line-height: 30px;"><b><i class="bi bi-house-door-fill fs-5"></i> Alamat Penerima : <span style="font-weight: bold;"><?= $data['pembelian'][$id]['alamat_penerima'] ?></span></b></p>
        </div>
      </div>
      <?php 
	      $id_pembelian = $data['pembelian'][$id]['id_pembelian'];
      ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="document.location.href='<?=  BASEURL ?>/mitra/konfirmasi/<?= $id_pembelian ?>'">Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Pembatalan -->
<!-- <div class="modal fade" id="modal-pembatalan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alasan dibatalkan : </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<input type="radio" id="1" name="alasan" value="Stok barang saat ini sedang habis">
		<label for="1">Stok barang saat ini sedang habis</label><br><br>
		<input type="radio" id="2" name="alasan" value="Pengiriman barang saat ini sedang tidak memungkinkan">
		<label for="2">Pengiriman barang saat ini sedang tidak memungkinkan</label><br><br>
		<input type="radio" id="3" name="alasan" value="Barang tersebut sudah kami tidak jual lagi">
		<label for="3">Barang tersebut sudah kami tidak jual lagi</label><br><br>
		<input type="radio" id="4" name="alasan" value="Alamat penerima kurang spesifik">
		<label for="4">Alamat penerima kurang spesifik</label><br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger">Batalkan Pembelian</button>
      </div>
    </div>
  </div>
</div> -->
	<?php 
		$id++;
		endforeach; 
	?>
</div>
