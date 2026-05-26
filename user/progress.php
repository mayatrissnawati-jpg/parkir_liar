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

.foto-laporan{
    width: 100px;
    height: 80px;

    object-fit: cover;

    border-radius: 16px;
}

.progress-card{
    background: white;
    border-radius: 28px;
    padding: 28px;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.06);
}

.status-box{
    padding: 10px 16px;
    border-radius: 12px;
    font-weight: 500;
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

</style>

</head>
<body>

<!-- SIDEBAR -->

<?php include 'sidebar.php'; ?>

<!-- MAIN -->

<div class="main">

<!-- HEADER -->

<div class="header">

<div class="header-title">

<h3>
Progress Laporan
</h3>

<p>
Pantau perkembangan laporan parkir liar Anda
</p>

</div>

<div class="header-profile">

<img src="../assets/img/user.png"
class="profile-img">

<div>

<div class="profile-name">
<?= $_SESSION['nama'] ?>
</div>

<small class="text-muted">
User
</small>

</div>

</div>

</div>

<!-- CONTENT -->

<div class="progress-card">

<div class="d-flex justify-content-between align-items-center mb-4">

<h4 class="fw-bold">
Daftar Progress Laporan
</h4>

<a href="tambah_laporan.php"
class="btn btn-primary">

<i class="bi bi-plus-circle"></i>
Tambah Laporan

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
<?= substr($d['deskripsi'],0,50) ?>...
</small>

</td>

<td>

<?php

if($d['status']=='Menunggu'){

echo '
<span class="status-box status-menunggu">
Menunggu
</span>';

}elseif($d['status']=='Diproses'){

echo '
<span class="status-box status-diproses">
Diproses
</span>';

}else{

echo '
<span class="status-box status-selesai">
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