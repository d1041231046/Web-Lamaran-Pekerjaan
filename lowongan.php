<?php
$koneksi = mysqli_connect("localhost", "root", "", "nama_database");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM nama_tabel";
$result = mysqli_query($koneksi, $query);
?>

<html>
    <head></head>
    <body>

    <div class="lowongan">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="card">
                <div class="header">
                    <div class="perusahaan"><?= htmlspecialchars($row['perusahaan']); ?></div>
                    <div class="job"><?= htmlspecialchars($row['job']); ?></div>
                </div>

                <div class="image">
                    <img src="<?= htmlspecialchars($row['image']); ?>" alt="Gambar Lowongan">
                </div>

                <div class="content">
                    <?= htmlspecialchars($row['content']); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    </body>
</html>