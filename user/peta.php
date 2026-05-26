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
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Peta Pelanggaran</title>

<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<!-- Bootstrap Icons -->

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- CSS -->

<link rel="stylesheet"
href="../assets/css/style.css">

<!-- LEAFLET -->

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

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

    font-size: 34px;

    font-weight: 700;

    color: #0f172a;

    margin-bottom: 8px;
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

/* MAP CARD */

.map-card{

    background: white;

    border-radius: 30px;

    padding: 30px;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.06);
}

/* INFO */

.info-map{

    background: #f8fbff;

    padding: 18px 20px;

    border-radius: 18px;

    margin-bottom: 25px;

    color: #475569;

    font-size: 15px;
}

/* MAP */

#map{

    width: 100%;

    height: 650px;

    border-radius: 24px;

    overflow: hidden;
}

/* POPUP */

.popup-img{

    width: 100%;

    height: 140px;

    object-fit: cover;

    border-radius: 14px;

    margin-bottom: 12px;
}

/* RESPONSIVE */

@media(max-width:991px){

    .main{
        padding: 20px;
    }

    #map{
        height: 500px;
    }

}

@media(max-width:768px){

    .page-title h3{
        font-size: 28px;
    }

    .map-card{
        padding: 20px;
    }

}

</style>

</head>
<body>

<div class="main">

<!-- HEADER -->

<div class="page-header">

<div class="page-title">

<h3>
Peta Pelanggaran
</h3>

<p>
Melihat titik lokasi parkir liar masyarakat
</p>

</div>

<a href="dashboard.php"
class="btn btn-primary">

<i class="bi bi-arrow-left me-2"></i>
Kembali Dashboard

</a>

</div>

<!-- MAP CARD -->

<div class="map-card">

<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

<div>

<h4 class="fw-bold mb-1">
Peta Lokasi Pelanggaran
</h4>

<p class="text-muted mb-0">
Monitoring titik pelanggaran parkir liar realtime
</p>

</div>

</div>

<!-- INFO -->

<div class="info-map">

<i class="bi bi-info-circle-fill text-primary me-2"></i>

Peta menampilkan lokasi laporan parkir liar
berdasarkan data masyarakat secara realtime.

</div>

<!-- MAP -->

<div id="map"></div>

</div>

</div>

<script>

/* BUAT MAP */

var map = L.map('map');

/* TILE */

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
    attribution: '&copy; OpenStreetMap'
}
).addTo(map);

/* GPS USER */

navigator.geolocation.getCurrentPosition(

function(position){

    var lat = position.coords.latitude;
    var lng = position.coords.longitude;

    /* SET VIEW */

    map.setView([lat, lng], 15);

    /* MARKER USER */

    L.marker([lat, lng]).addTo(map)

    .bindPopup(`
    <b>Lokasi Anda</b>
    `)

    .openPopup();

},

function(){

    /* DEFAULT JIKA GPS DITOLAK */

    map.setView([-6.7320,108.5523], 13);

}

);

/* DATA LAPORAN */

<?php while($d=mysqli_fetch_array($data)){ ?>

L.marker([
<?= $d['latitude'] ?>,
<?= $d['longitude'] ?>
]).addTo(map)

.bindPopup(`

<img src="../assets/gambar/<?= $d['foto'] ?>"
class="popup-img">

<h6 class="fw-bold mb-2">
<?= $d['lokasi'] ?>
</h6>

<p class="mb-2">
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