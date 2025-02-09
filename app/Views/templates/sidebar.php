<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="<?= base_url('assets/') ?>dist/img/spora.png" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIMPENPORA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/') ?>dist/img/spora.png" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('nama') ?> </a>
                <!-- ambil nama divisi dari session id_divisi -->
                 
                <p>Divisi : <?= session()->get('id_divisi') ?></p>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                <!-- jika id_tipe_user nya adalah 2 maka tidak menampilkan sidebar -->
                <?php if (session()->get('id_tipe_user') != 2): ?>
                    <li class="nav-header">Data Master</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Kelola Lainnya
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="kelola_divisi" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Divisi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/kelola_prodi" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Prodi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/kelola_tipe_user" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Tipe User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/kelola_user" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Pengguna</p>
                                </a>
                            </li>
                    </li>
                </ul>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Kelola Pendaftar
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/pendaftar_masuk" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftar Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pendaftar_diterima" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftar DiTerima</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/pendaftar_ditolak" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftar Tolak </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Divisi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/pendaftar_voli" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftar Voli</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pendaftar_futsal" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftar Futsal</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/pendaftar_sepakbola" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftar Sepak Bola</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pendaftar_esport" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftar Esport</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pendaftar_kempo" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftar Kempo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pendaftar_badminton" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftar Badminton</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pendaftar_basket" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftar Basket</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kelola Pendaftaran
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/kelola_pendaftaran" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftaran</p>
                            </a>
                        </li>


                    </ul>
                </li>
            <?php endif; ?>

            <li class="nav-item">
                <a href="/logout" class="nav-link" onclick="return confirm('Apakah Anda Yakin Ingin logout?')">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>