<section class="breadcrumb-section set-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <div class="card">
                        <div class="card-body primary-btn py-4">
                            <h2>Konfirmasi Pembayaran</h2>
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
            <h4>Konfirmasi Pembayaran</h4>
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="checkout__order mt-3 mb-5">
                        <p class="text-justify">Silahkan lakukan Konfirmasi Pesanan Ke Nomor WA Pada Tombol Berikut dan Inputkan Bukti Transfer pada Form Input Di Bawah ini</p>
                        <a href="https://api.whatsapp.com/send?phone=+6283114499557&text=Halo%20Admin%20Jaje%20Bali%20Men%20Edik%2C%0A%0ASaya%20ingin%20mengonfirmasi%20pembayaran%20pesanan%20dengan%0ANomor%20Pesanan%3A%0ADengan%20Total%3A%0A%0ABerikut%20saya%20kirimkan%20foto%20bukti%20transfer%2C%20Terima%20Kasih." target="_blank" class="site-btn mt-3"><i class="fab fa-fw fa-whatsapp"></i> Konfirmasi Whastapp</a>
                    </div>
                    <?= form_open_multipart('shop/konfirmasi_pembayaran/' . $pesanan['no_pesanan']); ?>
                    <div class="checkout__input">
                        <p>Nomor Pesanan<span></span></p>
                        <input type="text" id="nomor_pesanan" class="disabled_checkout" name="no_pesanan" value="<?= $pesanan['no_pesanan'] ?>" readonly>
                    </div>
                    <div class="checkout__input">
                        <div class="form-group">
                            <p>Tanggal Pengiriman</p>
                            <!-- Kalo Ada Pesanan Isi Catering, Minimal 5 Hari -->
                            <?php if ($catering > 0) : ?>
                                <input type="hidden" name="minDate" class="minDate" value="+5d">
                            <?php else : ?>
                                <!-- Kalo Kecamatan Kuta Selatan & Jam Belum Jam 5 -> Pengiriman Bisa Tanggal Sama -->
                                <?php if ($pesanan['kec_penerima'] == 20  && date('H') < 17) : ?>
                                    <input type="hidden" name="minDate" class="minDate" value="0">
                                    <!-- Kalo Kecamatan Kuta Selatan & Jam Sudah Jam 5 -> Pengiriman Harus Besok -->
                                <?php elseif ($pesanan['kec_penerima'] == 20 && date('H') > 17) : ?>
                                    <input type="hidden" name="minDate" class="minDate" value="+1d">
                                    <!-- Selain itu Minimal 5 Hari -->
                                <?php else : ?>
                                    <input type="hidden" name="minDate" class="minDate" value="+5d">
                                <?php endif ?>
                            <?php endif ?>

                            <div class="input-group mb-2">
                                <input type="hidden" name="id_kecamatan" class="id_kecamatan" value="<?= $pesanan['kec_penerima'] ?>">
                                <input type="hidden" name="tglSaatIni" class="tglSaatIni" value="<?= date('d-m-Y') ?>">

                                <?php if ($catering > 0) : ?>
                                    <input type="text" class="form-control border border-secondary" id="tanggal" name="tanggal_kirim" autocomplete="off" value="<?= date('d-m-Y', strtotime('+5 days')) ?>" placeholder="<?= date('d-m-Y', strtotime('+5 days')) ?>" autocomplete="off">
                                <?php else : ?>
                                    <?php if ($pesanan['kec_penerima'] == 20 && date('H') < 17) : ?>
                                        <input type="text" class="form-control border border-secondary" id="tanggal" name="tanggal_kirim" autocomplete="off" value="<?= date('d-m-Y', strtotime('+0 days')) ?>" placeholder="<?= date('d-m-Y', strtotime('+0 days')) ?>">

                                    <?php elseif ($pesanan['kec_penerima'] == 20 && date('H') > 17) : ?>
                                        <input type="text" class="form-control border border-secondary" id="tanggal" name="tanggal_kirim" autocomplete="off" value="<?= date('d-m-Y', strtotime('+1 days')) ?>" placeholder="<?= date('d-m-Y', strtotime('+1 days')) ?>">

                                    <?php else : ?>
                                        <input type="text" class="form-control border border-secondary" id="tanggal" name="tanggal_kirim" autocomplete="off" value="<?= date('d-m-Y', strtotime('+5 days')) ?>" placeholder="<?= date('d-m-Y', strtotime('+5 days')) ?>" autocomplete="off">
                                    <?php endif ?>
                                <?php endif ?>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jam_penerimaan">Jam Penerimaan</label>
                        <input type="time" class="form-control border border-secondary" id="jam_penerimaan" name="jam_penerimaan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="foto">Bukti Transfer</label>
                        <input type="file" class="input-file" id="foto" name="foto">
                        <?= form_error('foto', '<small class="form-text font-weight-bolder text-danger">', '</small>'); ?>
                        <?php if ($this->session->flashdata('bukti_gagal')) : ?>
                            <small class="form-text font-weight-bolder text-danger"><?= $this->session->flashdata('bukti_gagal') ?></small>
                        <?php endif ?>
                    </div>
                    <a href="<?= base_url() ?>shop/pesanan_saya" class="site-btn font-weight-bolder mt-3 mb-4 px-4"><i class="far fa-fw fa-arrow-alt-circle-left"></i> Kembali</a>
                    <button type="submit" class="site-btn mt-3 mb-4 float-right"><i class="far fa-fw fa-paper-plane"></i> Kirim Bukti Pembayaran</button>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="checkout__order">
                        <h4>Pembayaran</h4>
                        <h5 class="font-weight-bolder">Transfer Bank</h5>
                        <ul>
                            <li><strong>BCA</strong><span> 7386828429</span></li>
                            <li><strong>BNI</strong><span> 7386828429</span></li>
                            <li><strong>MANDIRI</strong><span> 7386828429</span></li>
                        </ul>
                        <hr>
                        <p class="text-justify">Silahkan lakukan pembayaran pada salah satu rekening bank diatas. Kirimkan bukti transfer melalui Form dan Konfirmasi Via Whatsapp</p>
                    </div>
                    <div class="checkout__order mt-3">
                        <h4>Detail Pesanan</h4>
                        <div class="checkout__order__products">Produk <span>Total</span></div>
                        <ul>
                            <?php foreach ($produk as $item) : ?>
                                <?php if ($this->session->flashdata('error' . $item['id_produk'])) : ?>
                                    <li class="text-capitalize text-danger"><?= $item['nama_produk'] ?> (<?= $item['qty'] ?>) <span> Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></span></li>
                                <?php else : ?>
                                    <li class="text-capitalize"><?= $item['nama_produk'] ?> (<?= $item['qty'] ?>) <span> Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></span></li>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </ul>
                        <div class="checkout__order__subtotal">Subtotal <span>Rp. <?= number_format($pesanan['subtotal'], 0, ',', '.'); ?></span></div>
                        <div class="checkout__order__subtotal">Ongkos Kirim <span id="ongkir">Rp. <?= number_format($pesanan['ongkir'], 0, ',', '.'); ?></span></div>
                        <div class="checkout__order__total">Total <span id="total">Rp. <?= number_format($pesanan['total_beli'], 0, ',', '.'); ?></span></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    var minDate = $('.minDate').val();
    $('#tanggal').datepicker({
        autoHide: true,
        format: 'dd-mm-yyyy',
        startDate: minDate
    });

    $('#jam_penerimaan').change(function() {
        var waktu = $(this).val();
        var strJam = waktu.substring(0, 2);
        var jam = parseInt(strJam);
        var idkec = $('.id_kecamatan').val();
        var tglKirim = $('#tanggal').val();
        var tglSaatini = $('.tglSaatIni').val();
        if (idkec == 20 && tglKirim == tglSaatini && jam > 17) {
            toastr.error('Same Day Delivery Hanya Sampai Pukul 17:00');
        }

    });
</script>