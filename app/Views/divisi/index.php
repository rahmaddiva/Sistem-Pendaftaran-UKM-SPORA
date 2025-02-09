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
                    <!-- menampilkan datatable divisi -->
                    <div class="card-body">
                        <!-- button tambah modal divisi -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                            Tambah Divisi
                        </button>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Divisi</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($divisi as $row): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_divisi'] ?></td>
                                        <td><?= $row['deskripsi'] ?></td>
                                        <td><img src="<?= base_url('foto_divisi/' . $row['foto']) ?>" width="100px"></td>
                                        <td>
                                            <!-- button group -->
                                            <div class="btn-group">
                                                <!-- button edit divisi -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#edit<?= $row['id_divisi'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <!-- button hapus divisi -->
                                                <a href="<?= base_url('hapus_divisi/' . $row['id_divisi']) ?>"
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/proses_divisi') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_divisi">Nama Divisi</label>
                        <input type="text" class="form-control" id="nama_divisi" name="nama_divisi">
                    </div>
                    <div class="form-group mt-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <!-- preview foto -->
                    <div class="col-md-4">
                        <div class="form-group mt-3">
                            <label for="preview">Preview</label>
                            <img src="/uploads/default.png" alt="default.jpg" width="250" id="preview">
                            <!-- jquery -->
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                document.getElementById('foto').addEventListener('change', function () {
                                    const file = this.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function (e) {
                                            document.getElementById('preview').src = e.target.result;
                                        }
                                        reader.readAsDataURL(file);
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!-- preview foto -->

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

<?php foreach ($divisi as $row): ?>
    <div class="modal fade bd-example-modal-lg" id="edit<?= $row['id_divisi'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('update_divisi/' . $row['id_divisi']) ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body mt-3">
                        <div class="form-group">
                            <input type="hidden" name="id_divisi" value="<?= $row['id_divisi'] ?>">
                            <label for="nama_divisi">Nama Divisi</label>
                            <input type="text" class="form-control" id="nama_divisi" name="nama_divisi"
                                value="<?= $row['nama_divisi'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi"
                                name="deskripsi"><?= $row['deskripsi'] ?></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" id="foto2" name="foto">
                        </div>
                        <!-- preview foto -->
                        <div class="col-md-4">
                            <div class="form-group mt-3">
                                <label for="preview">Preview</label>
                                <img src="<?= base_url('foto_divisi/' . $row['foto']) ?>" alt="<?= $row['foto'] ?>"
                                    width="250" id="preview">
                                <!-- jquery -->
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    document.getElementById('foto2').addEventListener('change', function () {
                                        const file = this.files[0];
                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = function (e) {
                                                document.getElementById('preview').src = e.target.result;
                                            }
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                        <!-- preview foto -->
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