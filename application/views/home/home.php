<body style="background-color: #e8f5e9;">
    <!-- Hero Section (perbaikan: wave menempel di bawah) -->
    <style>
        /* tambahkan ini di <head> atau file CSS utama */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            /* supaya wave bisa ditempatkan di paling bawah */
            justify-content: center;
            background: linear-gradient(135deg, #43a047, #a5d6a7);
            position: relative;
            overflow: hidden;
            /* jaga agar tidak ada overflow */
            padding-bottom: 0;
        }

        .hero .hero-content {
            flex: 1;
            /* membuat konten mengisi ruang sehingga wave berada di bawah */
            display: flex;
            align-items: center;
        }

        /* SVG wave stretch penuh dan selalu terlihat */
        .wave-svg {
            display: block;
            width: 100%;
            height: 120px;
            /* tinggi wave — ubah sesuai selera (80-160) */
        }

        /* kalau perlu menyesuaikan letak image supaya tidak mentok */
        .hero img {
            max-width: 100%;
            height: auto;
            border-radius: .75rem;
        }
    </style>

    <section id="home" class="hero">
        <div class="container hero-content my-5">
            <div class="row align-items-center g-4">
                <!-- Teks -->
                <div class="col-lg-6 text-white">
                    <h1 class="display-4 fw-bold mb-3">
                        Selamat Datang di <span class="text-warning">Puskesmas Kebumen 1</span>
                    </h1>
                    <p class="lead mb-4">
                        Aplikasi digital untuk <b>dokumentasi kegiatan</b> dan <b>laporan terintegrasi</b>.
                        Mudahkan proses kerja Anda dengan sistem modern, cepat, dan transparan.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="<?= base_url('home/tutorial') ?>" class="btn btn-outline-light btn-lg px-4">ℹ️ Pelajari</a>
                    </div>
                </div>

                <!-- Ilustrasi -->
                <div class="col-lg-6 text-center">
                    <img src="<?= base_url('assets/img/home/hero.png') ?>" alt="Ilustrasi Puskesmas" class="">
                </div>
            </div>
        </div>

        <!-- Wave SVG (letakkan di dalam section — ini membuatnya selalu menempel di bawah) -->
        <svg class="wave-svg" viewBox="0 0 1440 320" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <!-- ubah fill jika kamu ingin warna lain (mis. ##e8f5e9 untuk transisi ke section putih) -->
            <path fill="#e8f5e9" d="M0,192L80,213.3C160,235,320,277,480,277.3C640,277,800,235,960,218.7C1120,203,1280,213,1360,218.7L1440,224L1440,320L0,320Z"></path>
        </svg>
    </section>

    <!-- Tentang -->
    <section id="tentang" class="py-5">
        <div class="container">
            <div class="row align-items-stretch g-4">
                <!-- Gambar -->
                <div class="col-md-6">
                    <div class="h-100">
                        <img src="<?= base_url('assets/img/home/jumbotron.jpg') ?>"
                            class="img-fluid rounded-3 shadow h-100 w-100 object-fit-cover"
                            alt="Tentang Puskesmas">
                    </div>
                </div>
                <!-- Teks -->
                <div class="col-md-6 d-flex">
                    <div class="card border-0 shadow h-200 w-100 rounded-3"
                        style="border-left: 8px solid #2e7d32;">
                        <div class="card-body d-flex flex-column justify-content-center rounded" style="background: linear-gradient(160deg, #43a047, #a5d6a7);">
                            <h2 class="card-title mb-3 fw-bold text-white" style="-webkit-text-stroke: 6px green; paint-order: stroke fill;">Tentang Aplikasi</h2>
                            <p class="card-text text-white">
                                Aplikasi ini dibuat untuk mendukung <b>digitalisasi di Puskesmas Kebumen 1</b>.
                                Melalui sistem ini, dokumentasi foto kegiatan dapat diunggah dan disimpan dengan rapi,
                                sehingga memudahkan proses <i>pelaporan</i>, <i>evaluasi</i>, dan meningkatkan <b>transparansi</b>.
                            </p>
                            <ul class="text-white">
                                <li>✅ Mudah digunakan oleh pegawai</li>
                                <li>🔒 Data aman & terstruktur</li>
                                <li>⚡ Mempercepat pembuatan laporan</li>
                            </ul>
                            <a href="#unggah" class="btn btn-success mt-3 w-50">Coba Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur -->
    <section id="fitur" class="py-5 bg-light" style="background: linear-gradient(135deg, #43a047, #a5d6a7);">
        <div class="container text-center">
            <h1 class="mb-4 fw-bold text-success" style="-webkit-text-stroke: 6px white; paint-order: stroke fill;">Fitur Aplikasi</h1>
            <div class="row g-4">

                <!-- Fitur 1 -->
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 h-100 border-0">
                        <h3 class="card-title">Pelaporan Praktis</h3>
                        <img src="<?= base_url('assets/img/home/upload_foto.png') ?>"
                            class="my-5 mx-auto" alt="Upload Foto" style="width:180px; height:180px;">
                        <p class="card-text text-muted">
                            Pegawai dapat mendokumentasikan kegiatan dengan mudah dan efisien. Laporan menjadi lebih lengkap dan tertata, sehingga proses pelaporan dapat dilakukan lebih cepat, praktis, dan terintegrasi tanpa perlu langkah yang rumit.
                        </p>
                    </div>
                </div>

                <!-- Fitur 2 -->
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 h-100 border-0">
                        <h3 class="card-title">Manajemen Data</h3>
                        <img src="<?= base_url('assets/img/home/manajemen_data.png') ?>"
                            class="my-5 mx-auto" alt="Manajemen Data" style="width:180px; height:180px;">
                        <p class="card-text text-muted">
                            Semua kegiatan tersimpan rapi berdasarkan nama dan tanggal, sehingga mudah direkap dan dicari kembali kapan saja. Dengan sistem ini, pegawai dapat mengelola data laporan secara efisien, serta memastikan setiap dokumentasi tercatat dengan jelas dan terstruktur.
                        </p>
                    </div>
                </div>

                <!-- Fitur 3 -->
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 h-100 border-0">
                        <h3 class="card-title">Data Lebih Aman</h3>
                        <img src="<?= base_url('assets/img/home/laporan.png') ?>"
                            class="my-5 mx-auto" alt="Laporan Cepat" style="width:180px; height:180px;">
                        <p class="card-text text-justify text-muted">
                            Semua data tersimpan dengan aman dan rapi dalam sistem, sehingga meminimalkan risiko kehilangan atau kesalahan pencatatan. Dengan penyimpanan yang terpusat, data laporan lebih mudah diakses dan dikelola, serta dapat digunakan kembali kapan pun dibutuhkan.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Unggah Foto Kegiatan -->
    <section id="unggah" class="py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- Teks Deskripsi -->
                <div class="col-md-6">
                    <h2 class="fw-bold text-success mb-3">Unggah Foto Kegiatan</h2>
                    <p class="text-muted mb-4">
                        Dokumentasikan setiap kegiatan di Puskesmas Kebumen 1 dengan lebih mudah.
                        Semua foto akan tersimpan rapi dalam sistem sehingga memudahkan pelaporan.
                        Mulailah menambahkan kegiatan baru dan unggah dokumentasi Anda di halaman berikut.
                        Loginlah dahulu sebelum melaporkan kegiatanmu.
                    </p>
                    <a href="<?= base_url('lapor') ?>" class="btn btn-success btn-lg rounded-pill shadow">
                        + Tambah Kegiatan
                    </a>
                </div>

                <!-- Gambar Ilustrasi -->
                <div class="col-md-6 text-center">
                    <img src="<?= base_url('assets/img/home/upload_kegiatan.png') ?>"
                        alt="Unggah Foto Kegiatan" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

</body>