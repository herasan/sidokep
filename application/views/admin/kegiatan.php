        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Kegiatan</h1>
            <p class="mb-4 col-lg-8 text-justify">Tabel Kegiatan ini memuat daftar tujuan kegiatan yang telah dilaksanakan. Data tersebut menjadi bukti nyata dalam SPJ bahwa kegiatan benar-benar direalisasikan sesuai rencana. Selain itu, tabel ini juga mendukung pencatatan capaian dalam E-Kinerja (Ekin) untuk menilai kontribusi pegawai terhadap target organisasi.</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Kegiatan</h6>
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
                                <?php foreach ($kegiatan as $kegiatan) : ?>
                                    <tr>
                                        <td><?= $kegiatan['id_kegiatan'] ?></td>
                                        <td><?= $kegiatan['tujuan_kegiatan'] ?></td>
                                        <td class="text-center  ">
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