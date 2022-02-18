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
            <!-- Detail User  -->
            <div class="card px-3">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Informasi User Pelanggan</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email User</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" value="<?= $invoice['email'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-4 col-form-label">Nama User</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_lengkap" value="<?= $invoice['nama_lengkap'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="notelp" class="col-sm-4 col-form-label">No. Telp User</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="notelp" value="<?= $invoice['nomor_telepon'] ?>" disabled readonly>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Penerima -->
            <div class="card px-3">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Informasi Data Penerima</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="nama_penerima" class="col-sm-4 col-form-label">Nama Penerima</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_penerima" value="<?= $invoice['nama_penerima'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="notelp_penerima" class="col-sm-4 col-form-label">No. Telp Penerima</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="notelp_penerima" value="<?= $invoice['telp_penerima'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kabupaten" class="col-sm-4 col-form-label">Kabupaten</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kabupaten" value="<?= $invoice['nama_kab'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kecamatan" class="col-sm-4 col-form-label">Kecamatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kecamatan" value="<?= $invoice['nama_kec'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat Penerima</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="alamat" rows="3" disabled readonly><?= $invoice['alamat_penerima'] ?></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <a href="<?= base_url() ?>invoice" class="btn btn-danger px-4 mt-2 mb-5"><i class="fas fa-undo-alt"></i> Kembali</a>
        </div>
        <!-- PRODUK BELI Pelanggan -->
        <div class="col-lg-6">
            <div class="card px-3">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Informasi Proses Pesanan</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="tanggal_pesanan" class="col-sm-4 col-form-label">Tanggal Pesanan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tanggal_pesanan" value="<?= $invoice['tgl_pemesanan'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_kirim" class="col-sm-4 col-form-label">Tanggal Kirim</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tanggal_kirim" value="<?= $invoice['tgl_kirim'] ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_selesai" class="col-sm-4 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tanggal_selesai" value="<?= $invoice['tgl_selesai'] ?>" disabled readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card px-3">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Informasi Pesanan</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="total_pesanan" class="col-sm-4 col-form-label">Total Pesanan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="total_pesanan" value="Rp. <?= number_format($invoice['total_beli'], 0, ',', '.') ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="beli_produk" class="col-sm-4 col-form-label">Total Beli Produk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="beli_produk" value="Rp. <?= number_format($invoice['subtotal'], 0, ',', '.') ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ongkir" class="col-sm-4 col-form-label">Harga Ongkir</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ongkir" value="Rp. <?= number_format($invoice['ongkir'], 0, ',', '.') ?>" disabled readonly>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-striped table-bordered" id="tabel_produkBeli">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th>Produk</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produk_beli as $pb) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-capitalize"><?= $pb['nama_produk'] ?></td>
                                    <td><?= $pb['qty'] ?> pcs</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>