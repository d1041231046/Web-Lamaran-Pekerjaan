<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
$Id_User = $user['Id_User'];
?>

<html>
    <head>
        <link rel="icon" href="Logo.png">
        <title>LAPER - Profil Saya</title>
        <link rel="stylesheet" href="profil.css">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="footer.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <main class="profil">
            <div class="profil-container">
                <h1>Profil Saya</h1>
                <div class="profil-card">
                    <img src="dummy.png" alt="Foto Profil" class="profil-img">
                    <div class="profil-info">
                        <p><strong>Username:</strong> <?= htmlspecialchars($user['Username']); ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($user['Email']); ?></p>
                    </div>
                </div>

                <div class="profil-aksi">
                    <button onclick="window.location.href='logout.php'">Logout</button>
                </div>
            </div>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>