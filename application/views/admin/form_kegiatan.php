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
                            <label for="tujuan_kegiatan">Kegiatan</label>
                            <input type="text" class="form-control" id="tujuan_kegiatan" name="tujuan_kegiatan"
                                placeholder="Masukkan kegiatan" value="<?= set_value('kegiatan'); ?>" required>
                            <?= form_error('kegiatan', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('admin/kegiatan'); ?>" class="btn btn-secondary">Batal</a>

                    </form>

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