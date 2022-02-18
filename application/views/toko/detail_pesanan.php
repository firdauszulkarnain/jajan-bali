<section class="breadcrumb-section set-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <div class="card">
                        <div class="card-body primary-btn py-4">
                            <h2>Detail Pesanan</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="checkout__input">
                        <p>Nomor Pesanan</p>
                        <input type="text" id="nomor_pesanan" class="disabled_checkout" name="nomor_pesanan" value="<?= $pesanan['no_pesanan'] ?>" disabled readonly>
                    </div>
                    <div class="checkout__input">
                        <p>Nama Lengkap Penerima</p>
                        <input type="text" id="nama_lengkap" class="disabled_checkout" name="nama_lengkap" value="<?= $pesanan['nama_penerima'] ?>" disabled readonly>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>No. Telepon</p>
                                <input type="text" id="no_telp" class="disabled_checkout" name="no_telp" value="<?= $pesanan['telp_penerima'] ?>" disabled readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Email</p>
                                <input type="text" id="email" class="disabled_checkout" name="email" value="<?= $pesanan['email'] ?>" disabled readonly>
                            </div>
                        </div>
                    </div>
                    <div class="checkout__input">
                        <p>Kabupaten</p>
                        <input type="text" id="kabupaten" class="disabled_checkout" name="kabupaten" value="<?= $pesanan['nama_kab'] ?>" disabled readonly>
                    </div>
                    <div class="checkout__input">
                        <p>Kecamatan</p>
                        <input type="text" id="kecamatan" class="disabled_checkout" name="kecamatan" value="<?= $pesanan['nama_kec'] ?>" disabled readonly>
                    </div>
                    <div class="checkout__input">
                        <p>Alamat Penerima</p>
                        <input type="text" id="alamat" class="disabled_checkout" name="alamat" value="<?= $pesanan['alamat_penerima'] ?>" disabled readonly>
                    </div>
                    <div class="checkout__input">
                        <p>Catatan</p>
                        <div class="form-group">
                            <textarea class="form-control border border-secondary" id="catatan" name="catatan" rows="5" disabled readonly><?= $pesanan['catatan']  ?></textarea>
                        </div>
                    </div>
                    <div class="checkout__input">
                        <a href="<?= base_url() ?>shop/pesanan_saya" class="site-btn font-weight-bolder px-4"><i class="far fa-fw fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="checkout__order">
                        <h4>Detail Order Produk</h4>
                        <div class="checkout__order__products">Produk <span>Total</span></div>
                        <ul>
                            <?php foreach ($produk as $item) : ?>
                                <li class="text-capitalize"><?= $item['nama_produk'] ?> (<?= $item['qty'] ?>) <span> Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="checkout__order__subtotal">Subtotal <span>Rp. <?= number_format($pesanan['subtotal'], 0, ',', '.'); ?></span></div>
                        <div class="checkout__order__subtotal">Ongkos Kirim <span id="ongkir">Rp. <?= number_format($pesanan['ongkir'], 0, ',', '.'); ?></span></div>
                        <div class="checkout__order__total">Total <span id="total">Rp. <?= number_format($pesanan['total_beli'], 0, ',', '.'); ?></span></div>

                    </div>
                    <?php if ($pesanan['status_pesanan'] == 'Menunggu Pembayaran') : ?>
                        <div class="checkout__order mt-3">
                            <h4>Pembayaran</h4>
                            <h5 class="font-weight-bolder">Transfer Bank</h5>
                            <ul>
                                <li><strong>BCA</strong><span> 7386828429</span></li>
                                <li><strong>BNI</strong><span> 7386828429</span></li>
                                <li><strong>MANDIRI</strong><span> 7386828429</span></li>
                            </ul>
                            <hr>
                            <p class="text-justify">Silahkan lakukan pembayaran pada salah satu rekening bank diatas. Kirimkan bukti transfer melalui Form dan Konfirmasi Via Whatsapp</p>
                            <a href="<?= base_url() ?>shop/konfirmasi/<?= $pesanan['no_pesanan'] ?>" class="btn-block site-btn text-center">Konfirmasi Pembayaran</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>