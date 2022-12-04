<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL ?>"><b style="color: limegreen;">BELANJO</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?= BASEURL; ?>/mitra/userprofile">
                            <i class="bi bi-person-fill fs-5"></i>
                            <?= $_SESSION['username']; ?>
                        </a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?= BASEURL; ?>/mitra/penjualan">
                            <i class="bi bi-clipboard-data fs-5"></i>
                            Laporan Penjualan
                        </a>
                    </li> 
                    <li class="nav-item" style="position:relative;"> 
                        <a class="nav-link" href="<?= BASEURL; ?>/mitra/notifikasi">
                            <i class="bi bi-bell-fill fs-5"></i>
                            <?php 
                                if($data['jumlah_notifikasi'] > 0)
                                {
                                    $jumlah_notifikasi = $data['jumlah_notifikasi'];
                                    echo '<span class="badge bg-secondary" style="position:absolute; top: -5; left:15; font-size:10;"><?= $jumlah_notifikasi ?></span>';
                                }
                             ?>
                            Notifikasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/logout">
                            <i class="bi bi-box-arrow-right fs-5"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- Akhir Navbar -->