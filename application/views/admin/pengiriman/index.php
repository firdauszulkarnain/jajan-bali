<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="card-body">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="mytabel" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th width="18%">No Pesanan</th>
                                <th>Total Pesanan</th>
                                <th>Harga Ongkir</th>
                                <th>Tanggal Kirim</th>
                                <th width="15%">Status Pesanan</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengiriman as $pb) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-capitalize"><a href="<?= base_url() ?>pesanan/detail_pesanan/<?= $pb['no_pesanan'] ?>" class="font-weight-bolder"><?= $pb['no_pesanan'] ?></a></td>
                                    <td>Rp. <?= number_format($pb['total_beli'], 0, ',', '.') ?></td>
                                    <td>Rp. <?= number_format($pb['ongkir'], 0, ',', '.') ?></td>
                                    <td><?= $pb['tgl_kirim'] ?></td>
                                    <td>
                                        <?php if ($pb['status_pesanan'] == 'Pesanan Di Proses') : ?>
                                            <span class="badge badge-danger"> <?= $pb['status_pesanan'] ?></span>
                                        <?php else : ?>
                                            <span class="badge badge-success"> <?= $pb['status_pesanan'] ?></span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?php if ($pb['status_pesanan'] == 'Pesanan Di Proses') : ?>
                                            <form action="<?= base_url() ?>pesanan/update_pengiriman" method="POST" class="d-inline">
                                                <input type="hidden" name="no_pesanan" value="<?= $pb['no_pesanan'] ?>">
                                                <button class="btn btn-sm btn-danger text-light font-weight-bolder tombol-kirim px-3" type="submit">
                                                    Kirim
                                                </button>
                                            </form>
                                        <?php else : ?>
                                            <form action="<?= base_url() ?>pesanan/selesai_pesanan" method="POST" class="d-inline">
                                                <input type="hidden" name="no_pesanan" value="<?= $pb['no_pesanan'] ?>">
                                                <button class="btn btn-sm btn-danger text-light font-weight-bolder px-3 tombol-selesai" type="submit">
                                                    Selesai
                                                </button>
                                            </form>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>