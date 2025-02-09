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
                <div class="card col-lg-12">
                    <!-- menampilkan datatable tipe_user -->
                    <div class="card-body">
                        <!-- button tambah modal tipe_user -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                            Tambah Tipe User
                        </button>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tipe User</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($tipe_user as $row): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_tipe_user'] ?></td>
                                        <td>
                                            <!-- button group -->
                                            <div class="btn-group">
                                                <!-- button edit tipe_user -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#edit<?= $row['id_tipe_user'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <!-- button hapus tipe_user -->
                                                <a href="<?= base_url('hapus_tipe_user/' . $row['id_tipe_user']) ?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tipe User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/proses_tipe_user') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_tipe_user">Nama Tipe User</label>
                        <input type="text" class="form-control" id="nama_tipe_user" name="nama_tipe_user">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal edit -->

<?php foreach ($tipe_user as $row): ?>
    <div class="modal fade bd-example-modal-lg" id="edit<?= $row['id_tipe_user'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tipe User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('update_tipe_user/' . $row['id_tipe_user']) ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body mt-3">
                        <div class="form-group">
                            <input type="hidden" name="id_tipe_user" value="<?= $row['id_tipe_user'] ?>">
                            <label for="nama_tipe_user">Nama Tipe User</label>
                            <input type="text" class="form-control" id="nama_tipe_user" name="nama_tipe_user"
                                value="<?= $row['nama_tipe_user'] ?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection() ?>