<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='<?= base_url(); ?>/assets/img/icon/favicon.ico' rel='shortcut icon'>
    <title><?= $title; ?> | Jaje Bali</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- SELECTPICKER -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-select/bootstrap-select.css">
    <!-- Template Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/toko/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/toko/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/toko/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/toko/css/slicknav.min.css" type="text/css">
    <!-- DATATABLE -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Toaster Notif -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet">
    <!-- DATEPICKER -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/toko/css/style.css" type="text/css">

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap-datepicker/bootstrap-datepicker.js"></script>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li>
                    <div class="humberger__menu__widget">
                        <div class="header__top__right__auth">
                            <?php if ($this->session->userdata('user')) : ?>
                                <?php if (strlen($user['nama_lengkap']) > 20) : ?>
                                    <span class="text-capitalize"><i class="fa fa-user"></i> <?= substr($user['nama_lengkap'], 0, 20) . '..'; ?></span>
                                <?php else : ?>
                                    <span class="text-capitalize"> <i class="fa fa-user"></i> <?= $user['nama_lengkap'] ?></span>
                                <?php endif ?>
                            <?php else : ?>
                                <a href="<?= base_url() ?>auth"><i class="fa fa-user"></i> Login</a>
                            <?php endif ?>
                        </div>
                    </div>
                </li>
                <li>
                    <?php if ($this->session->userdata('user')) : ?>
                        <a href="<?= base_url() ?>shop/keranjang"><i class="fa fa-shopping-bag"></i> <span><?= $this->cart->total_items(); ?></span></a>
                    <?php endif ?>
                </li>
            </ul>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <?php if ($this->session->userdata('user')) : ?>
                    <li>
                        <a href="<?= base_url() ?>shop/pesanan_saya">Pesanan Saya</a>
                    </li>
                <?php endif ?>
                <li>
                    <a href="<?= base_url() ?>" class="<?= $this->uri->segment(1) == '' ? "text-success" : "" ?>">Home</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>shop" class="<?= $this->uri->segment(1) == 'shop' ? "text-success" : "" ?>">Shop</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>shop" class="<?= $this->uri->segment(1) == 'tentang' ? "text-success" : "" ?>">Tentang Kami</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>contact" class="<?= $this->uri->segment(1) == 'contact' ? "text-success" : "" ?>">Contact</a>
                </li>
                <?php if ($this->session->userdata('user')) : ?>
                    <li>
                        <a href="<?= base_url() ?>auth/logout">Logout</a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> jajebali@gmail.com</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fas fa-envelope"></i> jajebali@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></i></a>
                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                <?php if ($this->session->userdata('user')) : ?>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                            <?php if (strlen($user['nama_lengkap']) > 20) : ?>
                                                <span class="text-capitalize"><i class="fa fa-user"></i> <?= substr($user['nama_lengkap'], 0, 20) . '..'; ?></span>
                                            <?php else : ?>
                                                <span class="text-capitalize"><i class="fa fa-user"></i> <?= $user['nama_lengkap'] ?></span>
                                            <?php endif ?>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color: #7FAD39;">
                                            <a class="dropdown-item" id="user-dropdown" href="<?= base_url() ?>shop/pesanan_saya"><i class="fas fa-fw fa-box"></i> Pesanan Saya</a>
                                            <a class="dropdown-item" id="user-dropdown" href="<?= base_url() ?>auth/logout"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <a href="<?= base_url() ?>auth"><i class="fa fa-user"></i> Login</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <nav class="header__menu">
                        <ul>
                            <li class="<?= $this->uri->segment(1) == '' ? "active" : "" ?>">
                                <a href="<?= base_url() ?>">Home</a>
                            </li>
                            <li class="<?= $this->uri->segment(1) == 'shop' ? "active" : "" ?>">
                                <a href="<?= base_url() ?>shop">Shop</a>
                            </li>
                            <li class="<?= $this->uri->segment(1) == 'tentang' ? "active" : "" ?>">
                                <a href="<?= base_url() ?>tentang">Tentang Kami</a>
                            </li>
                            <li class="<?= $this->uri->segment(1) == 'contact' ? "active" : "" ?>">
                                <a href="<?= base_url() ?>contact">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <?php if ($this->session->userdata('user')) : ?>
                                <li><a href="<?= base_url() ?>shop/keranjang"><i class="fa fa-shopping-bag"></i> <span><?= $this->cart->total_items(); ?></span></a></li>
                            <?php endif ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <div class="content-wrapper">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
        <div class="error" data-error="<?= $this->session->flashdata('error'); ?>"></div>
        <?= $contens ?>
    </div>

    <!-- Footer Section Begin -->
    <footer style="background-color: #F5F5F5;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <p class="text-center"><i class="far fa-copyright"></i> All rights reserved | Copyright Jaje Bali </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/toko/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>assets/js/toko/jquery.slicknav.js"></script>
    <script src="<?= base_url() ?>assets/js/toko/mixitup.min.js"></script>
    <script src="<?= base_url() ?>assets/js/toko/owl.carousel.min.js"></script>
    <!-- SELECT PICKER -->
    <script src="<?= base_url() ?>assets/js/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?= base_url('assets/js/select/defaults-id_ID.min.js') ?>"></script>
    <!-- Core Template JS -->
    <script src="<?= base_url() ?>assets/js/toko/main.js"></script>
    <!-- SWEETALERT2 -->
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- DATA TABLE -->
    <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- Toaster Notif -->
    <script src="<?= base_url() ?>assets/js/toastr/toastr.min.js"></script>
    <!-- FileStyle -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-filestyle/bootstrap-filestyle.min.js"> </script>
    <!-- MyJS -->
    <script src="<?= base_url() ?>assets/js/toko/toko.js""></script>

</body>

</html>