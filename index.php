<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Sistem Pelaporan Parkir Liar
</title>

<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<!-- Bootstrap Icon -->

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- CSS -->

<link rel="stylesheet"
href="assets/css/style.css">

<style>

body{
    background: #f5f7fb;
    overflow-x: hidden;
}

/* NAVBAR */

.navbar{
    padding: 18px 0;
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(12px);

    box-shadow:
    0 10px 30px rgba(15,23,42,0.05);
}

.navbar-brand{
    font-size: 24px;
    font-weight: 700;
    color: #2563eb !important;
}

.nav-link{
    color: #475569 !important;
    font-weight: 500;
    margin-left: 15px;
}

.nav-link:hover{
    color: #2563eb !important;
}

/* HERO */

.hero{
    padding-top: 140px;
    padding-bottom: 100px;
}

.hero-title{
    font-size: 60px;
    font-weight: 700;
    line-height: 1.2;

    color: #0f172a;
}

.hero-text{
    color: #64748b;
    font-size: 18px;
    line-height: 1.9;
}

.hero-badge{
    display: inline-block;

    background: #eaf2ff;
    color: #2563eb;

    padding: 12px 18px;

    border-radius: 14px;

    margin-bottom: 25px;

    font-weight: 600;
}

.hero-img{
    width: 100%;
    animation: float 4s ease-in-out infinite;
}

@keyframes float{

    0%{
        transform: translateY(0px);
    }

    50%{
        transform: translateY(-15px);
    }

    100%{
        transform: translateY(0px);
    }

}

/* BUTTON */

.btn-primary{
    background:
    linear-gradient(135deg,#4f8cff,#74a7ff);

    border: none;

    border-radius: 14px;

    padding: 14px 28px;

    font-weight: 500;
}

.btn-outline-primary{

    border-radius: 14px;

    padding: 14px 28px;

    font-weight: 500;

}

/* CARD */

.feature-card{

    background: white;

    border-radius: 28px;

    padding: 35px 25px;

    text-align: center;

    transition: 0.3s;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.05);

    height: 100%;
}

.feature-card:hover{
    transform: translateY(-10px);
}

.icon-feature{

    width: 85px;
    height: 85px;

    background:
    linear-gradient(135deg,#4f8cff,#74a7ff);

    border-radius: 24px;

    display: flex;
    justify-content: center;
    align-items: center;

    margin: auto;
    margin-bottom: 25px;

    color: white;
    font-size: 35px;
}

/* SECTION */

.section-title{

    font-size: 42px;
    font-weight: 700;

    color: #0f172a;
}

.section-text{
    color: #64748b;
}

/* ABOUT */

.about-box{

    background: white;

    border-radius: 32px;

    padding: 40px;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.05);
}

/* CTA */

.cta{

    background:
    linear-gradient(135deg,#4f8cff,#74a7ff);

    border-radius: 35px;

    padding: 70px 40px;

    color: white;
}

/* FOOTER */

footer{

    margin-top: 100px;

    padding: 30px;

    text-align: center;

    color: #64748b;
}

/* RESPONSIVE */

@media(max-width:991px){

    .hero-title{
        font-size: 42px;
    }

    .hero{
        text-align: center;
    }

}

</style>

</head>
<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg fixed-top">

<div class="container">

<a class="navbar-brand"
href="#">

<i class="bi bi-shield-check"></i>
ParkirLapor

</a>

<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse"
id="menu">

<ul class="navbar-nav ms-auto align-items-center">

<li class="nav-item">
<a class="nav-link"
href="#fitur">

Fitur

</a>
</li>

<li class="nav-item">
<a class="nav-link"
href="#tentang">

Tentang

</a>
</li>

<li class="nav-item ms-3">

<a href="auth/login.php"
class="btn btn-outline-primary">

Login

</a>

</li>

<li class="nav-item ms-2">

<a href="auth/register.php"
class="btn btn-primary">

Daftar

</a>

</li>

</ul>

</div>

</div>

</nav>

<!-- HERO -->

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6 mb-5">

<div class="hero-badge">

<i class="bi bi-geo-alt-fill"></i>
Smart Parking Report System

</div>

<h1 class="hero-title mb-4">

Laporkan
Parkir Liar
Dengan Mudah

</h1>

<p class="hero-text mb-5">

Platform digital modern untuk membantu
masyarakat melaporkan parkir liar secara
realtime menggunakan GPS otomatis,
monitoring progress, dan peta pelanggaran.

</p>

<div class="d-flex flex-wrap gap-3">

<a href="auth/register.php"
class="btn btn-primary">

<i class="bi bi-person-plus"></i>
Daftar Sekarang

</a>

<a href="auth/login.php"
class="btn btn-outline-primary">

<i class="bi bi-box-arrow-in-right"></i>
Login

</a>

</div>

</div>

<div class="col-lg-6 text-center">

<img src="assets/gambar/mockup.jpg"
class="hero-gambar">

</div>

</div>

</div>

</section>

<!-- FITUR -->

<section class="py-5"
id="fitur">

<div class="container">

<div class="text-center mb-5">

<h2 class="section-title">
Fitur Unggulan
</h2>

<p class="section-text">
Sistem modern dengan teknologi realtime
</p>

</div>

<div class="row">

<div class="col-md-3 mb-4">

<div class="feature-card">

<div class="icon-feature">
<i class="bi bi-camera"></i>
</div>

<h5 class="fw-bold mb-3">
Upload Foto
</h5>

<p class="section-text">

Melaporkan kendaraan atau area parkir liar
dengan foto secara langsung.

</p>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="feature-card">

<div class="icon-feature">
<i class="bi bi-geo-alt"></i>
</div>

<h5 class="fw-bold mb-3">
GPS Otomatis
</h5>

<p class="section-text">

Lokasi pelanggaran otomatis terdeteksi
menggunakan GPS realtime.

</p>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="feature-card">

<div class="icon-feature">
<i class="bi bi-map"></i>
</div>

<h5 class="fw-bold mb-3">
Peta Digital
</h5>

<p class="section-text">

Melihat titik pelanggaran parkir liar
melalui peta interaktif.

</p>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="feature-card">

<div class="icon-feature">
<i class="bi bi-bar-chart"></i>
</div>

<h5 class="fw-bold mb-3">
Grafik Laporan
</h5>

<p class="section-text">

Monitoring statistik laporan masyarakat
secara realtime.

</p>

</div>

</div>

</div>

</div>

</section>

<!-- ABOUT -->

<section class="py-5"
id="tentang">

<div class="container">

<div class="about-box">

<div class="row align-items-center">

<div class="col-lg-6 mb-4">

<img src="assets/gambar/sistem.jpg"
class="img-fluid">

</div>

<div class="col-lg-6">

<h2 class="section-title mb-4">

Tentang Sistem

</h2>

<p class="section-text mb-4">

Sistem Pelaporan Parkir Liar dirancang
untuk membantu masyarakat melaporkan
pelanggaran parkir dengan cepat,
mudah, dan transparan.

</p>

<div class="mb-3">

<i class="bi bi-check-circle-fill text-primary"></i>

Monitoring realtime laporan

</div>

<div class="mb-3">

<i class="bi bi-check-circle-fill text-primary"></i>

Peta lokasi pelanggaran

</div>

<div class="mb-3">

<i class="bi bi-check-circle-fill text-primary"></i>

Dashboard modern dan profesional

</div>

<div class="mb-3">

<i class="bi bi-check-circle-fill text-primary"></i>

Responsive Bootstrap 5

</div>

</div>

</div>

</div>

</div>

</section>

<!-- CTA -->

<section class="py-5">

<div class="container">

<div class="cta text-center">

<h2 class="fw-bold mb-4">

Mari Bantu Tertibkan
Parkir Liar

</h2>

<p class="mb-4">

Laporkan pelanggaran parkir dengan mudah,
cepat, dan realtime.

</p>

<a href="auth/register.php"
class="btn btn-light">

Mulai Sekarang

</a>

</div>

</div>

</section>

<!-- FOOTER -->

<footer>

Copyright © 2026
Sistem Pelaporan Parkir Liar

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/script.js"></script>

</body>