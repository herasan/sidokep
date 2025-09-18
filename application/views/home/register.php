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
    </style>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 col-md-8">
                <div class="card p-4">
                    <div class="card-body">
                        <h2 class="fw-bold text-success mb-4 text-center">Register</h2>
                        <form action="<?= base_url('auth/register') ?>" method="POST">
                            <!-- Nama Lengkap -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" 
                                    class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" 
                                    id="nama" 
                                    name="nama" 
                                    placeholder="Masukkan nama lengkap" 
                                    value="<?= set_value('nama'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('nama'); ?>
                                </div>
                            </div>
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" 
                                    class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" 
                                    id="username" 
                                    name="username" 
                                    placeholder="Masukkan username" 
                                    value="<?= set_value('username'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('username'); ?>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" 
                                    class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" 
                                    id="email" 
                                    name="email" 
                                    placeholder="Masukkan email" 
                                    value="<?= set_value('email'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('email'); ?>
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" 
                                    class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" 
                                    id="password" 
                                    name="password" 
                                    placeholder="Masukkan password">
                                <div class="invalid-feedback">
                                    <?= form_error('password'); ?>
                                </div>
                            </div>
                            <!-- Konfirmasi Password -->
                            <div class="mb-3">
                                <label for="password2" class="form-label">Konfirmasi Password</label>
                                <input type="password" 
                                    class="form-control <?= form_error('password2') ? 'is-invalid' : '' ?>" 
                                    id="password2" 
                                    name="password2" 
                                    placeholder="Ulangi password">
                                <div class="invalid-feedback">
                                    <?= form_error('password2'); ?>
                                </div>
                            </div>
                            <!-- Tombol -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg shadow">Daftar</button>
                            </div>
                            <!-- Link tambahan -->
                            <p class="text-center mt-3">
                                Sudah punya akun? <a href="<?= base_url('auth/login') ?>" class="text-success fw-bold">Login</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
