<?= $this->extend('Layout/baseTemplate'); ?>
<?= $this->section('content'); ?>

<div class="content-space">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-primary">
                        <li class="breadcrumb-item font-uppercase text-light">
                            <a class="font-white text-decoration-none" href="#"><?php echo $path1 ?></a>
                        </li>
                        <li class="breadcrumb-item font-uppercase text-light">
                            <a class="font-white text-decoration-none" href="#"><?php echo $path2 ?></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <h2>List Product Hari Ini</h2>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-2">
                <a href="<?php base_url() ?>/menu/history_page" class="btn btn-primary text-center width-100">History Penjualan</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <p>
                    <?php if (session()->getFlashdata('berhasil')) : ?>
                        <div class="alert alert-primary">
                            <?php echo session()->getFlashdata('berhasil') ?>
                        </div>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center" id="sortTable">
                                <thead>
                                    <tr class="table-active">
                                        <th scope="col" class="width-10">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col" class="width-30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($produk as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $p['nama_produk'] ?></td>
                                            <td><?= $p['stok'] ?></td>
                                            <td><?= $p['jenis'] ?></td>
                                            <td class="convert-money"><?= $p['harga'] ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="<?= base_url() ?>/menu/detail/<?= $p['id_in']; ?>" type="submit" class="btn btn-primary width-100">Edit</a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="<?= base_url() ?>/menu/sold/<?= $p['id_in']; ?>" type="submit" class="btn btn-danger width-100">Terjual</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#sortTable').DataTable();
    });
</script>
<script type="text/javascript">
    $('.convert-money').each(function() {
        var monetary_value = $(this).text();
        var i = new Intl.NumberFormat('id', {
            style: 'currency',
            currency: 'IDR'
        }).format(monetary_value);
        $(this).text(i);
    });
</script>
<?= $this->endSection(); ?>