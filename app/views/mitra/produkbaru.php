<h1 class="text-center mt-7 mb-5">Tambah Produk Baru</h1>
<div class="row justify-content-center mt-2">
  <div class="col-8 col-md-4">

    <!-- Flash Message -->
    <?php Flasher::flash(); ?>

    <form action="<?= BASEURL ?>/mitra/tambahproduk" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" required>
      </div>
      <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select class="form-select" name="kategori" id="kategori" required>
          <option value="makanan pokok">Makanan Pokok</option>
          <option value="makanan bayi">Makanan Bayi</option>
          <option value="minuman">Minuman</option>
          <option value="bumbu dapur">Bumbu Dapur</option>
          <option value="menu diet">Menu Diet</option>
          <option value="kebutuhan harian">Kebutuhan Harian</option>
          <option value="kebutuhan mingguan">Kebutuhan Mingguan</option>
          <option value="kebutuhan bulanan">Kebutuhan Bulanan</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="gambar" class="form-label">Gambar Produk</label>
        <input type="file" class="form-control" name="Gambar" required>
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Deskripsi Produk</label>
        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="tuliskan deksripsi produk kamu disini..."></textarea>
      </div>
      <button type="submit" class="btn btn-green container-fluid" name="login_btn" value="ok">Tambah Produk</button>
    </form>
  </div>
</div>