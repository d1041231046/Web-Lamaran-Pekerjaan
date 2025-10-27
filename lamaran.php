<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$Id_User = $_SESSION['user']['Id_User'];

$query = "
    SELECT 
        l.Nama_Pekerjaan,
        l.Nama_Perusahaan,
        lu.Tanggal_Lamaran,
        lu.Status_Lamaran
    FROM lowongan_user lu
    JOIN lowongan_pekerjaan l ON lu.Id_Lowongan_Pekerjaan = l.Id_Lowongan_Pekerjaan
    WHERE lu.Id_User = '$Id_User'
    ORDER BY lu.Tanggal_Lamaran DESC
";
$result = mysqli_query($conn, $query);
?>

<html>
    <head>
        <link rel="icon" href="Logo.png">
        <title>LAPER - Lamaran Saya</title>
        <link rel="stylesheet" href="lamaran.css">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="footer.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <main class="lamaran">
            <h1>Lamaran Saya</h1>
            <div class="lamaran-container">
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="lamaran-item">
                            <div class="lamaran-info">
                                <h3><?= htmlspecialchars($row['Nama_Pekerjaan']); ?></h3>
                                <p><strong>Perusahaan:</strong> <?= htmlspecialchars($row['Nama_Perusahaan']); ?></p>
                                <p><strong>Tanggal Lamar:</strong> <?= htmlspecialchars($row['Tanggal_Lamaran']); ?></p>
                                <p><strong>Status:</strong> 
                                    <span class="status">
                                        <?= htmlspecialchars($row['Status_Lamaran']); ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Belum ada lamaran yang dikirim.</p>
                <?php endif; ?>
            </div>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>
