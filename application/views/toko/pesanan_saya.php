<section class="breadcrumb-section set-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <div class="card">
                        <div class="card-body primary-btn py-4">
                            <h2>Pesanan Saya</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shoping-cart spad mt-n4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover dt-responsive nowrap" id="mytabel" width="100%">
                    <thead style="background-color: #7fad39;" class="text-light" id="th-pesanan">
                        <tr>
                            <th class="align-middle">Nomor Pesanan</th>
                            <th class="align-middle" width="18%">Total Belanja</th>
                            <th class="align-middle">Detail Pesanan</th>
                            <th class="align-middle">Status Pesanan</th>
                            <th class="align-middle" width="10%">Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($pesanan) > 0) : ?>
                            <?php foreach ($pesanan as $ps) : ?>
                                <tr id="tb-pesanan">
                                    <th class="align-middle"><?= $ps['no_pesanan'] ?></th>
                                    <th class="align-middle">Rp. <?= number_format($ps['total_beli'], 0, ',', '.') ?></th>
                                    <th class="align-middle">
                                        <a href="<?= base_url() ?>shop/detail_pesanan/<?= $ps['no_pesanan'] ?>" class="font-weight-bolder text-order"><i class="fas fa-fw fa-eye"></i> Lihat Pesanan</a>
                                    </th>
                                    <th class="align-middle">
                                        <?= $ps['status_pesanan'] ?>
                                    </th>
                                    <th class="align-middle text-center">
                                        <?php if ($ps['status_pesanan'] == 'Menunggu Pembayaran') : ?>
                                            <a href="<?= base_url() ?>shop/konfirmasi_pembayaran/<?= $ps['no_pesanan'] ?>" class="btn btn-sm text-light px-4 font-weight-bolder btn-danger">Konfirmasi Pembayaran </a>
                                        <?php elseif ($ps['status_pesanan'] == 'Menunggu Konfirmasi') : ?>
                                            <span class="badge badge-sm text-light px-4 py-2 font-weight-bolder" style="background-color: #E0A800;">Menunggu Konfirmasi</span>
                                        <?php else : ?>
                                            <span class="badge badge-sm text-light px-4 py-2 font-weight-bolder" style="background-color: #7fad39;"> LUNAS</span>
                                        <?php endif; ?>
                                    </th>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <th colspan="5" class="text-center"><strong class="text-danger">Tidak Ada Pesanan</strong></th>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
                <hr>
            </div>
        </div>
    </div>
</section>