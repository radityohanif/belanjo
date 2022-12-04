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
                        <a class="nav-link" href="<?= BASEURL; ?>/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/signup">Sign Up</a>
                    </li>
                    <form class="d-flex" action="<?= BASEURL; ?>/cari" method="post">
                        <input class="form-control me-2" type="search" placeholder="" aria-label="Search" name="keyword">
                        <button class="btn btn-green" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
<!-- Akhir Navbar -->
