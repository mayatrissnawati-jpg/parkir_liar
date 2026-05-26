<?php
session_start();
include '../config/koneksi.php';

$id_user = $_SESSION['id'];

$total = mysqli_num_rows(mysqli_query($koneksi,
"SELECT * FROM laporan WHERE user_id='$id_user'"));

$diproses = mysqli_num_rows(mysqli_query($koneksi,
"SELECT * FROM laporan
WHERE user_id='$id_user'
AND status='Diproses'"));

$selesai = mysqli_num_rows(mysqli_query($koneksi,
"SELECT * FROM laporan
WHERE user_id='$id_user'
AND status='Selesai'"));
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard User</title>

<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<!-- Bootstrap Icons -->

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Style -->

<link rel="stylesheet"
href="../assets/css/style.css">

<style>

body{
    background: #f5f7fb;
}

/* HEADER */

.welcome-banner{

    background:
    linear-gradient(135deg,#4f8cff,#74a7ff);

    border-radius: 30px;

    padding: 40px;

    color: white;

    overflow: hidden;

    position: relative;

    margin-bottom: 35px;
}

.welcome-banner::before{

    content: '';

    position: absolute;

    width: 300px;
    height: 300px;

    background: rgba(255,255,255,0.1);

    border-radius: 50%;

    top: -100px;
    right: -100px;

}

.welcome-title{
    font-size: 35px;
    font-weight: 700;
}

.welcome-text{
    opacity: 0.9;
}

/* CARD */

.stat-card{

    background: white;

    border-radius: 28px;

    padding: 28px;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.06);

    transition: 0.3s;

    height: 100%;
}

.stat-card:hover{
    transform: translateY(-6px);
}

.icon-stat{

    width: 70px;
    height: 70px;

    border-radius: 20px;

    display: flex;
    justify-content: center;
    align-items: center;

    font-size: 30px;
    color: white;
}

.bg-blue{
    background:
    linear-gradient(135deg,#4f8cff,#74a7ff);
}

.bg-orange{
    background:
    linear-gradient(135deg,#f59e0b,#fbbf24);
}

.bg-green{
    background:
    linear-gradient(135deg,#10b981,#34d399);
}

.stat-title{
    color: #94a3b8;
    margin-bottom: 10px;
}

.stat-value{
    font-size: 34px;
    font-weight: 700;
    color: #0f172a;
}

/* TABLE */

.table-card{

    background: white;

    border-radius: 30px;

    padding: 30px;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.06);
}

.table thead th{

    border: none;

    background: #f8fbff;

    color: #4f8cff;

    padding: 18px;
}

.table tbody td{
    padding: 18px;
    vertical-align: middle;
}

/* FOTO */

.foto-laporan{

    width: 85px;
    height: 70px;

    object-fit: cover;

    border-radius: 16px;

    box-shadow:
    0 5px 15px rgba(0,0,0,0.08);
}

/* BADGE */

.badge{

    padding: 10px 15px;

    border-radius: 12px;

    font-weight: 500;
}

/* RESPONSIVE */

@media(max-width:768px){

    .welcome-title{
        font-size: 28px;
    }

}

</style>

</head>
<body>

<!-- SIDEBAR -->

<?php include 'sidebar.php'; ?>

<!-- MAIN -->

<div class="main">

<!-- HEADER -->

<?php include 'header.php'; ?>

<!-- WELCOME -->

<div class="welcome-banner">

<div class="row align-items-center">

<div class="col-md-8">

<h2 class="welcome-title mb-3">

Selamat Datang,
<?= $_SESSION['nama'] ?>

</h2>

<p class="welcome-text">

Pantau progress laporan parkir liar Anda
secara realtime melalui dashboard modern
dan profesional.

</p>

<a href="tambah_laporan.php"
class="btn btn-light mt-3">

<i class="bi bi-plus-circle"></i>
Tambah Laporan

</a>

</div>

<div class="col-md-4 text-center">

<img src="../assets/img/dashboard-user.png"
class="img-fluid"
style="max-height:220px;">

</div>

</div>

</div>

<!-- STATISTIK -->

<div class="row">

<div class="col-md-4 mb-4">

<div class="stat-card">

<div class="d-flex justify-content-between align-items-center">

<div>

<div class="stat-title">
Total Laporan
</div>

<div class="stat-value">
<?= $total ?>
</div>

</div>

<div class="icon-stat bg-blue">

<i class="bi bi-file-earmark-text"></i>

</div>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="stat-card">

<div class="d-flex justify-content-between align-items-center">

<div>

<div class="stat-title">
Diproses
</div>

<div class="stat-value">
<?= $diproses ?>
</div>

</div>

<div class="icon-stat bg-orange">

<i class="bi bi-arrow-repeat"></i>

</div>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="stat-card">

<div class="d-flex justify-content-between align-items-center">

<div>

<div class="stat-title">
Selesai
</div>

<div class="stat-value">
<?= $selesai ?>
</div>

</div>

<div class="icon-stat bg-green">

<i class="bi bi-check-circle"></i>

</div>

</div>

</div>

</div>

</div>

<!-- TABLE -->

<div class="table-card">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h4 class="fw-bold mb-1">
Laporan Terbaru
</h4>

<p class="text-muted mb-0">
Data laporan parkir liar terbaru Anda
</p>

</div>

<a href="progress.php"
class="btn btn-primary">

<i class="bi bi-clock-history"></i>
Lihat Progress

</a>

</div>

<div class="table-responsive">

<table class="table align-middle">

<thead>

<tr>

<th>No</th>
<th>Foto</th>
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
WHERE user_id='$id_user'
ORDER BY id DESC LIMIT 5");

while($d=mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td>

<img src="../assets/upload/<?= $d['foto'] ?>"
class="foto-laporan">

</td>

<td>

<div class="fw-semibold">
<?= $d['lokasi'] ?>
</div>

<small class="text-muted">
<?= substr($d['deskripsi'],0,45) ?>...
</small>

</td>

<td>

<?php

if($d['status']=='Menunggu'){

echo '
<span class="badge bg-danger">
Menunggu
</span>';

}elseif($d['status']=='Diproses'){

echo '
<span class="badge bg-warning text-dark">
Diproses
</span>';

}else{

echo '
<span class="badge bg-success">
Selesai
</span>';

}

?>

</td>

<td>

<?= date('d M Y',
strtotime($d['tanggal'])) ?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<script src="../assets/js/script.js"></script>

</body>
</html>