<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">

    <div class="row d-flexk justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?= form_open_multipart('produk/update_produk/' . $produk['id_produk']); ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <?php if ($produk['foto_produk']) : ?>
                                <img src="<?= base_url('assets/img/foto_produk/') . $produk['foto_produk']; ?>" class="img-preview img-fluid img-thumbnail tengah mt-3  mx-auto d-block">
                            <?php else : ?>
                                <img class="img-preview img-fluid mt-3 mx-auto d-block">
                            <?php endif ?>
                            <hr>
                            <div class="form-group">
                                <label for="foto" class="text-dark font-weight-bold">Foto Produk</label>
                                <input type="file" class="input-file" id="foto" name="foto" onchange="previewImage()" oninvalid="this.setCustomValidity('Foto Tidak Boleh Kosong!')" oninput="setCustomValidity('')">
                                <?= form_error('foto', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control text-capitalize <?= (form_error('nama_produk')) ? 'is-invalid' : '' ?>" " id=" nama_produk" name="nama_produk" value="<?= $produk['nama_produk'] ?>">
                                    <?= form_error('nama_produk', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="harga_produk">Harga Produk</label>
                                    <input type="text" class="form-control uang <?= (form_error('harga')) ? 'is-invalid' : '' ?>" id="harga_produk" name="harga_produk" value="<?= number_format($produk['harga_produk'], 0, ',', '.') ?>">
                                    <?= form_error('harga', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control text-capitalize selectpicker <?= (form_error('kategori')) ? 'border border-danger' : 'border border-secondary' ?> " id="kategori" name="kategori" data-size="4" data-live-search="true" title="<?= ($produk['id_kategori'] == 0) ? 'Tak Berkategori' : 'Pilih Kategori' ?> ">
                                    <?php foreach ($kategori as $kt) : ?>
                                        <?php if ($produk['id_kategori'] == $kt['id_kategori']) : ?>
                                            <option value="<?= $kt['id_kategori'] ?>" selected class="text-capitalize"><?= $kt['nama_kategori'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $kt['id_kategori'] ?>" <?= set_select('kategori', $kt['id_kategori'], $kt['nama_kategori']) ?> class="text-capitalize"><?= $kt['nama_kategori'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('kategori', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripi Produk</label>
                                <?php if (form_error('deskripsi')) :  ?>
                                    <small class="form-text text-danger mt-n2"><?= form_error('deskripsi') ?></small>
                                <?php endif; ?>
                                <input id="deskripsi" type="hidden" name="deskripsi" value="<?= $produk['deskripsi'];  ?>">
                                <trix-editor input="deskripsi" class="<?= (form_error('deskripsi')) ? 'border border-danger' : 'border border-secondary' ?>"></trix-editor>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url() ?>produk" class="btn btn-danger px-4 mt-4"><i class="fas fa-undo-alt"></i> Kembali</a>
                    <button type="submit" class="btn btn-success mt-3 px-3 float-right">Simpan Data Produk</button>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Buat Preview Update Image Produk
    function previewImage() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>