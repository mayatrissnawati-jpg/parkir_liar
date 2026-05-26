<?php
include '../config/koneksi.php';

if(isset($_POST['register'])){

    $nama              = htmlspecialchars($_POST['nama']);
    $email             = htmlspecialchars($_POST['email']);
    $password          = $_POST['password'];
    $konfirmasi        = $_POST['konfirmasi_password'];
    $role              = $_POST['role'];

    // CHECK EMAIL

    $cek = mysqli_query($koneksi,
    "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($cek) > 0){

        echo "
        <script>
        alert('Email sudah digunakan');
        </script>
        ";

    }else{

        // VALIDASI PASSWORD

        if(strlen($password) < 6){

            echo "
            <script>
            alert('Password minimal 6 karakter');
            </script>
            ";

        }elseif($password != $konfirmasi){

            echo "
            <script>
            alert('Konfirmasi password tidak sesuai');
            </script>
            ";

        }else{

            $password_hash = md5($password);

            mysqli_query($koneksi,
            "INSERT INTO users(nama,email,password,role)
            VALUES('$nama','$email','$password_hash','$role')");

            echo "
            <script>
            alert('Register berhasil');
            window.location='login.php';
            </script>
            ";

        }

    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register</title>

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
    max-width: 500px;

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

.form-select{
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
<i class="bi bi-person-plus"></i>
</div>

<h2 class="fw-bold">
Buat Akun Baru
</h2>

<p class="text-muted mb-4">
Daftar untuk menggunakan sistem
pelaporan parkir liar
</p>

</div>

<form method="POST">

<div class="mb-3">

<label class="mb-2">
Nama Lengkap
</label>

<input type="text"
name="nama"
class="form-control"
placeholder="Masukkan nama lengkap"
required>

</div>

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

<div class="mb-3">

<label class="mb-2">
Password
</label>

<div class="password-box">

<input type="password"
name="password"
id="password"
class="form-control"
placeholder="Minimal 6 karakter"
required>

<i class="bi bi-eye-slash show-password"
onclick="togglePassword('password',this)"></i>

</div>

</div>

<div class="mb-3">

<label class="mb-2">
Konfirmasi Password
</label>

<div class="password-box">

<input type="password"
name="konfirmasi_password"
id="konfirmasi"
class="form-control"
placeholder="Ulangi password"
required>

<i class="bi bi-eye-slash show-password"
onclick="togglePassword('konfirmasi',this)"></i>

</div>

</div>

<div class="mb-4">

<label class="mb-2">
Daftar Sebagai
</label>

<select name="role"
class="form-select"
required>

<option value="">
-- Pilih Role --
</option>

<option value="user">
User
</option>

<option value="admin">
Admin
</option>

</select>

</div>

<button type="submit"
name="register"
class="btn btn-primary w-100">

Daftar Sekarang

</button>

</form>

<div class="text-center mt-4">

Sudah punya akun?

<a href="login.php"
class="text-decoration-none fw-bold">

Login

</a>

</div>

</div>

</div>

<script>

function togglePassword(id,icon){

    const input = document.getElementById(id);

    if(input.type === "password"){

        input.type = "text";

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

    }else{

        input.type = "password";

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');

    }

}

</script>

</body>
</html>