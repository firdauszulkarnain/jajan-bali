<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="text-capitalize"><?= $produk['nama_produk'] ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-details spad mt-n5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large img-thumbnail shadow-sm p-3 mb-5 bg-white rounded" src="<?= base_url() ?>assets/img/foto_produk/<?= $produk['foto_produk'] ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <form action="<?= base_url() ?>shop/tambah_keranjang/<?= $produk['id_produk'] ?>" method="POST">
                        <h3 class="text-capitalize"><?= $produk['nama_produk'] ?></h3>
                        <div class="product__details__price">Rp. <?= number_format($produk['harga_produk'], 0, ',', '.') ?></div>
                        <ul>
                            <?php if ($produk['nama_kategori'] != 'Catering') : ?>
                                <li><b>Stock Produk</b> <span><?= $produk['stock'] ?> pcs</span></li>
                            <?php endif ?>
                            <li>
                                <b>Kategori</b>
                                <?php if (!$produk['kategori_id'] == NULL) : ?>
                                    <span class="text-capitalize"><?= $produk['nama_kategori'] ?></span>
                                <?php else : ?>
                                    <span class="text-capitalize">Tak Berkategori</span>
                                <?php endif ?>
                            </li>
                            <li><b>Toko</b> <span class="text-capitalize">Jaje Bali Men Edik</span></li>
                        </ul>
                        <div class="product__details__quantity mt-5">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" name="qty" id="qty" value="1" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <?php if ($this->session->userdata('user')) : ?>
                            <button class="primary-btn border-0" type="submit">Tambah Ke Keranjang</button>
                        <?php else : ?>
                            <a href="<?= base_url() ?>auth" class="primary-btn">Tambah Ke Keranjang</a>
                        <?php endif ?>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Infromasi Lengkap Jajanan Bali Men Edik</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <?= htmlspecialchars_decode($produk['deskripsi']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Produk Lainnya</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($related as $item) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?= base_url() ?>assets/img/foto_produk/<?= $item['foto_produk'] ?>">
                            <ul class="product__item__pic__hover">
                                <li>
                                    <?php if ($this->session->userdata('user')) : ?>
                                        <a href="<?= base_url() ?>shop/tambah_keranjang/<?= $item['id_produk'] ?>">
                                            <i class="fas fa-shopping-bag"></i>
                                        </a>
                                    <?php else : ?>
                                        <a href="<?= base_url() ?>auth">
                                            <i class="fas fa-shopping-bag"></i>
                                        </a>
                                    <?php endif ?>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6 class="text-capitalize"><a href="<?= base_url() ?>shop/detail_produk/<?= $item['id_produk'] ?>"><?= $item['nama_produk'] ?></a></h6>
                            <h5>Rp. <?= number_format($item['harga_produk'], 0, ',', '.') ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>