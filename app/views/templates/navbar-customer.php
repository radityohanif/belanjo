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
                        <?php $img_src = BASEURL . '/asset/default.jpg'?> 
                        <a class="nav-link" href="<?= BASEURL; ?>/customer/userprofile">
                            <i class="bi bi-person-fill fs-5"></i>
                            <?= $_SESSION['username']; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/keranjang">
                            <i class="bi bi-cart-fill fs-5"></i>
                            Keranjang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/logout">
                            <i class="bi bi-box-arrow-right fs-5"></i>
                            Logout
                        </a>
                    </li>
                    <form class="d-flex" action="<?= BASEURL; ?>/cari" method="post">
                        <input class="form-control me-2" type="search" aria-label="Search" name="keyword" required>
                        <button class="btn btn-green" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
<!-- Akhir Navbar -->