<?php
session_start();
include '../config/koneksi.php';

if(isset($_POST['kirim'])){

    $id_user = $_SESSION['id'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp,
    "../assets/gambar/".$foto);

    mysqli_query($koneksi,
    "INSERT INTO laporan(
    user_id,
    lokasi,
    deskripsi,
    latitude,
    longitude,
    foto,
    status,
    tanggal)

    VALUES(
    '$id_user',
    '$lokasi',
    '$deskripsi',
    '$latitude',
    '$longitude',
    '$foto',
    'Menunggu',
    NOW())");

    echo "
    <script>
    alert('Laporan berhasil dikirim');
    window.location='dashboard.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Laporan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet"
href="../assets/css/style.css">

<style>

.preview-img{
    width: 100%;
    height: 250px;

    object-fit: cover;

    border-radius: 20px;

    display: none;
}

</style>

</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="main">

<div class="header">

<div class="header-title">

<h3>
Tambah Laporan
</h3>

<p>
Laporkan area parkir liar dengan mudah
</p>

</div>

</div>

<div class="card-custom">

<form method="POST"
enctype="multipart/form-data">

<div class="row">

<div class="col-md-6 mb-4">

<label class="mb-2">
Lokasi
</label>

<input type="text"
name="lokasi"
class="form-control"
placeholder="Masukkan lokasi"
required>

</div>

<div class="col-md-6 mb-4">

<label class="mb-2">
Upload Foto
</label>

<input type="file"
name="foto"
id="foto"
class="form-control"
required>

</div>

</div>

<div class="mb-4">

<img id="preview"
class="preview-img shadow">

</div>

<div class="mb-4">

<label class="mb-2">
Deskripsi
</label>

<textarea name="deskripsi"
class="form-control"
rows="5"
placeholder="Masukkan deskripsi laporan"
required></textarea>

</div>

<div class="row">

<div class="col-md-6 mb-4">

<label class="mb-2">
Latitude
</label>

<input type="text"
name="latitude"
id="latitude"
class="form-control"
readonly>

</div>

<div class="col-md-6 mb-4">

<label class="mb-2">
Longitude
</label>

<input type="text"
name="longitude"
id="longitude"
class="form-control"
readonly>

</div>

</div>

<button type="submit"
name="kirim"
class="btn btn-primary">

Kirim Laporan

</button>

</form>

</div>

</div>

<script>

navigator.geolocation.getCurrentPosition(

(position)=>{

document.getElementById('latitude').value =
position.coords.latitude;

document.getElementById('longitude').value =
position.coords.longitude;

}

);

</script>

<script src="../assets/js/script.js"></script>

</body>
</html>