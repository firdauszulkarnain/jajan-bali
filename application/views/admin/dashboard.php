<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <!-- Info Produk -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1 px-5 py-n1"> <i class="fas fa-cookie-bite"></i></span>
                <div class="info-box-content">
                    <h5 class="info-box-text font-weight-lighter mt-2"><b>Jumlah Produk</b></h5>
                    <h1 class="info-box-number font-weight-normal">
                        <?php if ($produk >= 10) : ?>
                            <?= $produk ?>
                        <?php else : ?>
                            0<?= $produk  ?>
                        <?php endif ?>
                    </h1>
                </div>
            </div>
        </div>
        <!-- Info Pelanggan -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1 px-5 py-n1"> <i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <h5 class="info-box-text font-weight-lighter mt-2"><b>Jumlah Pelanggan</b></h5>
                    <h1 class="info-box-number font-weight-normal">
                        <?php if ($pelanggan >= 10) : ?>
                            <?= $pelanggan ?>
                        <?php else : ?>
                            0<?= $pelanggan  ?>
                        <?php endif ?>
                    </h1>
                </div>
            </div>
        </div>

        <div class="clearfix hidden-md-up"></div>

        <!-- Info Pesanan -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1 px-5 py-n1"><i class="nav-icon fas fa-box"></i></span>
                <div class="info-box-content">
                    <h5 class="info-box-text font-weight-lighter mt-2"><b>Jumlah Pesanan</b></h5>
                    <h1 class="info-box-number font-weight-normal">
                        <?php if ($pesanan >= 10) : ?>
                            <?= $pesanan ?>
                        <?php else : ?>
                            0<?= $pesanan  ?>
                        <?php endif ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>