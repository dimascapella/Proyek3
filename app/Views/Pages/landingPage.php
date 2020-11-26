<?= $this->extend('Layout/baseTemplate'); ?>
<?= $this->section('content'); ?>

<div class="content-space">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-primary">
                        <li class="breadcrumb-item font-uppercase">
                            <a class="font-white text-decoration-none" href="#"><?php echo $path1 ?></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icons bg-darkblue font-white">
                                <i class="fas fa-utensils"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="context mt-3">
                                <h5 class="font-weight-bold d-block">Sisa Stok Hari ini :</h5>
                                <h3 class="d-block">
                                    <?php if ($currentStock > 0) { ?>
                                        <?= $currentStock; ?>
                                    <?php } else { ?>
                                        0
                                    <?php } ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icons bg-darkred font-white">
                                <i class="fab fa-sellsy"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="context mt-3">
                                <h5 class="font-weight-bold d-block">Total Product Terjual :</h5>
                                <h3 class="d-block">
                                    <?php if ($soldStock > 0) { ?>
                                        <?= $soldStock; ?>
                                    <?php } else { ?>
                                        0
                                    <?php } ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icons bg-darkgreen font-white">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="context mt-3">
                                <h5 class="font-weight-bold d-block">Total Pendapatan :</h5>
                                <h3 class="d-block convert-money">
                                    <?php if ($income > 0) { ?>
                                        <?= $income; ?>
                                    <?php } else { ?>
                                        0
                                    <?php } ?></h3>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <canvas id="firstChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="secondChart"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    var ctx = document.getElementById("firstChart").getContext("2d");

    var firstChart = new Chart(ctx, {
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
<script>
    var ctx = document.getElementById("secondChart").getContext("2d");

    var secondChart = new Chart(ctx, {
        type: 'bar',
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