<?php
session_start();
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM laporan WHERE id='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $status = $_POST['status'];

    mysqli_query($koneksi,
    "UPDATE laporan
    SET status='$status'
    WHERE id='$id'");

    echo "
    <script>
    alert('Status berhasil diperbarui');
    window.location='laporan.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Edit Status</title>

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


<!-- CONTENT -->

<div class="row justify-content-center">

<div class="col-lg-10">

<div class="table-card">

<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

<div>

<h3 class="fw-bold mb-1">
Edit Status Laporan
</h3>

<p class="text-muted mb-0">
Perbarui status laporan parkir liar masyarakat
</p>

</div>

<a href="laporan.php"
class="btn btn-primary">

<i class="bi bi-arrow-left me-2"></i>
Kembali

</a>

</div>

<div class="row g-4">

<!-- FOTO -->

<div class="col-md-5">

<div class="position-relative">

<img src="../assets/upload/<?= $d['foto'] ?>"
class="img-fluid rounded-4 shadow-sm w-100"
style="height:420px; object-fit:cover;">

<div class="position-absolute top-0 start-0 m-3">

<?php

if($d['status']=='Menunggu'){

echo '<span class="badge bg-danger">Menunggu</span>';

}elseif($d['status']=='Diproses'){

echo '<span class="badge bg-warning text-dark">Diproses</span>';

}else{

echo '<span class="badge bg-success">Selesai</span>';

}

?>

</div>

</div>

</div>

<!-- FORM -->

<div class="col-md-7">

<form method="POST">

<div class="mb-4">

<label class="form-label fw-semibold">
Lokasi Pelaporan
</label>

<div class="input-group">

<span class="input-group-text bg-white">
<i class="bi bi-geo-alt"></i>
</span>

<input type="text"
class="form-control"
value="<?= $d['lokasi'] ?>"
readonly>

</div>

</div>

<div class="mb-4">

<label class="form-label fw-semibold">
Deskripsi Laporan
</label>

<textarea class="form-control"
rows="6"
readonly><?= $d['deskripsi'] ?></textarea>

</div>

<div class="mb-4">

<label class="form-label fw-semibold">
Update Status
</label>

<select name="status"
class="form-select"
required>

<option value="Menunggu"
<?= $d['status']=='Menunggu' ? 'selected' : '' ?>>

Menunggu

</option>

<option value="Diproses"
<?= $d['status']=='Diproses' ? 'selected' : '' ?>>

Diproses

</option>

<option value="Selesai"
<?= $d['status']=='Selesai' ? 'selected' : '' ?>>

Selesai

</option>

</select>

</div>

<div class="d-flex gap-3">

<button type="submit"
name="update"
class="btn btn-primary">

<i class="bi bi-check-circle me-2"></i>
Update Status

</button>

<a href="laporan.php"
class="btn btn-light border">

Batal

</a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</div>

</body>
</html>