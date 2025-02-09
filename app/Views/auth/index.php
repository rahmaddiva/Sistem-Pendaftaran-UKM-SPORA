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
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <!-- menampilkan datatable user -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $row): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['email'] ?></td>

                                        <td>
                                            <!-- button group -->
                                            <div class="btn-group">
                                                <!-- button edit user -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#edit<?= $row['id_user'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <!-- button hapus user -->
                                                <a href="<?= base_url('hapus_user/' . $row['id_user']) ?>"
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
<!-- modal edit -->
<?php foreach ($user as $row): ?>
    <div class="modal fade bd-example-modal-lg" id="edit<?= $row['id_user'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('update_user/' . $row['id_user']) ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body mt-3">
                        <div class="form-group">
                            <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
                            <label for="nama_user">Nama user</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?= $row['username'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <!-- password lama -->
                            <input type="hidden" name="password_lama" value="<?= $row['password'] ?>">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class=" form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label for="tipe_user">Tipe User</label>
                            <select name="id_tipe_user" id="tipe_user" class="form-control">
                                <option value="">Pilih Tipe User</option>
                                <?php foreach ($tipe_user as $tipe): ?>
                                    <option value="<?= $tipe['id_tipe_user'] ?>" <?= $tipe['id_tipe_user'] == $row['id_tipe_user'] ? 'selected' : '' ?>>
                                        <?= $tipe['nama_tipe_user'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
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