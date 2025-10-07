        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Laporan</h1>
            <p class="mb-4 col-lg-12 text-justify">Tabel Laporan ini memuat data kegiatan yang telah dilaksanakan oleh pegawai Puskesmas sebagai bentuk pelaksanaan tugas dan tanggung jawab terhadap target kinerja yang telah ditetapkan. Melalui tabel ini, pengguna dapat melihat rincian kegiatan berdasarkan tanggal pelaksanaan, nama pelapor, serta jenis kegiatan yang dilakukan. Fitur filter disediakan untuk memudahkan pencarian dan penyaringan data sesuai kebutuhan, seperti menampilkan kegiatan dalam rentang waktu tertentu, kegiatan yang dilakukan oleh pegawai tertentu, maupun berdasarkan jenis kegiatan. Dengan adanya tabel laporan ini, diharapkan proses pemantauan, evaluasi, dan pelaporan capaian kinerja pegawai dapat dilakukan secara lebih terarah, efisien, dan transparan.
            </p>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Filter Laporan</h6>
                </div>
                <div class="card-body">
                    <form method="GET" action="">
                        <div class="row mb-3">
                            <div class="col-xl-2">
                                <label>Tanggal Mulai</label>
                                <input type="date" name="start_date" class="form-control" value="<?= $this->input->get('start_date') ?>">
                            </div>
                            <div class="col-xl-2">
                                <label>Tanggal Selesai</label>
                                <input type="date" name="end_date" class="form-control" value="<?= $this->input->get('end_date') ?>">
                            </div>
                            <div class="col-xl-3">
                                <label>Pelapor</label>
                                <select name="pelapor" id="pelapor" class="form-control js-example-basic-single">
                                    <option value="">Semua Pelapor</option>
                                    <?php foreach ($pelapor_list as $p): ?>
                                        <option value="<?= $p['nama'] ?>" <?= ($this->input->get('pelapor') == $p['nama'] ? 'selected' : '') ?>>
                                            <?= $p['nama'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-xl-3">
                                <label>Jenis Kegiatan</label>
                                <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control js-example-basic-single">
                                    <option value="">Semua Jenis</option>
                                    <?php foreach ($jenis_list as $jl): ?>
                                        <option value="<?= $jl['jenis_kegiatan'] ?>" <?= ($this->input->get('jenis_kegiatan') == $jl['jenis_kegiatan'] ? 'selected' : '') ?>>
                                            <?= $jl['jenis_kegiatan'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-xl-2 d-flex align-items-end mt-3">
                                <a href="<?= base_url('admin/laporan') ?>" class="btn btn-secondary w-50 mr-2">Reset</a>
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Pelapor</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Judul Kegiatan</th>
                                    <th>Tempat Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($laporan as $laporan) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $laporan['pelapor_kegiatan'] ?></td>
                                        <td><?= $laporan['jenis_kegiatan'] ?></td>
                                        <td><?= $laporan['judul_kegiatan'] ?></td>
                                        <td><?= $laporan['tempat_kegiatan'] ?></td>
                                        <td class="text-center"><?= date('d-m-Y', strtotime($laporan['tanggal_kegiatan'])) ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/laporan/detail/' . $laporan['id_dokumentasi']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>
                                            <a href="<?= base_url('admin/laporan/hapus/' . $laporan['id_dokumentasi']) ?>" class="btn btn-sm btn-danger btnDelete"><i class="fas fa-fw fa-trash"></i></a>
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
        <script>
            $(document).ready(function() {
                $('#pelapor').select2({
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                });
                $('#jenis_kegiatan').select2({
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                });
            });
        </script>