<div class="container mt-5">
	<h2>Kategori</h2>
	<div class="row mt-5">
		<?php 
			$kategori = array();
			
			$kategori[0]['label'] = 'Makanan';
			$kategori[1]['label'] = 'Minuman';
			$kategori[2]['label'] = 'Bumbu dapur';
			$kategori[3]['label'] = 'Makanan bayi';
			$kategori[4]['label'] = 'Menu diet';

			$kategori[0]['icon'] = 'kategori_food.png';
			$kategori[1]['icon'] = 'kategori_drink.png';
			$kategori[2]['icon'] = 'kategori_bumbu dapur.png';
			$kategori[3]['icon'] = 'kategori_makanan bayi.png';
			$kategori[4]['icon'] = 'kategori_menu diet.png';
		 ?>	
		<?php foreach ($kategori as $k): ?>
			<div class="col text-center">
				<h5 class="mb-3"><?= $k['label'] ?></h5>
				<img src="<?= BASEURL ?>/asset/ui-design/<?= $k['icon'] ?>" alt="kategori" style="width: 100px; height: 100px; object-fit: cover;">
			</div>
		<?php endforeach; ?>
	</div>
</div>