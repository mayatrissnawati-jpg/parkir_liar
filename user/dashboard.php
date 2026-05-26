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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet"
href="../assets/css/style.css">

<style>

body{
    background: #f5f7fb;
    font-family: 'Poppins', sans-serif;
}

/* MAIN */

.main{
    max-width: 1450px;
    margin: auto;
    padding: 35px;
}

/* MENU */

.menu-card{
    background: white;
    border-radius: 28px;
    padding: 25px;
    margin-bottom: 30px;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.06);
}

.menu-item{

    display: flex;
    flex-direction: column;

    justify-content: center;
    align-items: center;

    text-decoration: none;

    background: #f8fbff;

    border-radius: 22px;

    padding: 25px;

    transition: 0.3s;

    height: 100%;
}

.menu-item:hover{
    transform: translateY(-5px);
    background: #4f8cff;
    color: white;
}

.menu-icon{

    width: 70px;
    height: 70px;

    border-radius: 20px;

    display: flex;
    justify-content: center;
    align-items: center;

    background:
    linear-gradient(135deg,#4f8cff,#74a7ff);

    color: white;

    font-size: 28px;

    margin-bottom: 15px;
}

.menu-title{
    font-weight: 600;
    color: #0f172a;
}

.menu-item:hover .menu-title{
    color: white;
}

/* WELCOME */

.welcome-banner{

    background:
    linear-gradient(135deg,#4f8cff,#74a7ff);

    border-radius: 32px;

    padding: 45px;

    color: white;

    overflow: hidden;

    position: relative;

    margin-bottom: 35px;

    box-shadow:
    0 15px 40px rgba(79,140,255,0.18);
}

.welcome-banner::before{

    content: '';

    position: absolute;

    width: 320px;
    height: 320px;

    background: rgba(255,255,255,0.08);

    border-radius: 50%;

    top: -120px;
    right: -120px;
}

.welcome-title{

    font-size: 38px;

    font-weight: 700;

    line-height: 1.3;
}

.welcome-text{

    opacity: 0.92;

    font-size: 15px;

    line-height: 1.8;

    max-width: 600px;
}

/* BUTTON */

.btn-light{

    border-radius: 14px;

    padding: 12px 22px;

    font-weight: 600;

    border: none;
}

.btn-primary{

    background:
    linear-gradient(135deg,#4f8cff,#74a7ff);

    border: none;

    border-radius: 14px;

    padding: 12px 22px;

    font-weight: 500;
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
    transform: translateY(-5px);
}

/* ICON */

.icon-stat{

    width: 72px;
    height: 72px;

    border-radius: 22px;

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

/* TEXT */

.stat-title{

    color: #94a3b8;

    margin-bottom: 10px;

    font-size: 15px;
}

.stat-value{

    font-size: 36px;

    font-weight: 700;

    color: #0f172a;
}

/* TABLE CARD */

.table-card{

    background: white;

    border-radius: 30px;

    padding: 32px;

    margin-top: 10px;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.06);
}

/* TABLE */

.table{
    margin-bottom: 0;
}

.table thead th{

    border: none;

    background: #f8fbff;

    color: #4f8cff;

    padding: 20px;

    font-size: 14px;

    font-weight: 600;
}

.table tbody td{

    padding: 22px 20px;

    vertical-align: middle;

    border-color: #eef2ff;
}

/* FOTO */

.foto-laporan{

    width: 90px;
    height: 75px;

    object-fit: cover;

    border-radius: 18px;

    box-shadow:
    0 5px 15px rgba(0,0,0,0.08);
}

/* BADGE */

.badge{

    padding: 10px 16px;

    border-radius: 12px;

    font-weight: 500;

    font-size: 13px;
}

/* RESPONSIVE */

@media(max-width:991px){

    .main{
        padding: 20px;
    }

    .welcome-banner{
        padding: 30px;
    }

    .welcome-title{
        font-size: 30px;
    }

}

@media(max-width:768px){

    .table-card{
        padding: 20px;
    }

    .welcome-title{
        font-size: 26px;
    }

}

</style>

</head>
<body>

<div class="main">

<!-- MENU -->

<div class="menu-card">

<div class="row g-4">

<div class="col-md-4">

<a href="tambah_laporan.php"
class="menu-item">

<div class="menu-icon">
<i class="bi bi-plus-circle"></i>
</div>

<div class="menu-title">
Tambah Laporan
</div>

</a>

</div>

<div class="col-md-4">

<a href="progress.php"
class="menu-item">

<div class="menu-icon">
<i class="bi bi-clock-history"></i>
</div>

<div class="menu-title">
Progress Laporan
</div>

</a>

</div>

<div class="col-md-4">

<a href="peta.php"
class="menu-item">

<div class="menu-icon">
<i class="bi bi-geo-alt"></i>
</div>

<div class="menu-title">
Peta Laporan
</div>

</a>

</div>

</div>

</div>

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

<img src="../assets/gambar/<?= $d['foto'] ?>"
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

</body>