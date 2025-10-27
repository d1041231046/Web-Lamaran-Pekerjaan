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
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO user (Username, Email, Password) VALUES ('$username', '$email', '$hashed_password')";
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
        <link rel="icon" href="Logo.png">
        <title>LAPER - Registrasi</title>
        <link rel="stylesheet" href="register.css">
    </head>
    <body>
        <div class="logo">
            <img src="Logo.png">
        </div>
        <div class="register">
            <h2>Buat Akun Baru</h2>
            <form method="post" action="register.php">
                <!-- Tempat input Username -->
                <label class="label" for="username"><strong>Username</strong></label>
                <input type="text" id="username" name="username" placeholder="Username" required>
                <br>

                <!-- Tempat input Email -->
                <label class="label" for="email"><strong>Email</strong></label>
                <input type="Email" id="email" name="email" placeholder="Email" required>
                <br>

                <!-- Tempat input Password -->
                <label class="label" for="password"><strong>Password</strong></label>
                <input type="Password" id="password" name="password" placeholder="Password" required>
                <br>

                <!-- Tempat validasi Password -->
                <label class="label" for="password2"><strong>Konfirmasi Password</strong></label>
                <input type="Password" id="password2" name="password2" placeholder="Ulangi Password" required>
                <br>
                <br>
                
                <!-- Button Sign-up -->
                <input class="button" type="submit" value="Sign-up">
                <br>
            </form>
        </div>
    </body>
</html>