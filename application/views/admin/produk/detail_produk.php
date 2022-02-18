<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-12">
            <div class="card px-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 ">
                            <img src="<?= base_url('assets/img/foto_produk/') . $produk['foto_produk']; ?>" class="img-thumbnail mt-3">
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control text-capitalize" id="nama_produk" value="<?= $produk['nama_produk'] ?>" readonly disabled>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori Produk</label>
                                <input type="text" class="form-control text-capitalize" id="kategori" value="<?= $produk['nama_kategori'] ?>" readonly disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="harga">Harga Produk</label>
                                    <input type="text" class="form-control" id="harga" value="<?= number_format($produk['harga_produk'], 0, ',', '.') ?>" readonly disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="stock">Stock Produk</label>
                                    <?php if ($produk['nama_kategori'] == 'Catering') : ?>
                                        <input type="text" class="form-control" id="stock" value="No Stock" readonly disabled>
                                    <?php else : ?>
                                        <input type="text" class="form-control" id="stock" value="<?= $produk['stock'] ?> pcs" readonly disabled>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="card text-center">
                                    <div class="card-header bg-secondary">
                                        <label class="deskripsi">Deskripsi Produk</label>
                                    </div>
                                    <div class="card-body text-justify">
                                        <?= htmlspecialchars_decode($produk['deskripsi']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url() ?>produk" class="btn btn-danger px-4 mt-4"><i class="fas fa-undo-alt"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>