<section class="breadcrumb-section set-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <div class="card">
                        <div class="card-body primary-btn py-4">
                            <h2>Keranjang Belanja</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="shoping-cart spad">
    <div class="container">
        <form action="<?= base_url() ?>shop/update_keranjang" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($this->cart->total_items() > 0) : ?>
                                    <?php $i = 1;
                                    foreach ($this->cart->contents() as $item) : ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="<?= base_url() ?>assets/img/foto_produk/<?= $item['picture'] ?>" alt="" width="20%">
                                                <h5 class="text-capitalize"><?= $item['name'] ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                Rp. <?= number_format($item['price'], 0, ',', '.') ?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <input type="hidden" name="rowid[]" value="<?= $item['rowid'] ?>">
                                                    <div class="pro-qty">
                                                        <input type="text" id="qty" name="qty<?= $i ?>" value="<?= $item['qty']; ?>">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="<?= base_url('shop/hapus_item_keranjang/') . $item['rowid']; ?>">
                                                    <span class="icon_close"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="4"><strong class="text-danger"> Tidak Ada Produk Dalam Kerajang </strong></td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="<?= base_url() ?>shop" class="primary-btn"><i class="far fa-fw fa-arrow-alt-circle-left"></i> SHOP</a>
                        <?php if ($this->cart->total_items() > 0) : ?>
                            <button class="primary-btn float-right border-0" type="submit">
                                <i class="fas fa-fw fa-spinner"></i> UPDATE KERANJANG</button>
                        <?php endif ?>
                    </div>
                </div>
                <?php if ($this->cart->total_items() > 0) : ?>
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Total Belanja</h5>
                            <ul>
                                <li>Subtotal <span class="text-dark">Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></span></li>
                                <li>Total <span class="text-dark">Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></span></li>
                            </ul>
                            <a href="<?= base_url() ?>shop/konfirmasi_pesanan" class="primary-btn">KONFIRMASI PESANAN</a>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </form>
    </div>
</section>