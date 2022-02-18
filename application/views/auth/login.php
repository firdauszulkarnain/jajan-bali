<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='<?= base_url(); ?>/assets/img/icon/favicon.ico' rel='shortcut icon'>
    <title><?= $title; ?></title>

    <!-- Google Font: Source Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/adminlte.min.css">
    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/auth.css">

    <!-- Toaster Notif -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="login-box mt-5">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <div class="card">
                    <div class="pt-5 pb-3 px-4">
                        <div class=" card-body p-0">
                            <div class="text-center">
                                <h1 class="h4 text-success font-weight-bolder mb-4"><i class="fas fa-fw fa-shopping-bag"></i> LOGIN JAJE BALI</h1>
                                <hr class="mb-4 garis">
                            </div>
                            <div class="error" data-error="<?= $this->session->flashdata('error'); ?>"></div>
                            <form method="POST" action="<?= base_url('auth') ?>">
                                <div class="mb-3">
                                    <div class="input-group <?= (form_error('email')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <span class="fas fa-user"></span></span>
                                        </div>
                                        <input type="text" class="form-control <?= (form_error('email')) ? 'is-invalid' : '' ?>" placeholder="Email Address" value="<?= set_value('email') ?>" name="email" autocomplete="off" autofocus>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= form_error('email') ?>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="input-group <?= (form_error('password')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <span class="fas fa-lock"></span></span>
                                        </div>
                                        <input type="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : '' ?>" placeholder="Password" name="password" autocomplete="off">
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= form_error('password') ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-block mt-4">Masuk</button>
                                <hr>
                                <div class="text-center mt-4">
                                    <p class="small">Belum Punya Akun? Silahkan <a href="<?= base_url('auth/register') ?>" class="text-decoration-none text-success"><strong> REGISTRASI</strong></a></p>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>



    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>assets/js/toastr/toastr.min.js"></script>
    <script>
        $(document).ready(function() {

            const flashData = $('.flash-data').data('flashdata');
            if (flashData) {
                toastr.success(flashData);
            }
            const error = $('.error').data('error');
            if (error) {
                toastr.error(error);
            }
        });
    </script>
</body>

</html>