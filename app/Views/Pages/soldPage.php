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
                        <li class="breadcrumb-item font-uppercase text-light">
                            <a class="font-white text-decoration-none" href="#"><?= $produk['nama_produk']; ?></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-5">
                <h2>Products Sold</h2>
                <form method="POST" action="<?php base_url() ?>/ProdukController/produk_terjual/">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $produk['id_in']; ?>">
                    <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
                    <div class="form-group row mt-5">
                        <label class="col-sm-4 col-form-label">Nama Makanan</label>
                        <div class="col-sm">
                            <input type="text" readonly name="nama_makanan" class="form-control-plaintext" value="<?= $produk['nama_produk']; ?>" placeholder="<?= $produk['nama_produk']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Stok Makanan</label>
                        <div class="col-sm">
                            <input type="number" readonly class="form-control" name="stok_makanan" value="<?= $produk['stok']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Harga Makanan</label>
                        <div class="col-sm">
                            <input type="number" readonly class="form-control" name="harga_makanan" value="<?= $produk['harga']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Total Pembelian</label>
                        <div class="col-sm">
                            <input type="number" class="form-control" name="total_pembelian">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 width-100">Tambahkan</button>
                </form>
            </div>
            <div class="col-md-7">
                <img class="width-100" src="/img/image5.png" width="100%">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>