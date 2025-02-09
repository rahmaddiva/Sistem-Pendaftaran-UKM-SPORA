<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Anggota Pendaftar Masuk</h3>
                        </div>
                        <!-- /.card-header -->
                    </div>
                    <br>
                    <!-- card untuk menampilkan tabel pendaftar_masuk -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!--  -->
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama"
                                                value="<?= esc($pendaftar['nama']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nim">NIM</label>
                                            <input type="text" class="form-control" id="nim"
                                                value="<?= esc($pendaftar['nim']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <input type="text" class="form-control" id="jenis_kelamin"
                                                value="<?= esc($pendaftar['jenis_kelamin']); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="semester">Semester</label>
                                            <input type="text" class="form-control" id="semester"
                                                value="<?= esc($pendaftar['semester']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="alasan">Alasan</label>
                                            <textarea class="form-control" id="alasan" rows="3"
                                                readonly><?= esc($pendaftar['alasan']); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control" id="status"
                                                value="<?= esc($pendaftar['status']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_diterima">Tanggal Diterima</label>
                                            <input type="text" class="form-control" id="tgl_diterima"
                                                value="<?= esc($pendaftar['tgl_diterima']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_wawancara">Tanggal Wawancara</label>
                                            <input type="text" class="form-control" id="tgl_wawancara"
                                                value="<?= esc($pendaftar['tgl_wawancara']); ?>" readonly>
                                        </div>
                                        <!-- status -->
                                        <div class="form-group row">
                                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check input" type="radio" name="status"
                                                        value="Diterima" <?= ($pendaftar['status'] == 'Diterima') ? 'checked' : ''; ?>
                                                        disabled>
                                                    <label class="form-check label">Diterima</label>
                                                    </div>
                                                    <div class="form-check input">
                                                        <input class="form-check input" type="radio" name="status"
                                                            value="Ditolak" <?= ($pendaftar['status'] == 'Ditolak') ? 'checked' : ''; ?>
                                                            disabled>
                                                        <label class="form-check label">Ditolak</label>
                                                 </div> 
                                            </div>
                                         </div>
                                    </div>
                                   <div class="col-md-6">
    <div class="form-group">
        <label for="id_divisi">Divisi 1</label>
        <input type="text" class="form-control" id="id_divisi1"
               value="<?= esc($pendaftar['nama_divisi1']); ?>"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_divisi2">Divisi 2</label>
                                        <input type="text" class="form-control" id="id_divisi2" value="<?= esc($pendaftar['nama_divisi2']); ?>"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_prodi">Prodi</label>
                                        <input type="text" class="form-control" id="id_prodi" value="<?= esc($pendaftar['nama_prodi']); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="div_terima">Divisi Diterima</label>
                                        <input type="text" class="form-control" id="div_terima"
                                            value="<?= esc($pendaftar['nama_divisi_terima'] ?? 'Belum Diterima'); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="div_tolak">Divisi Ditolak</label>
                                        <input type="text" class="form-control" id="div_tolak"
                                            value="<?= esc($pendaftar['nama_divisi_tolak'] ?? 'Belum Ditolak'); ?>" readonly>
                                    </div>
                                </div>

                                </div>
                                <a href="/pendaftar_masuk" class="btn btn-primary">Kembali ke Daftar Pendaftar</a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?= $this->endSection() ?>