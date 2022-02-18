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
                                <th>No Pesanan</th>
                                <th>Total Invoice</th>
                                <th>Tgl. Pemesanan</th>
                                <th>Tgl. Kirim</th>
                                <th>Tgl. Selesai</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($invoice as $iv) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-capitalize"><?= $iv['no_pesanan'] ?></td>
                                    <td>Rp. <?= number_format($iv['total_invoice'], 0, ',', '.') ?></td>
                                    <td><?= $iv['tgl_pemesanan'] ?></td>
                                    <td><?= $iv['tgl_kirim'] ?></td>
                                    <td><?= $iv['tgl_selesai'] ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>invoice/detail_invoice/<?= $iv['no_pesanan'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-fw fa-eye"></i></a>
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