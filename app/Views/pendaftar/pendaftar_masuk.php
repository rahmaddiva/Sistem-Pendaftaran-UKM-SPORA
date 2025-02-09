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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Semester</th>
                                        <th>Divisi 1</th>
                                        <th>Divisi 2</th>
                                        <th>Prodi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pendaftar_masuk as $row): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['nim'] ?></td>
                                            <td><?= $row['semester'] ?></td>
                                            <td><?= $row['nama_divisi1'] ?></td>
                                            <td><?= $row['nama_divisi2'] ?></td>
                                            <td><?= $row['nama_prodi'] ?></td>
                                            <td>
                                                <?php if (!empty($row['div_terima'])): ?>
                                                    <span class="badge badge-success">Diterima di
                                                        <?= $row['nama_divisi_terima'] ?></span>
                                                <?php elseif (!empty($row['div_tolak'])): ?>
                                                    <span class="badge badge-danger">Ditolak oleh
                                                        <?= $row['nama_divisi_tolak'] ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-secondary">Belum Diproses</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('pendaftar_detail/' . $row['id_pendaftar']) ?>"
                                                    class="btn btn-primary">Detail</a>
                                                <!-- button Terima dengan memasukkan tgl_wawancara -->
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#exampleModall<?php echo $row['id_pendaftar'] ?>"
                                                    data-id="<?= $row['id_pendaftar'] ?>">
                                                    Terima
                                                </button>
                                                <!-- Button tolak dengan merubah id_divisi -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal<?php echo $row['id_pendaftar'] ?>"
                                                    data-id="<?= $row['id_pendaftar'] ?>">
                                                    Tolak
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<!-- Modal Diterima -->
<?php foreach ($pendaftar_masuk as $row): ?>
    <div class="modal fade" id="exampleModall<?php echo $row['id_pendaftar'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Terima Pendaftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= csrf_field() ?>
                <form action="<?= base_url('pendaftar_terima') ?>" method="post">
                    <div class="modal-body text-left">
                        <input type="hidden" name="id_pendaftar" id="id_pendaftar" value="<?= $row['id_pendaftar'] ?>">
                        <div class="form-group row">
                            <!-- divisi yang dipilih -->

                            <label for="id_divisi" class="col-sm-2 col-form-label">Divisi</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="id_divisi" name="id_divisi">
                                    <?php foreach ($divisi as $roww):
                                        if ($row['id_divisi'] == $roww['id_divisi'] || $row['id_divisi2'] == $roww['id_divisi']) { ?>

                                            <option value="<?= $roww['id_divisi'] ?>"><?= $roww['nama_divisi'] ?></option>
                                            <?php
                                        }
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Terima</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- Modal Tolak -->
<?php foreach ($pendaftar_masuk as $row): ?>
    <div class="modal fade" id="exampleModal<?php echo $row['id_pendaftar'] ?>" tabindex=" -1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tolak Pendaftar <?php echo $row['id_pendaftar'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= csrf_field() ?>
                <form action="<?= base_url('pendaftar_tolak') ?>" method="post">
                    <div class="modal-body text-left">
                        <input type="hidden" name="id_pendaftar" id="id_pendaftar" value="<?= $row['id_pendaftar'] ?>">
                        <div class="form-group">
                            <label for="id_divisi">Divisi</label>
                            <select class="form-control" id="id_divisi" name="id_divisi">
                                <?php foreach ($divisi as $roww):
                                    if ($row['id_divisi'] == $roww['id_divisi'] || $row['id_divisi2'] == $roww['id_divisi']) {

                                        ?>

                                        <option value="<?= $roww['id_divisi'] ?>"><?= $roww['nama_divisi'] ?></option>
                                        <?php
                                    }
                                endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection() ?>