<body style="background: linear-gradient(160deg, #43a047, #a5d6a7);">
    <style>
        .card {
            border-radius: 1rem;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        .form-label {
            font-weight: 600;
        }

        .btn-success {
            border-radius: 50px;
            font-weight: bold;
            padding: 0.75rem 2rem;
        }

        .upload-box {
            border: 2px dashed #28a745;
            border-radius: 12px;
            width: 100%;
            aspect-ratio: 1/1;
            /* kotak persegi */
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            cursor: pointer;
            background: #fff;
            position: relative;
            overflow: hidden;
        }

        .upload-box:hover {
            background: #f8f9fa;
        }

        .upload-box input {
            display: none;
        }

        .upload-box img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .upload-text {
            color: #333;
            font-weight: 600;
            text-align: center;
        }

        .upload-text span {
            font-size: 2rem;
            display: block;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-10 col-md-10">
                <div class="card p-4">
                    <div class="card-body">
                        <h2 class="fw-bold text-success mb-4 text-center">Tambah Kegiatan</h2>
                        <form action="<?= base_url('lapor') ?>" method="POST" enctype="multipart/form-data">
                            <!-- Nama Kegiatan -->
                            <div class="mb-3">
                                <label for="pelaporKegiatan" class="form-label">Pelapor Kegiatan</label>
                                <input type="text" class="form-control <?= form_error('pelapor_kegiatan') ? 'is-invalid' : '' ?>" id="pelaporKegiatan" name="pelapor_kegiatan" placeholder="Nama Pelapor"
                                    value="<?= $login['nama']; ?>"
                                    style="background-color: #e9ecef; color: #6c757d;">
                                <div class="invalid-feedback">
                                    <?= form_error('pelapor_kegiatan'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="namaKegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text"
                                    class="form-control <?= form_error('nama_kegiatan') ? 'is-invalid' : '' ?>"
                                    value="<?= set_value('nama_kegiatan'); ?>"
                                    name="nama_kegiatan"
                                    id="namaKegiatan"
                                    placeholder="Contoh: Penyuluhan Kesehatan"
                                    required>
                                <div class="invalid-feedback">
                                    <?= form_error('nama_kegiatan'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tujuan_kegiatan" class="form-label">Tujuan Kegiatan</label>
                                <div class="input-group mb-3">
                                    <select class="form-select js-example-basic-single" id="tujuan_kegiatan" name="tujuan_kegiatan" required>
                                        <?php foreach ($tujuan_kegiatan as $tujuan) : ?>
                                            <option value="<?= $tujuan['tujuan_kegiatan'] ?>"><?= $tujuan['tujuan_kegiatan'] ?></option>
                                        <?php endforeach; ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <!-- Input tambahan akan tampil kalau pilih Lainnya -->
                                <div id="lainnyaTujuan" style="display:none; margin-top:10px;">
                                    <label for="lainnya_tujuan">Tuliskan tujuan lainnya:</label>
                                    <input type="text" class="form-control <?= form_error('lainnya_tujuan') ? 'is-invalid' : '' ?>"
                                        id="lainnya_tujuan"
                                        value="<?= set_value('lainnya_tujuan'); ?>"
                                        name="lainnya_tujuan"
                                        placeholder="Masukkan tujuan kegiatan...">
                                    <div class="invalid-feedback">
                                        <?= form_error('lainnya_tujuan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tempatKegiatan" class="form-label">Tempat Kegiatan</label>
                                <input type="text" class="form-control <?= form_error('tempat_kegiatan') ? 'is-invalid' : '' ?>" id="tempatKegiatan" name="tempat_kegiatan"
                                    value="<?= set_value('tempat_kegiatan'); ?>"
                                    placeholder="Contoh: Desa Bandung" required>
                                <div class="invalid-feedback">
                                    <?= form_error('tempat_kegiatan'); ?>
                                </div>
                            </div>
                            <!-- Tanggal Kegiatan -->
                            <div class="mb-3">
                                <label for="tanggalKegiatan" class="form-label">Tanggal Kegiatan</label>
                                <input type="date" class="form-control <?= form_error('tanggal_kegiatan') ? 'is-invalid' : '' ?>"
                                    value="<?= set_value('tanggal_kegiatan'); ?>"
                                    id="tanggalKegiatan"
                                    name="tanggal_kegiatan" required>
                                <div class="invalid-feedback">
                                    <?= form_error('tanggal_kegiatan'); ?>
                                </div>
                            </div>
                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="hasil_kegiatan" class="form-label">Hasil Kegiatan</label>
                                <textarea class="form-control <?= form_error('hasil_kegiatan') ? 'is-invalid' : '' ?>" id="hasil_kegiatan" name="hasil_kegiatan" rows="3" placeholder="Tuliskan notulen hasil kegiatan..." required><?= set_value('hasil_kegiatan'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('hasil_kegiatan'); ?>
                                </div>
                            </div>
                            <!-- Upload Foto -->
                            <div class="mb-3">
                                <label for="tanggalKegiatan" class="form-label">Foto Kegiatan</label>
                                <div class="container">
                                    <div class="row g-4">

                                        <!-- Foto Samping Kanan -->
                                        <div class="col-lg-6">
                                            <label class="upload-box">
                                                <input type="file" accept="image/*" name="fotos[]" multiple="multiple" onchange="previewImage(this, 'preview1', 'text1')">
                                                <div id="text1" class="upload-text">
                                                    <span>＋</span>
                                                    Upload Foto<br>Samping Kanan
                                                </div>
                                                <img id="preview1" alt="Preview Foto Samping Kanan">
                                            </label>
                                        </div>

                                        <!-- Foto Samping Kiri -->
                                        <div class="col-lg-6">
                                            <label class="upload-box">
                                                <input type="file" accept="image/*" name="fotos[]" multiple="multiple" onchange="previewImage(this, 'preview2', 'text2')">
                                                <div id="text2" class="upload-text">
                                                    <span>＋</span>
                                                    Upload Foto<br>Samping Kiri
                                                </div>
                                                <img id="preview2" alt="Preview Foto Samping Kiri">
                                            </label>
                                        </div>

                                        <!-- Foto Tampak Depan -->
                                        <div class="col-lg-6">
                                            <label class="upload-box">
                                                <input type="file" accept="image/*" name="fotos[]" multiple="multiple" onchange="previewImage(this, 'preview3', 'text3')">
                                                <div id="text3" class="upload-text">
                                                    <span>＋</span>
                                                    Upload Foto<br>Tampak Depan
                                                </div>
                                                <img id="preview3" alt="Preview Foto Tampak Depan">
                                            </label>
                                        </div>

                                        <!-- Foto Tampak Belakang -->
                                        <div class="col-lg-6">
                                            <label class="upload-box">
                                                <input type="file" accept="image/*" name="fotos[]" multiple="multiple" onchange="previewImage(this, 'preview4', 'text4')">
                                                <div id="text4" class="upload-text">
                                                    <span>＋</span>
                                                    Upload Foto<br>Tampak Belakang
                                                </div>
                                                <img id="preview4" alt="Preview Foto Tampak Belakang">
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Tombol -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg shadow">Simpan Kegiatan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(input, previewId, textId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);
            const text = document.getElementById(textId);
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                    text.style.display = "none";
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.style.display = "none";
                text.style.display = "block";
            }
        }
    </script>
    <script>
        document.getElementById("tujuan_kegiatan").addEventListener("change", function() {
            var lainnyaDiv = document.getElementById("lainnyaTujuan");
            if (this.value == "Lainnya") {
                lainnyaDiv.style.display = "block";
                lainnyaDiv.querySelector("input").setAttribute("required", "required");
            } else {
                lainnyaDiv.style.display = "none";
                lainnyaDiv.querySelector("input").removeAttribute("required");
            }
        });
    </script>

<script>
    </script>
    <script>
        $(document).ready(function() {
            $('#tujuan_kegiatan').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
            });
            $('.js-example-basic-single').select2({
                placeholder: "Pilih Tujuan Kegiatan",
                allowClear: true
            });
        });
    </script>

</body>