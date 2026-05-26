<?php
session_start();
include '../config/koneksi.php';

if(isset($_POST['login'])){

    $email      = htmlspecialchars($_POST['email']);
    $password   = md5($_POST['password']);

    $data = mysqli_query($koneksi,
    "SELECT * FROM users
    WHERE email='$email'
    AND password='$password'");

    $d = mysqli_fetch_array($data);

    if($d){

        $_SESSION['id'] = $d['id'];
        $_SESSION['nama'] = $d['nama'];
        $_SESSION['role'] = $d['role'];

        if($d['role']=='admin'){

            header('location:../admin/dashboard.php');

        }else{

            header('location:../user/dashboard.php');

        }

    }else{

        echo "
        <script>
        alert('Email atau Password Salah');
        </script>
        ";

    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="../assets/css/style.css">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

.auth-container{
    min-height: 100vh;

    background:
    linear-gradient(rgba(255,255,255,0.9),rgba(255,255,255,0.9)),
    url('../assets/img/bg-auth.jpg');

    background-size: cover;
    background-position: center;

    display: flex;
    justify-content: center;
    align-items: center;

    padding: 30px;
}

.auth-card{
    width: 100%;
    max-width: 450px;

    background: white;
    border-radius: 30px;

    padding: 40px;

    box-shadow: 0 20px 60px rgba(0,0,0,0.08);
}

.auth-logo{
    width: 90px;
    height: 90px;

    background: linear-gradient(135deg,#2563eb,#3b82f6);

    border-radius: 25px;

    display: flex;
    justify-content: center;
    align-items: center;

    margin: auto;
    margin-bottom: 25px;

    color: white;
    font-size: 40px;
}

.form-control{
    height: 55px;
    border-radius: 14px;
}

.btn-primary{
    height: 55px;
    border-radius: 14px;

    background: linear-gradient(135deg,#2563eb,#3b82f6);

    border: none;
}

.password-box{
    position: relative;
}

.show-password{
    position: absolute;
    right: 15px;
    top: 16px;

    cursor: pointer;
    color: #64748b;
}

</style>

</head>
<body>

<div class="auth-container">

<div class="auth-card">

<div class="text-center">

<div class="auth-logo">
<i class="bi bi-shield-lock"></i>
</div>

<h2 class="fw-bold">
Selamat Datang
</h2>

<p class="text-muted mb-4">
Login untuk melanjutkan ke sistem
</p>

</div>

<form method="POST">

<div class="mb-3">

<label class="mb-2">
Email
</label>

<input type="email"
name="email"
class="form-control"
placeholder="Masukkan email"
required>

</div>

<div class="mb-4">

<label class="mb-2">
Password
</label>

<div class="password-box">

<input type="password"
name="password"
id="password"
class="form-control"
placeholder="Masukkan password"
required>

<i class="bi bi-eye-slash show-password"
onclick="togglePassword()"></i>

</div>

</div>

<button type="submit"
name="login"
class="btn btn-primary w-100">

Login Sekarang

</button>

</form>

<div class="text-center mt-4">

Belum punya akun?

<a href="register.php"
class="text-decoration-none fw-bold">

Daftar

</a>

</div>

</div>

</div>

<script>

function togglePassword(){

    const password = document.getElementById('password');

    const icon = document.querySelector('.show-password');

    if(password.type === "password"){

        password.type = "text";

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

    }else{

        password.type = "password";

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');

    }

}

</script>

</body>