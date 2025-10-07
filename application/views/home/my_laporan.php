<body style="background: linear-gradient(160deg, #43a047, #a5d6a7); min-height: 100vh;">

    <div class="container py-5">
        <div class="bg-white rounded-4 shadow-sm p-4">

            <h3 class="fw-bold text-success mb-3 text-center">My Laporan</h3>
            <p class="text-muted mb-4 text-center">
                Halaman ini menampilkan daftar kegiatan yang telah Anda laporkan melalui sistem.
                Setiap data mencerminkan hasil pelaksanaan kegiatan sesuai bidang tugas Anda di Puskesmas.
                Anda dapat melihat atau menghapus laporan yang sudah dibuat.
            </p>
            <!-- 🔍 FILTER FORM -->
            <form method="GET" action="" class="mb-4">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="start_date" class="form-control" value="<?= $this->input->get('start_date') ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" name="end_date" class="form-control" value="<?= $this->input->get('end_date') ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Jenis Kegiatan</label>
                        <select id="jenis_kegiatan" name="jenis_kegiatan" class="form-select">
                            <option value="">Semua Jenis</option>
                            <?php foreach ($jenis_list as $j): ?>
                                <option value="<?= $j['jenis_kegiatan'] ?>"
                                    <?= ($this->input->get('jenis_kegiatan') == $j['jenis_kegiatan'] ? 'selected' : '') ?>>
                                    <?= $j['jenis_kegiatan'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <a href="<?= base_url('lapor/laporan') ?>" class="btn btn-secondary w-50">Reset</a>
                        <button type="submit" class="btn btn-primary w-50">Filter</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">

                <table id="tabelMyLaporan" class="table table-striped table-bordered table-sm align-middle">
                    <thead class="table-success">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Jenis Kegiatan</th>
                            <th>Judul Kegiatan</th>
                            <th>Tempat</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($laporan as $l): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $l['jenis_kegiatan'] ?></td>
                                <td><?= $l['judul_kegiatan'] ?></td>
                                <td><?= $l['tempat_kegiatan'] ?></td>
                                <td class="text-center"><?= date('d/m/Y', strtotime($l['tanggal_kegiatan'])) ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('laporan/detail/' . $l['id_dokumentasi']) ?>" class="btn btn-sm btn-info text-white">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= base_url('laporan/hapus/' . $l['id_dokumentasi']) ?>" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus laporan ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#tabelMyLaporan').DataTable({
            "language": {
                "lengthMenu": "Tampilkan _MENU_ entri per halaman",
                "zeroRecords": "Tidak ada data ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada laporan yang tersedia",
                "infoFiltered": "(difilter dari total _MAX_ data)",
                "search": "Cari:",
                "paginate": {
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
        $('#jenis_kegiatan').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    });
</script>