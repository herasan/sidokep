        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Kegiatan</h1>
            <p class="mb-4 col-lg-12 text-justify">Data Kegiatan ini memuat daftar jenis kegiatan yang telah ditetapkan dan digunakan sebagai acuan dalam proses pelaporan kegiatan di Puskesmas. Melalui tabel ini, admin atau petugas dapat menambah dan menghapus jenis kegiatan sesuai kebutuhan program yang berjalan. Setiap jenis kegiatan yang tercantum di sini akan muncul sebagai pilihan pada menu pelaporan, sehingga pegawai dapat memilih jenis kegiatan yang sesuai saat membuat laporan. Dengan adanya pengelolaan data kegiatan ini, proses pelaporan menjadi lebih terstruktur, seragam, dan mudah dipantau sesuai bidang tugas serta program yang dilaksanakan di Puskesmas.</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Kegiatan</h6>
                    <a href="<?= base_url('admin/kegiatan/add') ?>" class="btn btn-primary p-2 font-bold"><i class="fas fa-plus mr-2"></i>Tambah Kegiatan</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Tujuan Kegiatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kegiatan as $kegiatan) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $kegiatan['jenis_kegiatan'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/kegiatan/hapus/' . $kegiatan['id_kegiatan']) ?>" class="btn btn-danger btn-sm btnDelete"><i class="fas fa-trash mr-2"></i>Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
        <!-- End of Content Wrapper -->