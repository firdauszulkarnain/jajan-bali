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
                            <tr class=" text-center">
                                <th width="5%">No</th>
                                <th width="25%">E-mail</th>
                                <th>Nama Lengkap</th>
                                <th width="18%">Nomor Telepon</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pelanggan as $pg) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td><?= $pg['email'] ?></td>
                                    <td class="text-capitalize"><?= $pg['nama_lengkap'] ?></td>
                                    <td><?= $pg['nomor_telepon'] ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>pelanggan/detail_pelanggan/<?= $pg['id_pelanggan'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-fw fa-eye"></i> </a>

                                        <form action="<?= base_url() ?>pelanggan/hapus_pelanggan" method="POST" class="d-inline">
                                            <input type="hidden" name="id_pelanggan" value="<?= $pg['id_pelanggan'] ?>">
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