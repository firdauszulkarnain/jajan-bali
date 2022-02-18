<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">

    <div class="row d-flexk justify-content-center">
        <div class="col-lg-6">
            <div class="card px-3">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <select class="form-control selectpicker <?= (form_error('kabupaten')) ? 'border border-danger' : 'border border-secondary' ?>" id="kabupaten" name="kabupaten" data-size="4" data-live-search="true" title="Pilih Kabupaten">
                                <?php foreach ($kabupaten as $kb) : ?>
                                    <option value="<?= $kb['id_kab'] ?>"><?= $kb['nama_kab'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('kabupaten', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="Kecamatan">Kecamatan</label><small>(Silahkan Pilih Kabupaten Terlebih Dahulu)</small>
                            <select class="form-control selectpicker  <?= (form_error('kecamatan')) ? 'border border-danger' : 'border border-secondary' ?>" id="kecamatan" name="kecamatan" title="Pilih Kecamatan" data-size="4" data-live-search="true">
                                <option value=""></option>
                            </select>
                            <?= form_error('kecamatan', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="harga_ongkir">Harga Ongkir</label>
                            <input type="text" class="form-control uang  <?= (form_error('harga_ongkir')) ? 'border border-danger' : 'border border-secondary' ?>" id="harga_ongkir " name="harga_ongkir" value="<?= set_value('harga_ongkir');  ?>" autocomplete="off">
                            <?= form_error('harga_ongkir', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <a href="<?= base_url() ?>ongkir" class="btn btn-sm btn-danger px-4 py-2 mt-3 mb-5"><i class="fas fa-undo-alt"></i> Kembali</a>
                        <button class="btn btn-sm btn-success px-4 py-2 mt-3 float-right">Simpan Ongkir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    // Kalo Kabupaten Berubah
    $("#kabupaten").change(function() {
        // Ambil id Kab + cari kecamatan yang ada
        var id = $(this).val();
        var url = "<?= base_url('ongkir/cari_kecamatan/') ?>";
        $.ajax({
            type: "post",
            url: url,
            dataType: "html",
            data: "id_kabupaten=" + id,
            success: function(msg) {
                // Tampilin di input select kecamatan
                $("#kecamatan").html(msg).selectpicker('refresh');
                $("#kecamatan").selectpicker('refresh');
            }
        });
    });
</script>