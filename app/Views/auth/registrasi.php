<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Registrasi</h3>
                    </div>
                    <!-- notifikasi error -->
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="<?= base_url('auth/proses_registrasi') ?>" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama">Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"
                                            value="<?= old('nama') ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nim">NIM</label>
                                    <div class="input-group">
                                        <input type="text" name="nim" class="form-control" placeholder="NIM"
                                            value="<?= old('nim') ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-id-card"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="semester">Semester</label>
                                    <div class="input-group">
                                        <input type="number" name="semester" class="form-control" placeholder="Semester"
                                            value="<?= old('semester') ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="alasan">Alasan Bergabung</label>
                                    <div class="input-group">
                                        <input type="text" name="alasan" class="form-control"
                                            placeholder="Alasan Bergabung" value="<?= old('alasan') ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-comment"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="badge badge-info mb-3">Pilih 2 Divisi</div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="id_divisi">Divisi 1</label>
                                    <select name="id_divisi" id="id_divisi" class="form-control"
                                        onchange="updateDivisiOptions()">
                                        <option value="">Pilih Divisi</option>
                                        <?php foreach ($divisi as $row): ?>
                                            <option value="<?= $row['id_divisi'] ?>"><?= $row['nama_divisi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="id_divisi2">Divisi 2</label>
                                    <select name="id_divisi2" id="id_divisi2" class="form-control"
                                        onchange="updateDivisiOptions()">
                                        <option value="">Pilih Divisi</option>
                                        <?php foreach ($divisi as $row): ?>
                                            <option value="<?= $row['id_divisi'] ?>"><?= $row['nama_divisi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <script>
                                    function updateDivisiOptions() {
                                        var divisi1 = document.getElementById('id_divisi');
                                        var divisi2 = document.getElementById('id_divisi2');

                                        // Ambil nilai yang dipilih dari dropdown
                                        var selectedDivisi1 = divisi1.value;
                                        var selectedDivisi2 = divisi2.value;

                                        // Dapatkan semua opsi untuk divisi
                                        var options1 = divisi1.querySelectorAll('option');
                                        var options2 = divisi2.querySelectorAll('option');

                                        // Reset opsi dropdown
                                        options1.forEach(function (option) {
                                            option.style.display = '';
                                        });
                                        options2.forEach(function (option) {
                                            option.style.display = '';
                                        });

                                        // Sembunyikan opsi yang telah dipilih
                                        if (selectedDivisi1) {
                                            options2.forEach(function (option) {
                                                if (option.value === selectedDivisi1) {
                                                    option.style.display = 'none';
                                                }
                                            });
                                        }

                                        if (selectedDivisi2) {
                                            options1.forEach(function (option) {
                                                if (option.value === selectedDivisi2) {
                                                    option.style.display = 'none';
                                                }
                                            });
                                        }
                                    }
                                </script>

                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="id_prodi">Prodi</label>
                                    <select name="id_prodi" class="form-control">
                                        <option value="">Pilih Prodi</option>
                                        <?php foreach ($prodi as $row): ?>
                                            <option value="<?= $row['id_prodi'] ?>"><?= $row['nama_prodi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username"
                                            value="<?= old('username') ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="<?= old('email') ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <a href="<?= base_url('/') ?>" class="text-center">Saya Sudah Mendaftar!</a>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
</body>

</html>