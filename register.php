<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['password2'];

    if ($password !== $confirm) {
        $error = "Password dan konfirmasi password tidak sama.";
    }
    else {
        $cekEmail = mysqli_query($conn, "SELECT * FROM user WHERE Email = '$email'");
        if (mysqli_num_rows($cekEmail) > 0) {
            $error = "Email sudah terdaftar. Silakan gunakan email lain.";
        } else {
            $query = "INSERT INTO user (Username, Email, Password) VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $userBaru = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE Email = '$email'"));

                $_SESSION['user'] = $userBaru;

                header("Location: beranda.php");
                exit();
            } else {
                $error = "Gagal mendaftarkan akun. Silakan coba lagi.";
            }
        }
    }
}
?>

<html>
    <head>
        <title>LAPER - Registrasi</title>
    </head>
    <body>
        <h2>Buat Akun Baru</h2>
        <form method="post" action="register.php">
            <!-- Tempat input Username -->
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username">
            <br>

            <!-- Tempat input Email -->
            <label for="email">Email</label>
            <input type="Email" id="email" name="email" placeholder="Email">
            <br>

            <!-- Tempat input Password -->
            <label for="password">Password</label>
            <input type="Password" id="password" name="password" placeholder="Password">
            <br>

            <!-- Tempat validasi Password -->
            <label for="password2">Konfirmasi Password</label>
            <input type="Password" id="password2" name="password2" placeholder="Ulangi Password">
            <br>
            
            <!-- Button Sign-up -->
            <input type="submit" value="Sign-up">
            <br>
        </form>
    </body>
</html>