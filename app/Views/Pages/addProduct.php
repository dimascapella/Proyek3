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
            <div class="col-md-5">
                <h2>Add Product</h2>
                <p>
                    <?php if (session()->getFlashdata('berhasil')) : ?>
                        <div class="alert alert-primary">
                            <?php echo session()->getFlashdata('berhasil') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('gagal')) : ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('gagal') ?>
                        </div>
                    <?php endif; ?>
                </p>
                <form method="POST" action="<?php base_url() ?>/ProdukController/tambah_barang">
                    <?php csrf_field() ?>
                    <div class="form-group row mt-5">
                        <label class="col-sm-4 col-form-label">Nama Makanan</label>
                        <div class="col-sm">
                            <input type="text" name="nama_makanan" class="form-control <?= ($validation->hasError('nama_makanan')) ? 'is-invalid' : ''; ?>" placeholder="Input Nama Makanan" value=<?= old('nama_makanan') ?>>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_makanan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Stok Makanan</label>
                        <div class="col-sm">
                            <input type="number" name="stok_makanan" class="form-control <?= ($validation->hasError('stok_makanan')) ? 'is-invalid' : ''; ?>" placeholder="Input Stok Makanan" value=<?= old('stok_makanan') ?>>
                            <div class="invalid-feedback">
                                <?= $validation->getError('stok_makanan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Harga Makanan</label>
                        <div class="col-sm">
                            <input type="number" name="harga_makanan" class="form-control <?= ($validation->hasError('harga_makanan')) ? 'is-invalid' : ''; ?>" placeholder="Input Harga Makanan" value=<?= old('harga_makanan') ?>>
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga_makanan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jenis Makanan</label>
                        <div class="col-sm">
                            <select class="form-control" name="jenis_makanan">
                                <option value="1">Makanan Basah</option>
                                <option value="2">Makanan Kering</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 width-100">Tambahkan</button>
                </form>
            </div>
            <div class="col-md-7">
                <img class="width-100" src="/img/image4.png" width="100%">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>