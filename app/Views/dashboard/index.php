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

            <div class="row">
                <div class="col-lg-12">
                    <!-- Welcome Card -->
                    <div class="card bg-info text-white">
                        <div class="card-header">
                            <h3>Selamat Datang, <?= esc(session()->get('nama')) ?>!</h3>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <?php if (session()->get('id_tipe_user') == 1): ?>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $countPendaftar ?></h3>
                                <p>Total Pendaftar</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?= $countPendaftarDiterima ?></h3>
                                <p>Pendaftar Diterima</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?= $countPendaftarDitolak ?></h3>
                                <p>Pendaftar Ditolak</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-times"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= $countdivisi ?></h3>
                                <p>Total Divisi</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-building"></i>
                            </div>

                        </div>
                    </div>

                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-12 col-12">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <p><strong>Tanggal Buka:</strong> <?= $pendaftaran['tgl_buka'] ?></p>
                            <p><strong>Tanggal Tutup:</strong> <?= $pendaftaran['tgl_tutup'] ?></p>
                            <p><strong>Tanggal Wawancara:</strong> <?= $pendaftaran['tgl_wawancara'] ?></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <a href="/rencana-kegiatan" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>



            <?php if (session()->get('id_tipe_user') == 2): ?>
                <h2>Status Pendaftar</h2>
                <?php if (!empty($pendaftar_masuk)): ?>
                    <ul>
                        <?php foreach ($pendaftar_masuk as $status): ?>
                            <li>
                                Status: <span
                                    class="badge badge-<?= $status['status'] == 'Menunggu' ? 'warning' : ($status['status'] == 'Diterima' ? 'success' : 'danger') ?>"><?= $status['status'] ?></span><br>
                                Tanggal Diterima:
                                <?= esc($status['tgl_diterima']) ? date('d-m-Y', strtotime($status['tgl_diterima'])) : 'Belum diterima'; ?><br>
                                Tanggal Wawancara:
                                <?= esc($status['tgl_wawancara']) ? date('d-m-Y', strtotime($status['tgl_wawancara'])) : 'Belum dijadwalkan'; ?><br>
                                Divisi Diterima:
                                <?= !empty($status['nama_divisi_terima']) ? esc($status['nama_divisi_terima']) : 'Belum diterima di divisi mana pun'; ?><br>
                                Divisi Ditolak:
                                <?= !empty($status['nama_divisi_tolak']) ? esc($status['nama_divisi_tolak']) : 'Belum ditolak oleh divisi mana pun'; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Data status pendaftar tidak ditemukan.</p>
                <?php endif; ?>
            <?php endif; ?>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?= $this->endSection() ?>