
<div class="container mt-7">
	<h2 class="mb-5">Laporan Penjualan</h2>
	<table class="table">
	  <thead class="table-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nama Customer</th>
	      <th scope="col">Alamat Customer</th>
	      <th scope="col">Id Produk</th>
	      <th scope="col">Jumlah Pembelian</th>
	      <th scope="col">Total Tagihan</th>
	      <th scope="col">Waktu Pembelian</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 

	  	$i = 1;
	  	foreach($data['penjualan'] as $x):
	  	
	  	?>
		    <tr>
		      <th scope="row"><?= $i ?></th>
		      <td><?= $x['nama_penerima'] ?></td>
		      <td><?= $x['alamat_penerima'] ?></td>
		      <td><?= $x['id_produk'] ?></td>
		      <td><?= $x['quantity'] ?></td>
		      <td><b>Rp. <?= PRICER::setPrice($x['total']) ?></b></td>
		      <td><?= $x['waktu'] ?></td>
		    </tr>
	    <?php 

	    $i++;
	    endforeach;

	     ?>
	  </tbody>
	</table>

	<br>
</div>

