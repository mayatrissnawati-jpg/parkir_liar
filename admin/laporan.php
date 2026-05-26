<?php
session_start();
include '../config/koneksi.php';

$data = mysqli_query($koneksi,
"SELECT * FROM laporan
ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Data Laporan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet"
href="../assets/css/style.css">

</head>
<body>

<!-- SIDEBAR -->

<?php include 'sidebar.php'; ?>

<!-- MAIN -->

<div class="main">


<!-- TABLE CARD -->

<div class="table-card">

<!-- TOP -->

<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

<div>

<h3 class="fw-bold mb-1">
Data Laporan
</h3>

<p class="text-muted mb-0">
Daftar seluruh laporan parkir liar masyarakat
</p>

</div>

<a href="dashboard.php"
class="btn btn-primary">

<i class="bi bi-arrow-left me-2"></i>
Kembali Dashboard

</a>

</div>

<!-- TABLE -->

<div class="table-responsive">

<table class="table align-middle">

<thead>

<tr>

<th>No</th>
<th>Foto</th>
<th>Lokasi</th>
<th>Status</th>
<th>Tanggal</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php
$no = 1;

while($d=mysqli_fetch_array($data)){
?>

<tr>

<td>
<?= $no++ ?>
</td>

<td>

<img src="../assets/upload/<?= $d['foto'] ?>"
width="110"
height="80"
style="
object-fit:cover;
border-radius:18px;
">

</td>

<td>

<div class="fw-semibold text-dark">
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
<span class="badge bg-danger">
<i class="bi bi-clock-history me-1"></i>
Menunggu
</span>';

}elseif($d['status']=='Diproses'){

echo '
<span class="badge bg-warning text-dark">
<i class="bi bi-arrow-repeat me-1"></i>
Diproses
</span>';

}else{

echo '
<span class="badge bg-success">
<i class="bi bi-check-circle me-1"></i>
Selesai
</span>';

}

?>

</td>

<td>

<span class="text-muted">
<?= $d['tanggal'] ?>
</span>

</td>

<td>

<a href="edit_status.php?id=<?= $d['id'] ?>"
class="btn btn-primary btn-sm">

<i class="bi bi-pencil-square me-1"></i>
Edit

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>