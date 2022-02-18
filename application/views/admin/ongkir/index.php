<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <a class="btn btn-sm btn-success px-4 py-2" href="<?= base_url() ?>ongkir/tambah_ongkir"><i class="fas fa-fw fa-plus"></i> Tambah Ongkir</a>
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
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                <th width="15%">Harga Ongkir</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ongkir as $og) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-capitalize"><?= $og['nama_kab'] ?></td>
                                    <td class="text-capitalize"><?= $og['nama_kec'] ?></td>
                                    <td>Rp. <?= number_format($og['harga_ongkir'], 0, ',', '.') ?></td>
                                    <td>
                                        <!-- Button Edit -->
                                        <a href="#" data-id="<?= $og['id_ongkir'] ?>" data-toggle="modal" data-target="#ongkirModal" class="btn btn-sm btn-info text-light modal_ongkir"><i class="fas fa-fw fa-edit"></i></a>
                                        <!-- Button Hapus -->
                                        <form action="<?= base_url() ?>ongkir/hapus_ongkir" method="POST" class="d-inline">
                                            <input type="hidden" name="id_ongkir" value="<?= $og['id_ongkir'] ?>">
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

<!-- Ongkir Modal -->
<div class="modal fade mt-5" id="ongkirModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Harga Ongkir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>ongkir/update_ongkir" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_ongkir" id="id_ongkir" value="">
                    <div class="form-group">
                        <label for="kabupaten">Kabupaten</label>
                        <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Kabupaten</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="harga_ongkir">Harga</label>
                        <input type="text" class="form-control uang" id="harga_ongkir" name="harga_ongkir" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm btn px-4 py-2">Simpan Data Ongkir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Kalo Modal Ongkir Di Click
    $(document).on("click", ".modal_ongkir", function() {
        // Ambil id Ongkir + Cari Ongkir
        var id = $(this).data('id');
        var url = "<?= base_url('ongkir/detail_ongkir/') ?>";
        $.ajax({
            type: "post",
            url: url,
            dataType: "html",
            data: "id_ongkir=" + id,
            success: function(msg) {
                let tmp = JSON.parse(msg);
                // Isi Value id, kab, kec dan harga di modal update kategori
                $(".modal-body #id_ongkir").val(id);
                $(".modal-body #kabupaten").val(tmp.kabupaten);
                $(".modal-body #kecamatan").val(tmp.kecamatan);
                $(".modal-body #harga_ongkir").val(tmp.harga_ongkir);
            }
        });
    });
</script>