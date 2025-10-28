        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
            <p class="mb-4 text-justify">Tabel ini berisi data pegawai Puskesmas Kebumen 1. Alur Pelaporan Kegiatan pada sistem ini terintegrasi langsung dengan data pegawai Puskesmas, sehingga setiap laporan yang dikirimkan akan tercatat atas nama pegawai yang bersangkutan sesuai akun yang digunakan saat login. Sebelum membuat laporan, pegawai wajib melakukan proses login terlebih dahulu untuk memastikan keabsahan identitas dan kesesuaian data dengan daftar pegawai aktif yang telah terdaftar dalam sistem. Setelah login, pengguna dapat menginput laporan kegiatan sesuai dengan bidang tugas, jenis kegiatan, serta waktu pelaksanaan yang sebenarnya, lengkap dengan keterangan pendukung yang diperlukan. Proses ini bertujuan untuk menjaga keamanan dan akurasi data, menghindari duplikasi pelaporan, serta memudahkan penanggung jawab program dan pimpinan dalam melakukan monitoring, evaluasi, dan rekapitulasi kegiatan setiap pegawai secara sistematis dan terverifikasi.</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pegawai</h6>
                    <a href="<?= base_url('admin/pegawai/add') ?>" class="btn btn-primary p-2 font-bold"><i class="fas fa-plus mr-2"></i>Tambah Data Pegawai</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Jabatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pegawai as $pegawai) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $pegawai['nama'] ?></td>
                                    <td><?= $pegawai['status'] ?></td>
                                    <td><?= $pegawai['jabatan'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/pegawai/edit/' . $pegawai['id_user']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?= base_url('admin/pegawai/delete/' . $pegawai['id_user']) ?>" class="btn btn-danger btn-sm tombol-hapus btnDelete"><i class="fas fa-trash"></i> Hapus</a>
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
