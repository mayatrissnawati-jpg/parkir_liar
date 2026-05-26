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
        tanggal
    )
    VALUES(
        '$id_user',
        '$lokasi',
        '$deskripsi',
        '$latitude',
        '$longitude',
        '$foto',
        'Menunggu',
        NOW()
    )");

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
body{
    background:#f5f7fb;
    font-family:Poppins;
}

.main{max-width:1100px;margin:auto;padding:35px;}

.card-custom{
    background:#fff;
    border-radius:25px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
}

.preview-img{
    width:100%;
    height:250px;
    object-fit:cover;
    border-radius:15px;
    display:none;
}

.form-control{
    border-radius:12px;
    padding:12px;
}

.btn-primary{
    border-radius:12px;
}
</style>
</head>

<body>

<div class="main">

<h3>Tambah Laporan</h3>
<p>Laporkan lokasi parkir liar</p>

<div class="card-custom">

<form method="POST" enctype="multipart/form-data" id="formLaporan">

<div class="row">

<div class="col-md-6 mb-3">
<label>Lokasi</label>
<input type="text" name="lokasi" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Upload Foto</label>
<input type="file" name="foto" id="foto" class="form-control" required>
</div>

</div>

<img id="preview" class="preview-img mb-3">

<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control" rows="4" required></textarea>
</div>

<div class="row">

<div class="col-md-6 mb-3">
<label>Latitude</label>
<input type="text" name="latitude" id="latitude" class="form-control" readonly required>
</div>

<div class="col-md-6 mb-3">
<label>Longitude</label>
<input type="text" name="longitude" id="longitude" class="form-control" readonly required>
</div>

</div>

<div id="statusLokasi" class="alert alert-info py-2">
Mengambil lokasi...
</div>

<div class="d-flex gap-2">
<a href="dashboard.php" class="btn btn-secondary">
<i class="bi bi-arrow-left"></i> Kembali
</a>

<button type="submit" id="btnKirim" name="kirim" class="btn btn-primary" disabled>
<i class="bi bi-send"></i> Kirim Laporan
</button>
</div>

</form>

</div>
</div>

<script>
// PREVIEW FOTO
document.getElementById('foto').addEventListener('change', function(e){
    const file = e.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(event){
            const img = document.getElementById('preview');
            img.src = event.target.result;
            img.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
});

// GEOLOCATION AUTO
const status = document.getElementById('statusLokasi');
const btn = document.getElementById('btnKirim');

if(navigator.geolocation){

    navigator.geolocation.getCurrentPosition(
        function(position){

            document.getElementById('latitude').value = position.coords.latitude;
            document.getElementById('longitude').value = position.coords.longitude;

            status.className = "alert alert-success py-2";
            status.innerHTML = "Lokasi berhasil didapat";

            btn.disabled = false;
        },
        function(error){

            status.className = "alert alert-danger py-2";

            if(error.code == 1){
                status.innerHTML = "Izin lokasi ditolak. Aktifkan GPS untuk melanjutkan.";
            }else if(error.code == 2){
                status.innerHTML = "Lokasi tidak tersedia.";
            }else{
                status.innerHTML = "Gagal mendapatkan lokasi.";
            }

            btn.disabled = true;
        }
    );

}else{
    status.className = "alert alert-danger py-2";
    status.innerHTML = "Browser tidak mendukung geolocation";
    btn.disabled = true;
}
</script>

</body>
</html>