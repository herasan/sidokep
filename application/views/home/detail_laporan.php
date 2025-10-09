<body style="background: linear-gradient(160deg, #43a047, #a5d6a7);">
    <!-- Konten -->
    <div class="container py-4">
        <div class="text-center mb-4 text-dark p-4 card shadow-sm">
            <h3 class="page-title">Detail Kegiatan</h3>
            <p class="mb-0">Halaman ini berisi detail rincian kegiatan lengkap dengan foto sebagai bukti dukung yang kuat.</p>
        </div>

        <div class="row g-4">
            <!-- Rincian Kegiatan -->
            <div class="col-lg-8">
                <div class="card p-4">
                    <h5 class="section-title mb-3">Rincian Kegiatan</h5>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pelapor Kegiatan</label>
                        <input type="text" class="form-control" value="<?= $laporan['pelapor_kegiatan'] ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Kegiatan</label>
                        <input type="text" class="form-control" value="<?= $laporan['jenis_kegiatan'] ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Kegiatan</label>
                        <input type="text" class="form-control" value="<?= $laporan['judul_kegiatan'] ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tempat Kegiatan</label>
                        <input type="text" class="form-control" value="<?= $laporan['tempat_kegiatan'] ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Kegiatan</label>
                        <input type="text" class="form-control" value="<?= $laporan['tanggal_kegiatan'] ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Notulen Kegiatan</label>
                        <textarea class="form-control" rows="27" readonly><?= $laporan['hasil_kegiatan'] ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Foto Kegiatan -->
            <div class="col-lg-4">
                <div class="card p-4">
                    <h5 class="section-title mb-3">Foto Kegiatan</h5>
                    <div class="foto-kegiatan">
                        <img src="<?= base_url('assets/img/foto_kegiatan/foto/' . $laporan['foto1']) ?>" class="img-thumbnail" alt="Foto 1" class="img-fluid">
                        <img src="<?= base_url('assets/img/foto_kegiatan/foto/' . $laporan['foto2']) ?>" class="img-thumbnail mt-2" alt="Foto 2" class="img-fluid">
                        <img src="<?= base_url('assets/img/foto_kegiatan/foto/' . $laporan['foto3']) ?>" class="img-thumbnail mt-2" alt="Foto 3" class="img-fluid">
                        <img src="<?= base_url('assets/img/foto_kegiatan/foto/' . $laporan['foto4']) ?>" class="img-thumbnail mt-2" alt="Foto 4" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>