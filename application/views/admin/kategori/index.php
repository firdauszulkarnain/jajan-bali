<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <button type="button" class="btn-sm btn-success px-4 py-2 border-0" data-toggle="modal" data-target="#tambahKategori">
                <i class="fas fa-fw fa-plus"></i> Tambah Kategori
            </button>
        </div>
    </div>
</section>

<section class="content">

    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="card mb-5">
                <div class="card-body">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="mytabel" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th>Nama Kategori</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategori as $kg) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-capitalize"><?= $kg['nama_kategori'] ?></td>
                                    <td>

                                        <a href="#" data-id="<?= $kg['id_kategori'] ?>" data-name="<?= $kg['nama_kategori'] ?>" data-toggle="modal" data-target="#kategoriModal" class="btn btn-sm btn-info text-light modal_kategori"><i class="fas fa-fw fa-edit"></i></a>

                                        <form action="<?= base_url() ?>kategori/hapus_kategori" method="POST" class="d-inline">
                                            <input type="hidden" name="id_kategori" value="<?= $kg['id_kategori'] ?>">
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

<!-- Update Kategori Modal -->
<div class="modal fade mt-5" id="kategoriModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>kategori/update_kategori" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_kategori" id="id_kategori" value="">
                    <div class="form-group">
                        <label for="update_kategori">Nama Kategori</label>
                        <input type="text" class="form-control text-capitalize" id="update_kategori" name="nama_kategori" autocomplete="off" required oninvalid="this.setCustomValidity('Nama Kategori Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm btn px-4 py-2">Simpan Kategori</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambah Kategori Modal-->
<div class="modal fade" id="tambahKategori" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>kategori/tambah_kategori" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="tambah_kategori">Nama Kategori</label>
                        <input type="text" class="form-control text-capitalize" id="tambah_kategori" name="nama_kategori" autocomplete="off" required oninvalid="this.setCustomValidity('Nama Kategori Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan Kategori</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".modal_kategori", function() {
        var id = $(this).data('id');
        var name = $(this).data('name')
        $(".modal-body #id_kategori").val(id);
        $(".modal-body #update_kategori").val(name);
    });
</script>