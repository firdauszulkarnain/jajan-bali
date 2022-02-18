<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-lg-6">
            <div class="card px-3">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Kontak Pelanggan</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email Pelanggan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" value="<?= $pelanggan['email'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_lengkap" value="<?= $pelanggan['nama_lengkap'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="notelp" class="col-sm-4 col-form-label">No. Telp Pelanggan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="notelp" value="<?= $pelanggan['nomor_telepon'] ?>" disabled readonly>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url() ?>pelanggan" class="btn btn-danger px-4 mt-2 mb-5"><i class="fas fa-undo-alt"></i> Kembali</a>
        </div>


        <div class="col-lg-6">
            <div class="card px-3">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Alamat Pelanggan</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="kabupaten" class="col-sm-4 col-form-label">Kabupaten</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kabupaten" value="<?= $pelanggan['nama_kab'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kecamatan" class="col-sm-4 col-form-label">Kecamatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kecamatan" value="<?= $pelanggan['nama_kab'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat Pelanggan</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="alamat" rows="3" disabled readonly><?= $pelanggan['alamat'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>