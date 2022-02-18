<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
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
                                <th width="18%">No Pesanan</th>
                                <th>Total Pesanan</th>
                                <th>Foto Bukti</th>
                                <th>Tanggal Bayar</th>
                                <th width="15%">Konfirmasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($konfirmasi as $kf) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-capitalize"><a href="<?= base_url() ?>pesanan/detail_pesanan/<?= $kf['no_pesanan'] ?>" class="font-weight-bolder"><?= $kf['no_pesanan'] ?></a></td>
                                    <td>Rp. <?= number_format($kf['total_pesanan'], 0, ',', '.') ?></td>
                                    <td>
                                        <!-- Button Modal Pop Up Gambar -->
                                        <a href="javascript:;" data-image="<?= base_url() ?>assets/img/bukti_pembayaran/<?= $kf['foto_bukti'] ?>" data-id="<?= $kf['no_pesanan'] ?>" data-toggle="modal" data-target="#imgPreview" class="btn btn-sm btn-info px-3 modal-image">
                                            <i class="fas fa-fw fa-eye"></i> Lihat Bukti Pembayaran
                                        </a>
                                    </td>
                                    <td><?= $kf['tgl_pesanan'] ?></td>
                                    <td>
                                        <form action="<?= base_url() ?>pesanan/update_status" method="POST" class="d-inline">
                                            <input type="hidden" name="foto" value="<?= $kf['foto_bukti'] ?>">
                                            <input type="hidden" name="no_pesanan" value="<?= $kf['no_pesanan'] ?>">
                                            <button class="btn btn-sm btn-success text-light font-weight-bolder tombol-status" type="submit">
                                                <i class="fas fa-fw fa-check"></i>
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

<!-- Modal Preview Gambar -->
<div class="modal fade" id="imgPreview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto Bukti Pembayaran <span class="judul_bukti font-weight-bolder"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="foto_bukti" class="img-thumbnail tengah" style="max-width: 100%; max-height: 500px;">
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on("click", ".modal-image", function() {
        var imgsrc = $(this).data('image');
        var no_pesanan = $(this).data('id');
        $('#foto_bukti').attr('src', imgsrc);
        $('.judul_bukti').html(no_pesanan);
    });
</script>