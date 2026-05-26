<?php
session_start();
include '../config/koneksi.php';

$id_user = $_SESSION['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM laporan
WHERE user_id='$id_user'
ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Progress Laporan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
    max-width: 1400px;
    margin: auto;
    padding: 35px;
}

/* HEADER */

.page-header{

    display: flex;
    justify-content: space-between;
    align-items: center;

    flex-wrap: wrap;

    gap: 20px;

    margin-bottom: 30px;
}

.page-title h3{

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

.btn-primary{

    background:
    linear-gradient(135deg,#4f8cff,#74a7ff);

    border: none;

    border-radius: 14px;

    padding: 12px 22px;

    font-weight: 500;
}

.btn-primary:hover{
    opacity: 0.95;
}

/* CARD */

.progress-card{

    background: white;

    border-radius: 30px;

    padding: 30px;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.06);
}

/* TABLE */

.table{
    margin-bottom: 0;
}

.table thead th{

    background: #f8fbff;

    color: #4f8cff;

    border: none;

    padding: 18px;

    font-size: 14px;

    font-weight: 600;
}

.table tbody td{

    padding: 20px 18px;

    vertical-align: middle;

    border-color: #eef2ff;
}

/* FOTO */

.foto-laporan{

    width: 100px;
    height: 80px;

    object-fit: cover;

    border-radius: 16px;

    box-shadow:
    0 5px 15px rgba(0,0,0,0.08);
}

/* STATUS */

.status-box{

    padding: 10px 16px;

    border-radius: 12px;

    font-size: 13px;

    font-weight: 600;

    display: inline-block;
}

.status-menunggu{
    background: #ffe5e8;
    color: #ef4444;
}

.status-diproses{
    background: #fff4db;
    color: #f59e0b;
}

.status-selesai{
    background: #dcfce7;
    color: #16a34a;
}

/* RESPONSIVE */

@media(max-width:991px){

    .main{
        padding: 20px;
    }

    .progress-card{
        padding: 22px;
    }

}

@media(max-width:768px){

    .page-title h3{
        font-size: 26px;
    }

    .table thead th,
    .table tbody td{
        padding: 15px;
    }

}

</style>

<body>

<div class="main">

<!-- HEADER -->

<div class="page-header">

<div class="page-title">

<h3>
Progress Laporan
</h3>

<p>
Pantau perkembangan laporan parkir liar Anda
</p>

</div>

<div class="d-flex gap-2 flex-wrap">

<a href="tambah_laporan.php"
class="btn btn-primary">

<i class="bi bi-plus-circle me-2"></i>
Tambah Laporan

</a>

<a href="dashboard.php"
class="btn btn-outline-primary">

<i class="bi bi-arrow-left me-2"></i>
Kembali Dashboard

</a>

</div>

</a>

</div>

<!-- CARD -->

<div class="progress-card">

<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

<div>

<h4 class="fw-bold mb-1">
Daftar Progress Laporan
</h4>

<p class="text-muted mb-0">
Data progress laporan parkir liar terbaru
</p>

</div>

</div>

<div class="table-responsive">

<table class="table align-middle">

<thead>

<tr>

<th>No</th>
<th>Foto</th>
<th>Lokasi & Deskripsi</th>
<th>Status</th>
<th>Tanggal</th>

</tr>

</thead>

<tbody>

<?php
$no = 1;

while($d=mysqli_fetch_array($data)){
?>

<tr>

<td class="fw-semibold">
<?= $no++ ?>
</td>

<td>

<img src="../assets/gambar/<?= $d['foto'] ?>"
class="foto-laporan">

</td>

<td>

<div class="fw-semibold text-dark mb-1">
<?= $d['lokasi'] ?>
</div>

<small class="text-muted">

<?= substr($d['deskripsi'],0,55) ?>...

</small>

</td>

<td>

<?php

if($d['status']=='Menunggu'){

echo '
<span class="status-box status-menunggu">
<i class="bi bi-clock-history me-1"></i>
Menunggu
</span>';

}elseif($d['status']=='Diproses'){

echo '
<span class="status-box status-diproses">
<i class="bi bi-arrow-repeat me-1"></i>
Diproses
</span>';

}else{

echo '
<span class="status-box status-selesai">
<i class="bi bi-check-circle me-1"></i>
Selesai
</span>';

}

?>

</td>

<td class="text-muted">

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