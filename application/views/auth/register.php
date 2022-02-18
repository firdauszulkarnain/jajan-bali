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
    <!-- SELECTPICKER -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-select/bootstrap-select.css">
    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/auth.css">
</head>

<body>
    <div class="container mb-5">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-lg-7">
                <!-- <div class="login-box mt-5"> -->
                <div class="card">
                    <div class="p-5">
                        <div class=" card-body p-0">
                            <div class="text-center">
                                <h1 class="h4 text-success font-weight-bolder mb-4"><i class="fas fa-fw fa-shopping-bag"></i> LOGIN JAJE BALI</h1>
                                <hr class="mb-4 garis">
                            </div>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control text-capitalize  <?= (form_error('nama')) ? 'border border-danger' : 'border border-secondary' ?>" id="nama" placeholder="Nama Lengkap" name="nama" autocomplete="off" value="<?= set_value('nama');  ?>">
                                    <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control  <?= (form_error('email')) ? 'border border-danger' : 'border border-secondary' ?>" id="email" placeholder="Email Address" name="email" autocomplete="off" value="<?= set_value('email');  ?>">
                                    <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control  <?= (form_error('notelp')) ? 'border border-danger' : 'border border-secondary' ?>" id="notelp" placeholder="No Telepon" name="notelp" autocomplete="off" value="<?= set_value('notelp');  ?>">
                                    <?= form_error('notelp', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <select class="form-control selectpicker <?= (form_error('kabupaten')) ? 'border border-danger' : 'border border-secondary' ?>" id="kabupaten" name="kabupaten" data-size="4" data-live-search="true" title="Pilih Kabupaten">
                                        <?php foreach ($kabupaten as $kb) : ?>
                                            <option value="<?= $kb['id_kab'] ?>" <?= set_select('kabupaten', $kb['id_kab']) ?>><?= $kb['nama_kab'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('kabupaten', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <select class="form-control selectpicker  <?= (form_error('kecamatan')) ? 'border border-danger' : 'border border-secondary' ?>" id="kecamatan" name="kecamatan" title="Pilih Kecamatan" data-size="4" data-live-search="true">
                                        <option value=""></option>
                                    </select>
                                    <?= form_error('kecamatan', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control  <?= (form_error('alamat')) ? 'border border-danger' : 'border border-secondary' ?>" id="alamat" name="alamat" autocomplete="off" rows="3" placeholder="Alamat"><?= set_value('alamat');  ?></textarea>
                                    <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control  <?= (form_error('password1')) ? 'border border-danger' : 'border border-secondary' ?>" id="password1" placeholder="Password" name="password1" autocomplete="off">
                                        <?= form_error('password1', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control  <?= (form_error('kabupaten')) ? 'border border-danger' : 'border border-secondary' ?>" id="password2" placeholder="Konfirmasi Password" name="password2" autocomplete="off">
                                        <?= form_error('password2', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    Submit
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <p class="small text-dark">Sudah Punya Akun? Silahkan <a href="<?= base_url('auth') ?>" class="text-decoration-none text-success"><strong> LOGIN</strong></a></p>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>

            </div>
        </div>



        <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- SELECT PICKER -->
        <script src="<?= base_url() ?>assets/js/bootstrap-select/bootstrap-select.js"></script>
        <script src="<?= base_url('assets/js/select/defaults-id_ID.min.js') ?>"></script>
        <script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>

        <script>
            $("#kabupaten").change(function() {
                var id = $(this).val();
                var url = "<?= base_url('auth/cari_kecamatan/') ?>";
                $.ajax({
                    type: "post",
                    url: url,
                    dataType: "html",
                    data: "id_kabupaten=" + id,
                    success: function(msg) {
                        $("#kecamatan").html(msg).selectpicker('refresh');
                        $("#kecamatan").selectpicker('refresh');
                    }
                });
            });
        </script>
</body>

</html>