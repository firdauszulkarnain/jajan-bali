<section class="product spad mt-n5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-7">
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <form action="<?= base_url() ?>shop" method="POST">
                            <div class="form-group">
                                <select class="form-control selectpicker border border-dark" id="kategori" name="kategori" data-size="3" title="Semua Kategori">
                                    <?php if ($this->session->userdata('kategori')) : ?>
                                        <option value="all" selected>Semua Kategori</option>
                                    <?php endif ?>
                                    <?php foreach ($kategori as $kt) : ?>
                                        <?php if ($this->session->userdata('kategori') == $kt['id_kategori']) : ?>
                                            <option value="<?= $kt['id_kategori'] ?>" selected><?= $kt['nama_kategori'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $kt['id_kategori'] ?>"><?= $kt['nama_kategori'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-1">

                    </div>
                    <div class="col-sm-7 mt-n2 ">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="<?= base_url() ?>shop/search" method="POST" class="search-form">
                                    <input type="text" placeholder="Cari Jajan..." value="<?= ($this->session->userdata('search')) ? $this->session->userdata('search') : '' ?>" name="key" id="key" style="color: #7fad39;" autocomplete="off">
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (count($produk) > 0) : ?>
                    <div class="row">
                        <?php foreach ($produk as $pd) : ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?= base_url() ?>assets/img/foto_produk/<?= $pd['foto_produk'] ?>">
                                        <ul class="product__item__pic__hover">
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
                                    <div class="product__item__text">
                                        <h6 class="text-capitalize"><a href="<?= base_url() ?>shop/detail_produk/<?= $pd['id_produk'] ?>"><?= $pd['nama_produk'] ?></a></h6>
                                        <h5>Rp. <?= number_format($pd['harga_produk'], 0, ',', '.') ?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div id="pagination" class="float-right d-block">
                        <ul class="gp_pagination">
                            <!-- Pagination links -->
                            <?php foreach ($links as $link) {
                                echo "<li>" . $link . "</li>";
                            } ?>
                        </ul>
                    </div>
                <?php else : ?>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-10">
                            <div class="alert alert-danger text-light font-weight-bolder text-center px-3" role="alert" style="background-color: #DC3545;">
                                Produk Tidak Ditemukan
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <br>
                <span id="catering"></span>
                <hr class="mt-5">
            </div>
        </div>
</section>

<?php if (count($catering) > 0) : ?>
    <section class="hero hero-normal mt-n5">
        <div class="container">
            <div class="product__discount">
                <div class="section-title product__discount__title">
                    <h2>Catering</h2>
                </div>
                <div class="row">
                    <div class="product__discount__slider owl-carousel">
                        <?php foreach ($catering as $ct) : ?>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="<?= base_url() ?>assets/img/foto_produk/<?= $ct['foto_produk'] ?>">
                                        <ul class="product__item__pic__hover">
                                            <li>
                                                <?php if ($this->session->userdata('user')) : ?>
                                                    <a href="<?= base_url() ?>shop/tambah_keranjang/<?= $ct['id_produk'] ?>">
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
                                    <div class="product__discount__item__text">
                                        <h5><a href="<?= base_url() ?>shop/detail_produk/<?= $ct['id_produk'] ?>"><?= $ct['nama_produk'] ?></a></h5>
                                        <div class="product__item__price">Rp. <?= number_format($ct['harga_produk'], 0, ',', '.') ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>

<script>
    $('#key').on('input', function(e) {
        nilai = $(this).val()
        if (nilai == '') {
            url = "<?= base_url('shop') ?>";
            $(".search-form").attr("action", url);
            this.form.submit();
        }
    });

    $('#kategori').change(function(e) {
        kategori = $('#kategori option:selected').text();
        e.preventDefault();
        if (kategori == 'Catering') {
            var elmnt = document.getElementById("catering");
            elmnt.scrollIntoView({
                behavior: "smooth"
            });
        } else {
            this.form.submit();
        }

    });

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>