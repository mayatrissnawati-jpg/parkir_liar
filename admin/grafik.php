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
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Grafik Laporan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet"
href="../assets/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

<style>

body{
    background: #f5f7fb;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
}

/* MAIN */

.main{
    max-width: 1400px;
    margin: auto;
    padding: 35px;
}

/* TITLE */

.page-title h2{
    font-size: 32px;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 6px;
}

.page-title p{
    color: #64748b;
    margin: 0;
    font-size: 15px;
}

/* BUTTON */

.btn-dashboard{

    background:
    linear-gradient(135deg,#4f8cff,#74a7ff);

    color: white;

    text-decoration: none;

    padding: 12px 22px;

    border-radius: 14px;

    font-weight: 600;

    display: inline-flex;
    align-items: center;

    transition: 0.3s;
}

.btn-dashboard:hover{
    transform: translateY(-2px);
    color: white;
}

/* INFO CARD */

.info-card{

    background: white;

    border-radius: 28px;

    padding: 28px;

    box-shadow:
    0 10px 30px rgba(15,23,42,0.06);

    height: 100%;

    transition: 0.3s;
}

.info-card:hover{
    transform: translateY(-5px);
}

/* CARD TEXT */

.card-title{

    color: #94a3b8;

    font-size: 15px;

    margin-bottom: 10px;
}

.card-value{

    font-size: 38px;

    font-weight: 700;

    color: #0f172a;
}

/* ICON */

.icon-box{

    width: 72px;
    height: 72px;

    border-radius: 22px;

    display: flex;
    justify-content: center;
    align-items: center;

    font-size: 30px;

    color: white;
}

.bg-red{
    background:
    linear-gradient(135deg,#ef4444,#f87171);
}

.bg-orange{
    background:
    linear-gradient(135deg,#f59e0b,#fbbf24);
}

.bg-green{
    background:
    linear-gradient(135deg,#10b981,#34d399);
}

/* CHART CARD */

.chart-card{

    background: white;

    border-radius: 30px;

    padding: 35px;

    margin-top: 10px;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.06);
}

/* CHART TEXT */

.chart-title{

    font-size: 26px;

    font-weight: 700;

    color: #0f172a;

    margin-bottom: 8px;
}

.chart-subtitle{

    color: #94a3b8;

    margin-bottom: 30px;

    font-size: 15px;
}

/* RESPONSIVE */

@media(max-width:991px){

    .main{
        padding: 20px;
    }

    .chart-card{
        padding: 25px;
    }

    .card-value{
        font-size: 30px;
    }

}

@media(max-width:768px){

    .page-title h2{
        font-size: 26px;
    }

    .info-card{
        padding: 22px;
    }

    .chart-card{
        padding: 20px;
    }

}

</style>

<body>

<div class="main">

<!-- HEADER -->

<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

<div class="page-title">

<h2>
Grafik Pelaporan
</h2>

<p>
Statistik laporan parkir liar masyarakat
</p>

</div>

<a href="dashboard.php"
class="btn-dashboard">

<i class="bi bi-arrow-left me-2"></i>
Kembali Dashboard

</a>

</div>

<!-- INFO CARD -->

<div class="row">

<!-- MENUNGGU -->

<div class="col-md-4 mb-4">

<div class="info-card">

<div class="d-flex justify-content-between align-items-center">

<div>

<div class="card-title">
Menunggu
</div>

<div class="card-value">
<?= $menunggu ?>
</div>

</div>

<div class="icon-box bg-red">

<i class="bi bi-clock-history"></i>

</div>

</div>

</div>

</div>

<!-- DIPROSES -->

<div class="col-md-4 mb-4">

<div class="info-card">

<div class="d-flex justify-content-between align-items-center">

<div>

<div class="card-title">
Diproses
</div>

<div class="card-value">
<?= $diproses ?>
</div>

</div>

<div class="icon-box bg-orange">

<i class="bi bi-arrow-repeat"></i>

</div>

</div>

</div>

</div>

<!-- SELESAI -->

<div class="col-md-4 mb-4">

<div class="info-card">

<div class="d-flex justify-content-between align-items-center">

<div>

<div class="card-title">
Selesai
</div>

<div class="card-value">
<?= $selesai ?>
</div>

</div>

<div class="icon-box bg-green">

<i class="bi bi-check-circle"></i>

</div>

</div>

</div>

</div>

</div>

<!-- CHART -->

<div class="chart-card">

<h4 class="chart-title">
Grafik Statistik Laporan
</h4>

<p class="chart-subtitle">
Visualisasi jumlah laporan berdasarkan status laporan
</p>

<div style="height:400px;">

<canvas id="grafik"></canvas>

</div>

</div>

</div>

</body>

<script>

const ctx =
document.getElementById('grafik');

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

            borderRadius: 14,
            borderSkipped: false,
            barThickness: 70

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {
                display: false
            }

        },

        scales: {

            x: {

                grid: {
                    display: false
                },

                ticks: {

                    color: '#64748b',

                    font: {
                        size: 14
                    }

                }

            },

            y: {

                beginAtZero: true,

                ticks: {

                    stepSize: 1,

                    color: '#64748b'

                },

                grid: {

                    color: '#e2e8f0'

                }

            }

        }

    }

});

</script>

</body>