        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
            <p class="mb-4">Tabel ini berisi data pegawai Puskesmas Kebumen 1. Hanya admin yang dapat melakukan penambahan pegawai. Silahkan menghubungi admin apabila ingin menambahkan pegawai baru.</p>

            <!-- DataTales Example -->
            <div class="row">

                <div class="col-lg-8">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4 p-4">
                        <h1 class="h3 mb-2 text-gray-800">Rincian Kegiatan</h1>
                        <div class="form-group">
                            <label for="pelapor_kegiatan">Pelapor Kegiatan</label>
                            <input type="text" class="form-control" id="pelapor_kegiatan" name="pelapor_kegiatan" value="<?= $laporan['pelapor_kegiatan'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?= $laporan['nama_kegiatan'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tujuan_kegiatan">Tujuan Kegiatan</label>
                            <input type="text" class="form-control" id="tujuan_kegiatan" name="tujuan_kegiatan" value="<?= $laporan['tujuan_kegiatan'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tempat_kegiatan">Tempat Kegiatan</label>
                            <input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan" value="<?= $laporan['tempat_kegiatan'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                            <input type="text" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="<?= date('d F Y',strtotime($laporan['tanggal_kegiatan']));?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="hasil_kegiatan">Notulen Kegiatan</label>
                            <textarea name="hasil_kegiatan" class="form-control" id="hasil_kegiatan" readonly rows="27"><?= $laporan['hasil_kegiatan'] ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow mb-4 p-4">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Foto Kegiatan</h1>
                        <img src="<?= base_url('assets/img/foto_kegiatan/thumb/') . $laporan['foto1'] ?>" class="img-thumbnail" alt="">
                        <img src="<?= base_url('assets/img/foto_kegiatan/thumb/') . $laporan['foto2'] ?>" class="img-thumbnail" alt="">
                        <img src="<?= base_url('assets/img/foto_kegiatan/thumb/') . $laporan['foto3'] ?>" class="img-thumbnail" alt="">
                        <img src="<?= base_url('assets/img/foto_kegiatan/thumb/') . $laporan['foto4'] ?>" class="img-thumbnail" alt="">
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        </div>