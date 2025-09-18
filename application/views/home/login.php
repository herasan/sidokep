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
            <div class="col-lg-5 col-md-6">
                <div class="card p-4">
                    <div class="card-body">
                        <h2 class="fw-bold text-success mb-4 text-center">Login</h2>
                        <form action="<?= base_url('auth/login') ?>" method="POST">
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
                            <!-- Tombol -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg shadow">Masuk</button>
                            </div>
                            <!-- Link tambahan -->
                            <p class="text-center mt-3">
                                Belum punya akun? <a href="<?= base_url('auth/register') ?>" class="text-success fw-bold">Daftar</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>