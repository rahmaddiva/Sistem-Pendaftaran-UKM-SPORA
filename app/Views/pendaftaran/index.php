<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
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
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <!-- /.card-header -->
                    </div>
                    <br>
                    <!-- card untuk menampilkan tabel pendaftar_masuk -->
                    <div class="card">
                        <div class="card-body">
                            <?php if (session()->getFlashdata('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            <?php endif ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!--  -->
                                        <?php foreach ($pendaftaran as $p): ?>
                                            <form action="kelola_pendaftaran/update/" method="post" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <div class="form-group">
                                                    <label for="tgl">Tanggal Buka</label>
                                                    <input type="hidden" name="id_pendaftaran"
                                                        value="<?= $p['id_pendaftaran'] ?>">
                                                    <input type="date" name="tgl_buka" class="form-control" id="tgl"
                                                        value="<?= esc($p['tgl_buka']); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_wawancara">Tanggal Wawancara</label>
                                                    <input type="date" class="form-control" name="tgl_wawancara"
                                                        id="tgl_wawancara" value="<?= esc($p['tgl_wawancara']); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_tutup">Tanggal Tutup</label>
                                                    <input type="date" class="form-control" name="tgl_tutup" id="tgl_tutup"
                                                        value="<?= esc($p['tgl_tutup']); ?>">
                                                </div>
                                                <div class="form-group row">
                                                    <label for="foto_struktur" class="col-sm-2 col-form-label">Foto
                                                        Struktur</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" name="foto_struktur"
                                                            id="foto_struktur">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<?= $this->endSection() ?>