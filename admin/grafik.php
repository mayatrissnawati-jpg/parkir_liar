<?php
session_start();
include '../config/koneksi.php';

$menunggu = mysqli_num_rows(mysqli_query($koneksi,
"SELECT * FROM laporan WHERE status='Menunggu'"));

$diproses = mysqli_num_rows(mysqli_query($koneksi,
"SELECT * FROM laporan WHERE status='Diproses'"));

$selesai = mysqli_num_rows(mysqli_query($koneksi,
"SELECT * FROM laporan WHERE status='Selesai'"));
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Grafik Laporan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet"
href="../assets/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

body{
    background: #f4f7fe;
}

.main{
    margin-left: 290px;
    padding: 30px;
}

.chart-card{
    background: white;
    border-radius: 30px;
    padding: 35px;

    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.info-card{
    background: white;
    border-radius: 25px;
    padding: 25px;

    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.icon-box{
    width: 65px;
    height: 65px;

    border-radius: 18px;

    display: flex;
    justify-content: center;
    align-items: center;

    color: white;
    font-size: 25px;
}

.bg-red{
    background: linear-gradient(135deg,#ef4444,#f87171);
}

.bg-orange{
    background: linear-gradient(135deg,#f59e0b,#fbbf24);
}

.bg-green{
    background: linear-gradient(135deg,#10b981,#34d399);
}

</style>

</head>
<body>

<div class="main">

<!-- HEADER -->

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h3 class="fw-bold">
Grafik Pelaporan
</h3>

<p class="text-muted">
Statistik laporan parkir liar masyarakat
</p>

</div>

<a href="dashboard.php"
class="btn btn-primary">

Kembali Dashboard

</a>

</div>

<!-- INFO CARD -->

<div class="row mb-4">

<div class="col-md-4 mb-4">

<div class="info-card">

<div class="d-flex justify-content-between align-items-center">

<div>

<p class="text-muted">
Menunggu
</p>

<h2 class="fw-bold">
<?= $menunggu ?>
</h2>

</div>

<div class="icon-box bg-red">
<i class="bi bi-clock"></i>
</div>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="info-card">

<div class="d-flex justify-content-between align-items-center">

<div>

<p class="text-muted">
Diproses
</p>

<h2 class="fw-bold">
<?= $diproses ?>
</h2>

</div>

<div class="icon-box bg-orange">
<i class="bi bi-arrow-repeat"></i>
</div>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="info-card">

<div class="d-flex justify-content-between align-items-center">

<div>

<p class="text-muted">
Selesai
</p>

<h2 class="fw-bold">
<?= $selesai ?>
</h2>

</div>

<div class="icon-box bg-green">
<i class="bi bi-check-circle"></i>
</div>

</div>

</div>

</div>

</div>

<!-- GRAFIK -->

<div class="chart-card">

<h4 class="fw-bold mb-4">
Grafik Statistik Laporan
</h4>

<canvas id="grafik"></canvas>

</div>

</div>

<script>

const ctx = document.getElementById('grafik');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Menunggu',
            'Diproses',
            'Selesai'
        ],

        datasets: [{

            label: 'Jumlah Laporan',

            data: [
                <?= $menunggu ?>,
                <?= $diproses ?>,
                <?= $selesai ?>
            ],

            backgroundColor: [
                '#ef4444',
                '#f59e0b',
                '#10b981'
            ],

            borderRadius: 12,
            borderSkipped: false

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {
                display: false
            }

        },

        scales: {

            y: {
                beginAtZero: true
            }

        }

    }

});

</script>

</body>
</html>