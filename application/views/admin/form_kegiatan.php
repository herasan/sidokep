        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Kegiatan</h1>
            <p class="mb-4">Tabel ini berisi data kegiatan Puskesmas Kebumen 1. Hanya admin yang dapat melakukan penambahan kegiatan. Silahkan menghubungi admin apabila ingin menambahkan kegiatan baru.</p>

            <!-- DataTales Example -->
            <div class="col-lg-8">
                <div class="card shadow mb-4 p-4">

                    <form action="" method="post">

                        <div class="form-group">
                            <label for="jenis_kegiatan">Kegiatan</label>
                            <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan"
                                placeholder="Masukkan kegiatan" value="<?= set_value('kegiatan'); ?>" required>
                            <?= form_error('kegiatan', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>

                        <!-- Select Klaster -->
                        <div class="form-group mb-4">
                            <label for="klaster" class="font-weight-bold">Klaster Kegiatan</label>
                            <select class="form-control" id="klaster" name="klaster" required>
                                <option value="">-- Pilih Klaster --</option>
                                <option value="Klaster 1 (Manajemen)">Klaster 1 (Manajemen)</option>
                                <option value="Klaster 2 (Ibu dan Anak)">Klaster 2 (Ibu dan Anak)</option>
                                <option value="Klaster 3 (Usia Dewasa dan Lansia)">Klaster 3 (Usia Dewasa dan Lansia)</option>
                                <option value="Klaster 4 (Penyakit Menular)">Klaster 4 (Penyakit Menular)</option>
                                <option value="Klaster 5 (Lintas Klaster)">Klaster 5 (Lintas Klaster)</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('admin/kegiatan'); ?>" class="btn btn-secondary">Batal</a>

                    </form>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <!-- End of Main Content -->
