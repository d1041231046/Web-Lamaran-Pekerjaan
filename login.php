<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE Email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($password === $user['Password']) {
            $_SESSION['Id_User'] = $user['Id_User'];
            $_SESSION['Username'] = $user['Username'];
            $_SESSION['Email'] = $user['Email'];
            
            header("Location: beranda.php");
            exit();
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Email tidak ditemukan.";
    }
}
?>

<html>
    <head>
        <link rel="icon" href="Logo.png">
        <title>LAPER - Login</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="logo">
            <img src="Logo.png">
        </div>
        <div class="login">
            <h2>Login LAPER</h2>
            <form method="post" action="login_proses.php">
                <!-- Tempat input Email -->
                <label class="label" for="email"><strong>Email</strong></label>
                <input type="Email" id="email" name="email" placeholder="Email">
                <br>

                <!-- Tempat input Password -->
                <label class="label" for="password"><strong>Password</strong></label>
                <input type="Password" id="password" name="password" placeholder="Password">
                <br>
                <br>
                
                <!-- Button Sign-in -->
                <input type="submit" value="Sign-in" class="button">
                <br>

                <!-- Register account -->
                <p>doesn't have an account? <a href="register.php">click here to sign up</a></p>
            </form>
        </div>
    </body>
</html>