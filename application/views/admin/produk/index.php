<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <a class="btn btn-sm btn-success px-4 py-2" href="<?= base_url() ?>produk/tambah_produk"><i class="fas fa-fw fa-plus"></i> Tambah Produk</a>
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
                                <th width="40%">Nama Produk</th>
                                <th>Harga Produk</th>
                                <th width="12%">Stock Produk</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produk as $pd) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-capitalize"><?= $pd['nama_produk'] ?></td>
                                    <td>Rp. <?= number_format($pd['harga_produk'], 0, ',', '.') ?></td>
                                    <td>
                                        <?php if ($pd['nama_kategori'] != 'Catering') : ?>
                                            <?= $pd['stock'] ?> pcs
                                        <?php else : ?>
                                            <span class="font-italic"> No Stock</span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?php if ($pd['nama_kategori'] != 'Catering') : ?>
                                            <!-- Button Tambah Stock -->
                                            <a href="javascript:;" data-id_produk="<?= $pd['id_produk']; ?>" data-toggle="modal" data-target="#tambahStock">
                                                <button type="button" class="btn btn-secondary btn-sm">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                            </a>
                                        <?php endif ?>
                                        <!-- Button Detail -->
                                        <a href="<?= base_url() ?>produk/detail_produk/<?= $pd['id_produk'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-fw fa-eye"></i> </a>
                                        <!-- Button Edit -->
                                        <a href="<?= base_url() ?>produk/update_produk/<?= $pd['id_produk'] ?>" class="btn btn-sm btn-info text-light"><i class="fas fa-fw fa-edit"></i></a>
                                        <!-- Button Hapus -->
                                        <form action="<?= base_url() ?>produk/hapus_produk" method="POST" class="d-inline">
                                            <input type="hidden" name="id_produk" value="<?= $pd['id_produk'] ?>">
                                            <button class="btn btn-sm btn-danger text-light tombol-hapus" type="submit">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
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


<!-- MODAL TAMBAH STOCK -->
<div class="modal fade mt-5" id="tambahStock" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Stock Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>produk/tambah_stock" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_produk" name="id_produk">
                    <div class="form-group">
                        <label for="stock">Stock Produk</label>
                        <input type="number" class="form-control" id="stock" name="stock" autocomplete="off" placeholder="Masukan stock Produk..." min="1" required oninvalid="this.setCustomValidity('Minimal Tambah 1 Stock!')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah Stock</button>
                </div>
            </form>
        </div>
    </div>
</div>