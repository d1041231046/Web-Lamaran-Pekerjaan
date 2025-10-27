<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['Password'])) {
            $_SESSION['user'] = $user;
            header("Location: beranda.php");
            exit;
        } else {
            header("Location: login.html?error=Password+Salah");
            exit;
        }
    } else {
        header("Location: login.html?error=Email+Tidak+Ditemukan");
        exit;
    }
} else {
    header("Location: login.html?error=entah");
    exit;
}