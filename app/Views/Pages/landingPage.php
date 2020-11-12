<?= $this->extend('Layout/baseTemplate'); ?>
<?= $this->section('content'); ?>

<div class="content-space">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-primary">
                        <li class="breadcrumb-item font-uppercase ">
                            <a class="font-white text-decoration-none" href="#"><?php echo $path ?></a>
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
                                <h5 class="font-weight-bold d-block">Total Stok Hari ini :</h5>
                                <h3 class="d-block">60</h3>
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
                                <h5 class="font-weight-bold d-block">Total Barang Terjual :</h5>
                                <h3 class="d-block">40</h3>
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
                                <h5 class="font-weight-bold d-block">Pendapatan Hari ini :</h5>
                                <h3 class="d-block">Rp. 12456789</h3>
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
<?= $this->endSection(); ?>