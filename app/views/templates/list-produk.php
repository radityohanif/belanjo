<!-- List Produk -->
    <div class="mt-5 container" data-aos="fade-up">
        <h2><?= $data['judul'] ?></h2>

        <!-- Row 1 -->
        <div class="row justify-md-content-center">
            <?php foreach ($data['produk'] as $produk): ?>
                <?php $img_src = BASEURL . '/asset/' . $produk['kategori'] . '/' . $produk['nama'] . '.' . $produk['format_foto'];?>
                <div class="col-6 col-md-4 col-lg-3 mt-5">
                    <!-- Card -->
                        <div class="card membesar" style="height: 400px; overflow: hidden;">
                            <div class="card-img-top">
                                <img src="<?= $img_src ?>" class="card-img-top" alt="Gambar Produk" style="height: 200px; object-fit: contain;">
                            </div>
                            <div class="card-body" style="position: relative;">
                                <h5 class="card-title"><?= $produk['nama']; ?></h5>
                                <p class="card-text text-green display-5 fs-5"><b>Rp.<?= PRICER::setPrice($produk['harga']); ?></b></p>
                                <div class="d-grid gap-2" style="position: absolute; bottom: 20; width: 155px;">
                                    <a href="<?= BASEURL ?>/home/produk/<?= $produk['id_produk']; ?>" class="btn btn-green">Beli</a>
                                </div>
                            </div>
                        </div>
                    <!-- Akhir Card -->
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Akhir Row 1 -->
    
    </div>
<!-- Akhir List Produk -->


