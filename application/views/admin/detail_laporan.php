        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Detail Kegiatan</h1>
            <p class="mb-4">Halaman ini berisi detail rincian kegiatan lengkap dengan foto sebagai bukti dukung yang kuat.</p>

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
                            <label for="jenis_kegiatan">Jenis Kegiatan</label>
                            <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" value="<?= $laporan['jenis_kegiatan'] ?>" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="judul_kegiatan">Judul Kegiatan</label>
                            <input type="text" class="form-control" id="judul_kegiatan" name="judul_kegiatan" value="<?= $laporan['judul_kegiatan'] ?>" readonly>
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
                        <img src="<?= base_url('assets/img/foto_kegiatan/foto/') . $laporan['foto1'] ?>" class="img-thumbnail" alt="">
                        <img src="<?= base_url('assets/img/foto_kegiatan/foto/') . $laporan['foto2'] ?>" class="img-thumbnail" alt="">
                        <img src="<?= base_url('assets/img/foto_kegiatan/foto/') . $laporan['foto3'] ?>" class="img-thumbnail" alt="">
                        <img src="<?= base_url('assets/img/foto_kegiatan/foto/') . $laporan['foto4'] ?>" class="img-thumbnail" alt="">
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <!-- End of Main Content -->

        

        </div>