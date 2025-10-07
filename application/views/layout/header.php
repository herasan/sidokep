<header class="p-3 sticky-top" style="background-color: #43a047;">
    <div class="container">
        <div
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a
                href="<?= base_url('home') ?>"
                class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="<?= base_url('assets/img/home/logo_puskesmas.png') ?>" style="width: 40px;" alt="" srcset="">
                <h5 class="mb-1" style="margin-right: 25px; margin-left: 8px;">Puskeskmas Kebumen 1</h5>
            </a>
            <ul
                class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?= base_url('home') ?>" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="<?= base_url('home') ?>/#tentang" class="nav-link px-2 text-white">About</a></li>
                <li><a href="<?= base_url('home') ?>/#fitur" class="nav-link px-2 text-white">Feature</a></li>
                <?php if ($this->session->userdata('role') == "Pegawai") : ?>
                    <li><a href="<?= base_url('lapor') ?>" class="nav-link px-2 text-white">Lapor</a></li>
                    <li><a href="<?= base_url('lapor/laporan') ?>" class="nav-link px-2 text-white">MyLaporan</a></li>
                <?php elseif ($this->session->userdata('role') == "Admin" || $this->session->userdata('role') == "Kepala") : ?>
                    <li><a href="<?= base_url('lapor') ?>" class="nav-link px-2 text-white">Lapor</a></li>
                    <li><a href="<?= base_url('lapor/laporan') ?>" class="nav-link px-2 text-white">MyLaporan</a></li>
                    <li><a href="<?= base_url('admin') ?>" class="nav-link px-2 text-white">Webmin</a></li>
                <?php else : ?>
                <?php endif; ?>
            </ul>
            <div class="text-end">
                <?php if (!$this->session->userdata('role')) : ?>
                    <a href="<?= base_url('auth/login') ?>" class="btn btn-outline-light me-2">
                        Login
                    </a>
                <?php elseif ($this->session->userdata('username') && $this->session->userdata('role')) : ?>
                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-priamry btn-warning me-2">
                        Logout
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>