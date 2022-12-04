<style>
	.inline-group {
	  max-width: 9rem;
	  padding: .5rem;
	}

	.inline-group .form-control {
	  text-align: center;
	}

	.form-control[type="number"]::-webkit-inner-spin-button,
	.form-control[type="number"]::-webkit-outer-spin-button {
	  -webkit-appearance: none;
	  margin: 0;
	}
</style>


<!-- $data['belanjaan'] -->
<div class="container mt-7">

	<?php Flasher::flash(); ?>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

	<h2 class="mb-5">Keranjang Belanja</h2>
	<?php for ($i=0 ; $i < count($data['belanjaan']); $i++): ?>
		<div class="row container-fluid shadow mb-5 p-3">
			<div class="col-3">
				<img style="width: 150;" src="<?= BASEURL ?>/asset/<?= $data['belanjaan'][$i]['kategori'] ?>/<?= $data['belanjaan'][$i]['nama'] ?>.<?= $data['belanjaan'][$i]['format_foto'] ?>" alt="foto belanjaan">
			</div>
			<div class="col-7">
				<h5><?= $data['belanjaan'][$i]['nama']; ?></h5>
				<h5 class="text-green">Rp. <?= PRICER::setPrice($data['belanjaan'][$i]['harga']); ; ?></h5>
				<div class="row">
					<!-- Form Jumlah Produk -->
					<form action="<?= BASEURL ?>/keranjang/edit/<?= $data['belanjaan'][$i]['id_produk'] ?>" method="post">
						<div class="input-group inline-group">
						  <div class="input-group-prepend">
						    <a class="btn btn-outline-success btn-minus" style="height: 40px; ">
						      <i class="fa fa-minus" style="line-height: 30px;"></i>
						    </a>
						  </div>
						  <input class="form-control" min="1" name="quantity" value="<?= $data['keranjang_belanja'][$i]['quantity'] ?>" type="number" class="quantity">
						  <div class="input-group-append">
						    <a class="btn btn-outline-success btn-plus" style="height: 40px;">
						      <i class="fa fa-plus" style="line-height: 30px;"></i>
						    </a>
						  </div>
						</div>
					</div>
				</div>
				<div class="col align-self-center">
					<div class="row mb-2">
						<a href="<?= BASEURL ?>/keranjang/hapus/<?= $data['keranjang_belanja'][$i]['id']; ?>" class="btn btn-danger container-fluid">Hapus</a>
					</div>
					<div class="row">
						<button type="submit" class="btn btn-primary container-fluid">Edit</button>
					</div>
			</div>
			</form>
		</div>
	<?php endfor; ?>
</div>
<br><br><br><br>



<!-- Checkout Section -->
 <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-bottom" style="padding: 30px;">
 	<ul class="navbar-nav ms-auto" style="position: relative;">
 		<li class="nav-item">
		 	<a href="" class="btn btn-green" style="width: 300px; background: limegreen; color: white;" data-bs-toggle="modal" data-bs-target="#exampleModal"><b><i class="bi bi-arrow-right-circle-fill"></i> Checkout</b></a>
 		</li>
 	</ul>
	<h5 style="position: absolute;"><i class="bi bi-cash-stack"></i> Total Tagihan = <b><span style="color: limegreen">Rp. <?= PRICER::setPrice($data['checkout']['total']) ?></span></b></h5>
 </nav>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Checkout Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/keranjang/checkout" method="post">
	        <div class="mb-3">
					    <label for="nama_penerima" class="form-label">Nama Penerima</label>
					    <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" autocomplete="off" required>
				  </div>
				  <div class="mb-3">
				    <label for="alamat_penerima" class="form-label">Alamat Penerima</label>
				    <textarea class="form-control" name="alamat_penerima" id="alamat_penerima" cols="30" rows="5" style="resize: none;" required></textarea>
				  </div>
				  <br>
				  <h5 class="display-5 fs-2" style="text-align: right; color: limegreen;"><b>Total Tagihan Rp. <?= PRICER::setPrice($data['checkout']['total']) ?></b></h5>
				  <br>
				  <div class="mb-3 mt-3">
				    <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
				    <select class="form-select" name="metode_pembayaran" id="metode_pembayaran" required>
				    	<option value="Cash On Delivery">Cash On Delivery</option>
				    </select>
				  </div>
      </div>
<!-- titip data di variabel $_POST -->
<?php

$_SESSION['belanjaan'] = $data['belanjaan'];
$_SESSION['keranjang_belanja'] = $data['keranjang_belanja'];

?>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Bayar</button>
      </div>
        </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script>
	$('.btn-plus, .btn-minus').on('click', function(e) {
	  const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
	  const input = $(e.target).closest('.input-group').find('input');
	  if (input.is('input')) {
	    input[0][isNegative ? 'stepDown' : 'stepUp']()
	  }
	})
</script>