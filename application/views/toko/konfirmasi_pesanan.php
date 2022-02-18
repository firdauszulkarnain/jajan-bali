<section class="breadcrumb-section set-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <div class="card">
                        <div class="card-body primary-btn py-4">
                            <h2>Konfirmasi Pesanan</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad mt-n4">
    <div class="container">
        <?php foreach ($this->cart->contents() as $item) : ?>
            <?php if ($item['options']['Category'] == 'Catering') : ?>
                <div class="catering" data-catering="catering"></div>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($this->session->flashdata('gagal_pesan')) : ?>
            <div class="alert alert-danger alert-dismissible text-light fade show py-3" role="alert" style="background-color: #DC3545;">
                <?= $this->session->flashdata('gagal_pesan') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif ?>
        <div class="checkout__form">
            <h4>Konfirmasi Pemesanan</h4>
            <form action="" method="POST" id="form_konfirmasi">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <input type="hidden" name="id_pelanggan" value="<?= $user['id_pelanggan'] ?>">
                        <div class="checkout__input">
                            <p>Nomor Pesanan<span></span></p>
                            <input type="text" id="nomor_pesanan" class="disabled_checkout" name="nomor_pesanan" value="<?= $nomor ?>" readonly>
                        </div>
                        <div class="checkout__input">
                            <p>Nama Lengkap Penerima<span>*</span></p>
                            <input type="text" id="nama_penerima" name="nama_penerima" value="<?= $user['nama_lengkap'] ?>" autocomplete="off" class="<?= (form_error('nama_penerima')) ? 'border border-danger' : 'border border-secondary' ?>">
                            <?= form_error('nama_penerima', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>No. Telepon<span>*</span></p>
                                    <input type="text" id="notelp" name="notelp" value="<?= $user['nomor_telepon'] ?>" autocomplete="off" class="<?= (form_error('notelp')) ? 'border border-danger' : 'border border-secondary' ?>">
                                    <?= form_error('notelp', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class=" col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" id="email" name="email" value="<?= $user['email'] ?>" class="disabled_checkout" readonly disabled>
                                    <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__tanggal">
                            <p class="text-justify" style="font-size: 14px;">*Jika Kabupaten/Kecamatan Anda TIdak Ditemukan, Maka Lokasi Anda Tidak Bisa Kami Jangkau </p>
                        </div>
                        <div class="checkout__input">
                            <p>Kabupaten<span>*</span></p>
                            <div class="form-group">
                                <select class="form-control selectpicker <?= (form_error('kabupaten')) ? 'border border-danger' : 'border border-secondary' ?>" id="kabupaten" name="kabupaten" data-size="4" data-live-search="true" title="Pilih Kabupaten">
                                    <?php foreach ($kabupaten as $kb) : ?>
                                        <option value="<?= $kb['id_kab'] ?>"><?= $kb['nama_kab'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('kabupaten', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Kecamatan<span>*</span> <small>(Silahkan Pilih Kabupaten Terlebih Dahulu)</small></p>
                            <select class="form-control selectpicker  <?= (form_error('kecamatan')) ? 'border border-danger' : 'border border-secondary' ?>" id="kecamatan" name="kecamatan" title="Pilih Kecamatan" data-size="4" data-live-search="true">
                                <option value=""></option>
                            </select>
                            <p id="info" class="text-danger"></p>
                            <?= form_error('kecamatan', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="checkout__tanggal">
                            <p class="text-justify" style="font-size: 14px;">*Pemesanan Untuk Wilayah <b> Di Dalam Kuta Selatan </b> Dapat Diantar Hari ini Atau Besok Tergantung Jam Pembayaran Pemesanan. </p>
                            <p class="text-justify mt-n3" style="font-size: 14px;">*Pemesanan Untuk Wilayah <b> Di Luar Kuta Selatan </b>Membutuhkan Waktu Minimal<b> 5 Hari</b>. </p>
                        </div>
                        <div class="checkout__input">
                            <p>Alamat<span>*</span></p>
                            <div class="form-group">
                                <textarea class="form-control <?= (form_error('alamat')) ? 'border border-danger' : 'border border-secondary' ?>" id="alamat" name="alamat" rows="3" autocomplete="off"><?= set_value('alamat') ?></textarea>
                                <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Catatan</p>
                            <div class="form-group">
                                <textarea class="form-control border border-secondary" id="catatan" name="catatan" rows="5"></textarea>
                            </div>
                        </div>
                        <a href="<?= base_url() ?>shop" class="site-btn mb-3"><i class="far fa-fw fa-arrow-alt-circle-left"></i> Shop</a>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="checkout__order">
                            <h4>Detail Order Produk</h4>
                            <div class="checkout__order__products">Produk <span>Total</span></div>
                            <ul>
                                <input type="hidden" name="qty" class="qty" value="<?= $this->cart->total_items(); ?>">
                                <?php foreach ($this->cart->contents() as $item) : ?>
                                    <li class="text-capitalize"><?= $item['name'] ?> (<?= $item['qty'] ?>) <span> Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></span></div>
                            <input type="hidden" name="harga_ongkir" id="harga_ongkir" class="harga_ongkir">
                            <div class="checkout__order__subtotal">Ongkos Kirim <span id="ongkir"> 0</span></div>
                            <div class="checkout__order__total">Total <span id="total">Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></span></div>
                            <small class="text-justify text-danger" style="font-size: 13px;">* Minimal Diluar Wilayah Kuta Selatan Sebanyak 300 pcs</small>
                            <button type="submit" class="site-btn tombol-bayar">Proses Pembayaran</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<script>
    // Cari Kecamatan
    $("#kabupaten").change(function() {
        var id = $(this).val();
        var url = "<?= base_url('shop/cari_kecamatan/') ?>";
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

    // Cek Kecamatan
    $("#kecamatan").change(function() {
        var idkab = $("#kabupaten").val();
        var idkec = $(this).val();
        var catering = $('.catering').data('catering');
        Jam = new Date().getHours();
        if (catering) {
            $('#info').html('Pesanan Catering Baru Dapat Dikirimkan Dalam 5 Hari Sejak Pembayaran!')
        } else {
            if (idkec == 20 && Jam < 17) {
                $('#info').html('Pesanan Dapat Dikirimkan Hari ini Sebelum Pukul 17:00!');
            } else if (idkec == 20 && Jam > 17) {
                $('#info').html('Pesanan Paling Cepat Dapat Dikirimkan Besok!');
            } else {
                $('#info').html('Pesanan Baru Dapat Dikirimkan Dalam 5 Hari Sejak Pembayaran!')
            }
        }
        // Cari Ongkir
        var url = "<?= base_url('shop/cari_ongkir/') ?>";
        $.ajax({
            type: "post",
            url: url,
            dataType: "html",
            data: {
                "id_kabupaten": idkab,
                "id_kecamatan": idkec
            },
            // Tampilkan Ongkir
            success: function(msg) {
                let tmp = JSON.parse(msg)
                $('#ongkir').html(tmp.ongkir);
                $('#total').html(tmp.total);
                $('.harga_ongkir').val(tmp.harga_ongkir);
            }
        });
    })

    $("#kecamatan").change(function() {
        // Kalo Kecamatan Diluat Kuta Selatan & Pemesanan Kurang dari 300
        var qty = $('.qty').val();
        var idkec = $(this).val();
        var catering = $('.catering').data('catering');
        if (!catering) {
            if (qty < 300 && idkec != 20) {
                var url = "<?= base_url('shop/block_pesanan') ?>";
                $("#form_konfirmasi").attr("action", url);
            }
        }
    });
</script>