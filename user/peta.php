<?php
session_start();
include '../config/koneksi.php';

$data = mysqli_query($koneksi,
"SELECT * FROM laporan");
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Peta Pelanggaran</title>

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet"
href="../assets/css/style.css">

<!-- LEAFLET -->

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<style>

.map-card{
    background: white;

    border-radius: 28px;

    padding: 25px;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.06);
}

#map{
    width: 100%;
    height: 650px;

    border-radius: 24px;
}

.info-map{

    background: #f8fbff;

    padding: 18px;

    border-radius: 18px;

    margin-bottom: 20px;

}

.popup-img{
    width: 100%;
    border-radius: 14px;
    margin-bottom: 10px;
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
Peta Pelanggaran
</h3>

<p>
Melihat titik lokasi parkir liar masyarakat
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

<!-- MAP CARD -->

<div class="map-card">

<div class="d-flex justify-content-between align-items-center mb-4">

<h4 class="fw-bold">
Peta Lokasi Pelanggaran
</h4>

<a href="dashboard.php"
class="btn btn-primary">

<i class="bi bi-arrow-left"></i>
Kembali Dashboard

</a>

</div>

<div class="info-map">

<i class="bi bi-info-circle-fill text-primary"></i>

Peta menampilkan lokasi laporan parkir liar
berdasarkan data masyarakat secara realtime.

</div>

<div id="map"></div>

</div>

</div>

<script>

var map = L.map('map').setView([-6.7320,108.5523], 13);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
    attribution: '&copy; OpenStreetMap'
}
).addTo(map);

<?php while($d=mysqli_fetch_array($data)){ ?>

L.marker([
<?= $d['latitude'] ?>,
<?= $d['longitude'] ?>
]).addTo(map)

.bindPopup(`

<img src="../assets/upload/<?= $d['foto'] ?>"
class="popup-img">

<h6 class="fw-bold">
<?= $d['lokasi'] ?>
</h6>

<p>
<?= $d['deskripsi'] ?>
</p>

<span class="badge bg-danger">
<?= $d['status'] ?>
</span>

`);

<?php } ?>

</script>

<script src="../assets/js/script.js"></script>

</body>
</html>