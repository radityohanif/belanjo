<?php $img_src = BASEURL . '/asset/userprofile/' . $data['mitra']['foto'] ;?>

<link rel="stylesheet" href="<?= BASEURL ?>/css/etalase.css">
<div class="background"></div>
<div class="text-center" style="position: relative; top: -50">
	<img src="<?= $img_src; ?>" alt="Foto Mitra" class="foto-profil shadow" style="width: 150px; height: 150px;border-radius: 100%; object-fit: cover;">
	<p class="display-5 mt-2" style="font-size: xx-large;"><?= $data['mitra']['username']; ?></p>
</div>