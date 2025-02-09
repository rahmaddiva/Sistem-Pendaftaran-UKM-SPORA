<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url('img/favicon.ico') ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('user/lib/animate/animate.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('user/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('user/lib/lightbox/css/lightbox.min.css') ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('user/scss/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('user/scss/css/style.css') ?>" rel="stylesheet">
</head>


<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <div class="container-fluid bg-primary text-white d-none d-lg-flex">
        <div class="container py-3">
            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="d-flex align-items-center text-white text-decoration-none">
                    <img src="<?= base_url('assets/dist/img/spora.png') ?>" alt="UKM SPORA Logo" class="me-2"
                        style="height: 40px;">
                    <h2 class="text-white fw-bold m-0">UKM SPORA</h2>
                </a>
                <div class="ms-auto d-flex align-items-center flex-grow-1 justify-content-center">
                    <small class="ms-4 text-center"><i class="fa fa-map-marker-alt me-3"></i>Pelaihari, Politeknik
                        Negeri
                        Tanah Laut</small>
                    <?php if (isset($pendaftaran[0])): ?>
                        <small class="ms-4 text-center">
                            <i class="fa fa-calendar-alt me-3"></i> Pendaftaran Buka:
                            <?= date('d-m-Y', strtotime($pendaftaran[0]['tgl_buka'])) ?>
                        </small>
                        <small class="ms-4 text-center">
                            <i class="fa fa-calendar-alt me-3"></i> Pendaftaran Tutup:
                            <?= date('d-m-Y', strtotime($pendaftaran[0]['tgl_tutup'])) ?>
                        </small>
                    <?php endif; ?>
                </div>
                <!-- Ikon Instagram -->
                <div class="ms-3 d-flex">
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href=""><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
                <a href="index.html" class="navbar-brand d-lg-none">
                    <h1 class="fw-bold m-0">GrowMark</h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#tentang" class="nav-item nav-link">Tentang</a>
                        <a href="#divisi" class="nav-item nav-link">Divisi</a>

                        <a href="#kontak" class="nav-item nav-link">Kontak</a>
                    </div>
                    <div class="ms-auto d-none d-lg-block">
                        <a href="<?= base_url('/login') ?>" class="btn btn-primary rounded-pill py-2 px-3">Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5" id="home">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="<?= base_url('user/img/icon/depan.jpeg') ?>" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <p class="fs-1 fw-bold text-white animated slideInRight">AYO! DAFTAR SEKARANG JUGA
                                    </p>
                                    <h6 class="fs-5 text-white mb-4 animated slideInRight">Menerima Pendaftaran UKM
                                        Spora dibuka pada</h6>
                                    <a href="<?= base_url('/login') ?>"
                                        class="btn btn-primary rounded-pill py-3 px-5 animated slideInRight">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?= base_url('user/img/icon/depan.jpeg') ?>" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 text-end">
                                    <p class="fs-1 fw-bold text-white animated slideInLeft">AYO! DAFTAR SEKARANG JUGA
                                    </p>
                                    <h6 class="fs-5 text-white mb-4 animated slideInLeft">Menerima Pendaftaran UKM Spora
                                        dibuka pada</h6>
                                    <a href="<?= base_url('/login') ?>"
                                        class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    </div>



    <!-- About Start -->
    <div class="container d-flex justify-content-center align-items-center" id="tentang" style="min-height: 50vh;">
        <div class="row g-0">
            <?php foreach ($pendaftaran as $p): ?>
                <div class="col-lg-6 mb-4">
                    <div class="card h-500" style="width: 500px;">
                        <div class="d-flex align-items-center justify-content-center"
                            style="height: 400px; overflow: hidden;">
                            <?php if (isset($p['foto_struktur'])): ?>
                                <img class="img-fluid" src="<?= base_url('foto_divisi/' . $p['foto_struktur']) ?>"
                                    alt="Foto Struktur" style="max-height: 100%; max-width: 100%;">
                            <?php else: ?>
                                <img class="img-fluid" src="path/to/default/image.png" alt="Default Image"
                                    style="max-height: 100%; max-width: 100%;">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- About End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Service Start -->
    <div class="container-xxl py-5" id="divisi">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium text-primary">Divisi</p>
                <h1 class="display-5 mb-5">Divisi UKM Spora</h1>
            </div>
            <div class="row g-4">
                <?php $no = 1;
                foreach ($divisi as $row): ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item position-relative h-100">
                            <div class="service-text rounded p-5">
                                <div class=" rounded-circle mx-auto mb-4" style="width: 250px; height: 150px;">
                                    <img class="img-fluid" src="<?= base_url('foto_divisi/' . $row['foto']) ?>" alt="Icon"
                                        style="max-width: 100%; height: auto;">
                                </div>
                                <h5 class="mb-3"><?= $row['nama_divisi'] ?></h5>
                                <p class="mb-0"><?= $row['deskripsi'] ?></p>
                            </div>
                            <!-- <div class="service-btn rounded-0 rounded-bottom">
                <a class="text-primary fw-medium" href="">Read More<i class="bi bi-chevron-double-right ms-2"></i></a>
            </div> -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


        </div>
    </div>
    </div>



    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s" id="kontak">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <!-- Peta dengan kolom yang tidak menutupi footer -->
                    <div class="mb-4" style="width: 100%; max-height: 400px; overflow: hidden; border-radius: 10px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20652.21074983728!2d114.7743696159724!3d-3.7539910500422757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6f3cbc3517eb1%3A0xd6e24bd1137d8d13!2sPoliteknik%20Negeri%20Tanah%20Laut!5e0!3m2!1sid!2sid!4v1721874130444!5m2!1sid!2sid"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Politeknik Negeri Tanah Laut, Indonesia</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium text-light" href="#">UKM SPORA</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->

                    <a class="fw-medium text-light" href="#">Politeknik Negeri Tanah Laut</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('user/lib/wow/wow.min.js') ?>"></script>
    <script src="<?= base_url('user/lib/easing/easing.min.js') ?>"></script>
    <script src="<?= base_url('user/lib/waypoints/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('user/lib/owlcarousel/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('user/lib/lightbox/js/lightbox.min.js') ?>"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('user/js/main.js') ?>"></script>
</body>

</html>