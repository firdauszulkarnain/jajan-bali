<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">

    <div class="row d-flexk justify-content-center">
        <div class="col-lg-10">
            <div class="card px-3">
                <div class="card-body">
                    <form action="<?= base_url() ?>admin/ganti_password" method="POST">
                        <div class="row">
                            <div class="col-lg-4 ">
                                <img src="<?= base_url() ?>assets/img/profile/Default.jpg" class="img-thumbnail mt-3">
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="profile">Username</label>
                                    <input type="text" class="form-control text-capitalize" id="profile" value="<?= $admin['username'] ?>" readonly disabled>
                                </div>
                                <div class="form-group">
                                    <label for="old_password">Password Lama</label>
                                    <input type="password" class="form-control <?= ($this->session->flashdata('old_password')) ? 'is-invalid' : '' ?>" id="old_password" name="old_password" autocomplete="off">
                                    <?php if ($this->session->flashdata('old_password')) : ?>
                                        <small class="form-text text-danger"><?= $this->session->flashdata('old_password'); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password1">Password Baru</label>
                                        <input type="password" class="form-control <?= (form_error('password1')) ? 'is-invalid' : '' ?>" id="password1" name="password1" autocomplete="off">
                                        <?= form_error('password1', '<small class="form-text text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password2">Konfirmasi Password </label>
                                        <input type="password" class="form-control" id="password2" name="password2" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success float-right mt-4 px-4" type="submit">Simpan Password</button>
                        <a href="<?= base_url() ?>admin/dashboard" class="btn btn-danger px-4 mt-4"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>