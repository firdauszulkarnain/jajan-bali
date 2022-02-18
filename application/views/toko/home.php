<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__item set-bg" data-setbg="<?= base_url() ?>assets/img/hero/banner.png">
                    <div class="hero__text">
                        <span>JAJANAN BALI MEN EDIK</span>
                        <h2>Jajanan <br />Bali Asli</h2>
                        <p>Dapat Diantarkan atau Datang ke Toko</p>
                        <a href="<?= base_url() ?>shop" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php foreach ($kategori as $kt) : ?>
                    <?php if ($kt['nama_kategori'] != 'Catering') : ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="<?= base_url() ?>assets/img/categories/<?= $kt['foto_kategori'] ?>">
                                <h5><a href="<?= base_url() ?>shop/cari_kategori/<?= $kt['id_kategori'] ?>"><?= $kt['nama_kategori'] ?></a></h5>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="<?= base_url() ?>assets/img/categories/<?= $kt['foto_kategori'] ?>">
                                <h5><a href="<?= base_url() ?>shop/cari_kategori/all"><?= $kt['nama_kategori'] ?></a></h5>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="featured spad">
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Jajanan Bali</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php foreach ($produk as $pd) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url() ?>assets/img/foto_produk/<?= $pd['foto_produk'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li>
                                    <?php if ($this->session->userdata('user')) : ?>
                                        <a href="<?= base_url() ?>shop/tambah_keranjang/<?= $pd['id_produk'] ?>">
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
                        <div class="featured__item__text">
                            <h6 class="text-capitalize"><a href="<?= base_url() ?>shop/detail_produk/<?= $pd['id_produk'] ?>"><?= $pd['nama_produk'] ?></a></h6>
                            <h5>Rp. <?= number_format($pd['harga_produk'], 0, ',', '.') ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="primary-btn float-right border-0" href="<?= base_url() ?>shop">Lihat Produk Lainnya <i class="far fa-fw fa-arrow-alt-circle-right"></i></a>
    </div>
</section>