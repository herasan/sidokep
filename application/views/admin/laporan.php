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
                                    <th>Pelapor</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tujuan Kegiatan</th>
                                    <th>Tempat Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($laporan as $laporan) : ?>
                                    <tr class="">
                                        <td><?= $laporan['id_dokumentasi'] ?></td>
                                        <td><?= $laporan['pelapor_kegiatan'] ?></td>
                                        <td><?= $laporan['nama_kegiatan'] ?></td>
                                        <td><?= $laporan['tujuan_kegiatan'] ?></td>
                                        <td><?= $laporan['tempat_kegiatan'] ?></td>
                                        <td><?= $laporan['tanggal_kegiatan'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('detail_laporan/' . $laporan['id_dokumentasi']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>
                                            <a href="<?= base_url('hapus_laporan/' . $laporan['id_dokumentasi']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
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