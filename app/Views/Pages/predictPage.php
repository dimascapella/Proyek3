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
            <div class="col-md">
                <h2>Prediksi Stok untuk hari berikutnya</h2>
            </div>
        </div>
        <form action="<?= base_url(); ?>/ProdukController/getPredict" method="post">
            <div class="row mt-3">
                <div class="col-md-5">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Makanan</label>
                        <div class="col-sm">
                            <select class="form-control" name="id_produk">
                                <?php foreach ($produk as $p) : ?>
                                    <option value="<?= $p['id_produk']; ?>"><?= $p['nama_produk']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary width-100">Prediksi</button>
                </div>
            </div>
        </form>
        <div class="row mt-4">
            <div class="col-md-8">
                <canvas id="predictChart"></canvas>
            </div>
            <div class="col-md-4 mt-4">
                <?php if (session()->getFlashdata('predict')) : ?>
                    <div class="d-block">
                        <h5>Prediksi Stok untuk hari berikutnya :</h5>
                        <h2 class="d-flex justify-content-end">
                            <?= session()->getFlashdata('predict') ?>
                        </h2>
                    </div>
                    <div class="d-block">
                        <h5>Pendapatan hari ini untuk <?= session()->getFlashdata('getNameProduct') ?> :</h5>
                        <h2 class="d-flex justify-content-end convert-money">
                            <?= session()->getFlashdata('income') ?>
                        </h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    var ctx = document.getElementById("predictChart").getContext("2d");

    var predictChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(0, 123, 255, 0.8)'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
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