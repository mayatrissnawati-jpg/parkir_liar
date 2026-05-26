<?php
session_start();
include '../config/koneksi.php';

$total = mysqli_num_rows(mysqli_query($koneksi,
"SELECT * FROM laporan"));

$diproses = mysqli_num_rows(mysqli_query($koneksi,
"SELECT * FROM laporan WHERE status='Diproses'"));

$selesai = mysqli_num_rows(mysqli_query($koneksi,
"SELECT * FROM laporan WHERE status='Selesai'"));

$menunggu = mysqli_num_rows(mysqli_query($koneksi,
"SELECT * FROM laporan WHERE status='Menunggu'"));
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet"
href="../assets/css/style.css">

<style>

body{
    background: #f4f7fe;
}

.sidebar{
    width: 270px;
    height: 100vh;
    position: fixed;
    background: white;
    padding: 30px 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.05);
}

.logo{
    font-size: 24px;
    font-weight: bold;
    color: #2563eb;
    margin-bottom: 40px;
}

.menu{
    list-style: none;
    padding: 0;
}

.menu li{
    margin-bottom: 15px;
}

.menu a{
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 15px;

    padding: 15px 18px;

    border-radius: 16px;

    color: #64748b;
    font-weight: 500;

    transition: 0.3s;
}

.menu a:hover,
.menu .active{

    background: linear-gradient(135deg,#2563eb,#3b82f6);
    color: white;

}

.main{
    margin-left: 290px;
    padding: 30px;
}

.topbar{
    background: white;
    border-radius: 25px;
    padding: 25px;

    margin-bottom: 30px;

    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.dashboard-card{
    background: white;
    border-radius: 25px;
    padding: 25px;

    box-shadow: 0 10px 30px rgba(0,0,0,0.05);

    transition: 0.3s;
}

.dashboard-card:hover{
    transform: translateY(-5px);
}

.icon-box{
    width: 70px;
    height: 70px;

    border-radius: 20px;

    display: flex;
    justify-content: center;
    align-items: center;

    color: white;
    font-size: 28px;
}

.bg-blue{
    background: linear-gradient(135deg,#2563eb,#60a5fa);
}

.bg-orange{
    background: linear-gradient(135deg,#f59e0b,#fbbf24);
}

.bg-green{
    background: linear-gradient(135deg,#10b981,#34d399);
}

.bg-red{
    background: linear-gradient(135deg,#ef4444,#f87171);
}

.table-card{
    background: white;
    border-radius: 25px;
    padding: 25px;

    margin-top: 30px;

    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

</style>

</head>
<body>

<!-- SIDEBAR -->

<?php include 'sidebar.php'; ?>

<div class="main">

</div>

<!-- MAIN -->

<div class="main">

<!-- TOPBAR -->

<div class="topbar">

<div class="d-flex justify-content-between align-items-center">

<div>

<h3 class="fw-bold">
Dashboard Admin
</h3>

<p class="text-muted">
Monitoring laporan parkir liar masyarakat
</p>

</div>

<div>

<h5>
Halo,
<?= $_SESSION['nama'] ?>
</h5>

</div>

</div>

</div>

<!-- CARD -->

<div class="row">

<div class="col-md-3 mb-4">

<div class="dashboard-card">

<div class="d-flex justify-content-between align-items-center">

<div>

<p class="text-muted">
Total Laporan
</p>

<h2 class="fw-bold">
<?= $total ?>
</h2>

</div>

<div class="icon-box bg-blue">
<i class="bi bi-file-earmark"></i>
</div>

</div>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="dashboard-card">

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

<div class="col-md-3 mb-4">

<div class="dashboard-card">

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

<div class="col-md-3 mb-4">

<div class="dashboard-card">

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

<!-- TABLE -->

<div class="table-card">

<div class="d-flex justify-content-between align-items-center mb-4">

<h4 class="fw-bold">
Laporan Terbaru
</h4>

<a href="laporan.php"
class="btn btn-primary">

Lihat Semua

</a>

</div>

<table class="table align-middle">

<thead>

<tr>
<th>No</th>
<th>Lokasi</th>
<th>Status</th>
<th>Tanggal</th>
</tr>

</thead>

<tbody>

<?php

$no = 1;

$data = mysqli_query($koneksi,
"SELECT * FROM laporan
ORDER BY id DESC LIMIT 5");

while($d=mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['lokasi'] ?></td>

<td>

<?php

if($d['status']=='Menunggu'){

    echo '<span class="badge bg-danger">Menunggu</span>';

}elseif($d['status']=='Diproses'){

    echo '<span class="badge bg-warning text-dark">Diproses</span>';

}else{

    echo '<span class="badge bg-success">Selesai</span>';

}

?>

</td>

<td><?= $d['tanggal'] ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>