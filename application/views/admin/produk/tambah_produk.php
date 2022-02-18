<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card pb-3 mb-5">
                <div class="card-body px-4">
                    <?= form_open_multipart('produk/tambah_produk'); ?>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-8">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control text-capitalize <?= (form_error('nama_produk')) ? 'is-invalid' : '' ?>" id="nama_produk" name="nama_produk" value="<?= set_value('nama_produk');  ?>" autocomplete="off">
                            <?= form_error('nama_produk', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="harga">Harga Produk</label>
                            <input type="text" class="form-control uang <?= (form_error('harga')) ? 'is-invalid' : '' ?>" id="harga" name="harga" value="<?= set_value('harga');  ?>" autocomplete="off">
                            <?= form_error('harga', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control text-capitalize selectpicker <?= (form_error('kategori')) ? 'border border-danger' : 'border border-secondary' ?>" id="kategori" name="kategori" data-size="4" data-live-search="true" title="Pilih Kategori">
                                    <?php foreach ($kategori as $kt) : ?>
                                        <option value="<?= $kt['id_kategori'] ?>" <?= set_select('kategori', $kt['id_kategori'], $kt['nama_kategori']) ?> class="text-capitalize"><?= $kt['nama_kategori'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('kategori', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripi Produk</label>
                                <?php if (form_error('deskripsi')) :  ?>
                                    <small class="form-text text-danger mt-n2"><?= form_error('deskripsi') ?></small>
                                <?php endif; ?>
                                <input id="deskripsi" type="hidden" name="deskripsi" value="<?= set_value('deskripsi');  ?>">
                                <trix-editor input="deskripsi" class="<?= (form_error('deskripsi')) ? 'border border-danger' : 'border border-secondary' ?>"></trix-editor>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="foto" class="text-dark font-weight-bold">Foto Produk</label>
                                <input type="file" class="input-file" id="foto" name="foto" onchange="previewImage()" required oninvalid="this.setCustomValidity('Foto Tidak Boleh Kosong!')" oninput="setCustomValidity('')">
                            </div>
                            <h6 class="text-center font-weight-bolder">Preview Foto Produk</h6>
                            <hr>
                            <img class="img-preview img-fluid mb-3 tengah img-thumbnail" style="max-width: 280px; max-height: 280px;">
                        </div>
                    </div>

                    <a href="<?= base_url() ?>produk" class="btn btn-danger px-4 mt-3"><i class="fas fa-undo-alt"></i> Kembali</a>
                    <button type="submit" class="btn btn-success mt-3 px-3 float-right">Simpan Data Produk</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Matiin input file di Trix Editor
    $('trix-editor').css("min-height", "200px");
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    // Buat Preview Image Produk
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