
<body>

  <div class="container py-5">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-success">📘 Tutorial Penggunaan Aplikasi SIDOKEP</h2>
      <p class="text-muted">Panduan singkat cara menggunakan sistem informasi pelaporan dokumentasi kegiatan di Puskesmas Kebumen 1.</p>
    </div>

    <!-- Card Video -->
    <div class="card shadow-sm">
      <div class="ratio ratio-16x9">
        <!-- Ganti VIDEO_ID dengan ID video YouTube kamu -->
       <iframe width="560" height="315" src="https://www.youtube.com/embed/QDzh_jDAMvw?si=iZshgfbMfNV7cvnt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
      <div class="card-body text-center">
        <h5 class="card-title mb-3">Cara Menggunakan Aplikasi SIDOKEP</h5>
        <p class="card-text text-muted">
          Video ini menjelaskan langkah-langkah login, membuat laporan kegiatan, serta cara melihat laporan yang sudah dikirim.
        </p>
      </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center mt-5">
      <a href="<?= base_url('home') ?>" class="btn btn-success px-4">← Kembali ke Beranda</a>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
