        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
            <p class="mb-4">Tabel ini berisi data pegawai Puskesmas Kebumen 1. Hanya admin yang dapat melakukan penambahan pegawai. Silahkan menghubungi admin apabila ingin menambahkan pegawai baru.</p>

            <!-- DataTales Example -->
            <div class="col-lg-8">
                <div class="card shadow mb-4 p-4">

                    <form action="" method="post">

                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan nama pegawai" value="<?= set_value('nama'); ?>" required>
                            <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="status">Status Pegawai</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="ASN" <?= set_value('status') == 'ASN' ? 'selected' : ''; ?>>ASN</option>
                                <option value="Non-ASN" <?= set_value('status') == 'Non-ASN' ? 'selected' : ''; ?>>Non-ASN</option>
                            </select>
                            <?= form_error('status', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>

                        <div class="form-group d-none" id="nip">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" name="nip"
                                placeholder="Masukkan NIP pegawai" value="<?= set_value('nip'); ?>">
                            <?= form_error('nip', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Masukkan username pegawai" value="<?= set_value('username'); ?>" required>
                            <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Masukkan password pegawai" value="<?= set_value('password'); ?>" required>
                            <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Password</label>
                            <input type="text" class="form-control" id="confirm_password" name="confirm_password"
                                placeholder="Masukkan ulang password pegawai" value="<?= set_value('confirm_password'); ?>" required>
                            <?= form_error('confirm_password', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                placeholder="Masukkan jabatan" value="<?= set_value('jabatan'); ?>" required>
                            <?= form_error('jabatan', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="Pegawai" <?= set_value('role') == 'Pegawai' ? 'selected' : ''; ?>>Pegawai</option>
                                <option value="Kepala" <?= set_value('role') == 'Kepala' ? 'selected' : ''; ?>>Kepala</option>
                                <option value="Admin" <?= set_value('role') == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                            </select>
                            <?= form_error('role', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>


                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('admin/pegawai'); ?>" class="btn btn-secondary">Batal</a>

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
        <!-- End of Content Wrapper -->
        <script>
            $(document).ready(function() {
                $("#status").change(function() {
                    var val = $(this).val();

                    if (val == "ASN") {
                        $("#nip").removeClass("d-none");
                    } else if (val === "Non-ASN") {
                        $("#nip").addClass("d-none");
                        $("[name='nip']").val("");
                    } else {
                        $("#nip").removeClass("d-block")
                        $("#nip").addClass("d-none");
                        $("#nip").val("");
                    }

                });
            });
        </script>