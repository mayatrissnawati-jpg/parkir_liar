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

<!-- MAIN -->

<div class="main">

<!-- HEADER -->

<div class="container-fluid px-4">

<div>

<h3>
Data Laporan
</h3>

<p>
Daftar seluruh laporan parkir liar masyarakat
</p>

</div>

<a href="dashboard.php"
class="btn btn-primary">

<i class="bi bi-arrow-left me-2"></i>
Kembali Dashboard

</a>

</div>

<!-- TABLE CARD -->

<div class="table-card">

<div class="table-responsive">

<table class="table align-middle">

<thead>

<tr>

<th width="70">
No
</th>

<th>
Foto
</th>

<th>
Lokasi & Deskripsi
</th>

<th>
Status
</th>

<th>
Tanggal
</th>

<th class="text-center">
Aksi
</th>

</tr>

</thead>

<tbody>

<?php
$no = 1;

while($d=mysqli_fetch_array($data)){
?>

<tr>

<td class="fw-semibold text-dark">
<?= $no++ ?>
</td>

<td>

<img src="../assets/gambar/<?= $d['foto'] ?>"
class="foto">

</td>

<td>

<div class="lokasi">
<?= $d['lokasi'] ?>
</div>

<div class="deskripsi mt-1">

<?= substr($d['deskripsi'],0,60) ?>...

</div>

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

<td class="text-center">

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