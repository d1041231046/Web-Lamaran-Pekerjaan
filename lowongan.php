<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}

$query = "SELECT * FROM lowongan_pekerjaan ORDER BY Tanggal_Posting DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<html>
<head>
    <link rel="icon" href="Logo.png">
    <title>LAPER - Lowongan Pekerjaan</title>
    <link rel="stylesheet" href="lowongan.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <?php include 'header.html'; ?>
    <main class="lowongan">
        <h1>Daftar Lowongan Pekerjaan</h1>

        <div class="lowongan-container">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="card">
                        <div class="card-header">
                            <h2><?= htmlspecialchars($row['Nama_Pekerjaan']); ?></h2>
                            <h3><?= htmlspecialchars($row['Nama_Perusahaan']); ?></h3>
                        </div>

                        <div class="card-body">
                            <p><strong>Alamat:</strong> <?= htmlspecialchars($row['Alamat']); ?></p>
                            <p><strong>Gaji:</strong> <?= htmlspecialchars($row['Gaji']); ?></p>
                            <p><em>Diposting pada <?= htmlspecialchars($row['Tanggal_Posting']); ?></em></p>
                        </div>

                        <div class="card-footer">
                            <button onclick="openDetail(<?= $row['Id_Lowongan_Pekerjaan']; ?>)">Detail</button>
                        </div>
                    </div>

                    <!-- Overlay Detail -->
                    <div class="overlay" id="overlay-<?= $row['Id_Lowongan_Pekerjaan']; ?>">
                        <div class="overlay-content">
                            <span class="close-btn" onclick="closeDetail(<?= $row['Id_Lowongan_Pekerjaan']; ?>)">&times;</span>
                            <h2><?= htmlspecialchars($row['Nama_Pekerjaan']); ?></h2>
                            <h3><?= htmlspecialchars($row['Nama_Perusahaan']); ?></h3>
                            <p><strong>Alamat:</strong> <?= htmlspecialchars($row['Alamat']); ?></p>
                            <p><strong>Gaji:</strong> <?= htmlspecialchars($row['Gaji']); ?></p>
                            <p><strong>No. Telp:</strong> <?= htmlspecialchars($row['No_Telp']); ?></p>
                            <p><strong>Email:</strong> <?= htmlspecialchars($row['Email']); ?></p>
                            <p><strong>Requirement:</strong> <?= nl2br(htmlspecialchars($row['Requirement'])); ?></p>
                            <p><strong>Deskripsi:</strong> <?= nl2br(htmlspecialchars($row['Deskripsi'])); ?></p>
                            <p><em>Diposting pada <?= htmlspecialchars($row['Tanggal_Posting']); ?></em></p>

                            <button class="lamar-btn"
                                onclick="window.location.href='lamar.php?id=<?= $row['Id_Lowongan_Pekerjaan']; ?>'">
                                Lamar Sekarang
                            </button>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Tidak ada lowongan yang tersedia saat ini.</p>
            <?php endif; ?>
        </div>
    </main>
    <?php include 'footer.html'; ?>
    <script src="lowongan.js" defer></script>
</body>
</html>
