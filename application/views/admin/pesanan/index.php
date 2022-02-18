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
                                <th>Email Pelanggan</th>
                                <th>Total Pesanan</th>
                                <th width="18%">Status Pesanan</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pesanan as $ps) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-capitalize"><?= $ps['no_pesanan'] ?></td>
                                    <td><?= $ps['email'] ?></td>
                                    <td>Rp. <?= number_format($ps['total_beli'], 0, ',', '.') ?></td>
                                    <td><?= $ps['status_pesanan'] ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>pesanan/detail_pesanan/<?= $ps['no_pesanan'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-fw fa-eye"></i></a>
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