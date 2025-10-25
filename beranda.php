<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php?error=beranda");
    exit;
}
?>

<html>
    <head>
        <link rel="icon" href="Logo.png">
        <title>LAPER - Beranda</title>
        <link rel="stylesheet" href="beranda.css">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="footer.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <main class="beranda">
            <!-- Slogan & Ajakan -->
            <div class="utama">
                <div class="utama-text">
                    <h1>&quot;LAPER &minus; Satu Langkah Menuju Pekerjaan Impian.&quot;</h1>
                    <button>Lihat Lowongan</button>
                </div>
                
                <div class="utama-img">
                    <img src="Chisa_Card.jpg">
                </div>
            </div>

            <!-- Tentang Website -->
            <div class="tentang">
                <h2>
                    Semua proses lamaran dalam satu tempat.
                    <br>Cari lowongan, kirim CV, dan pantau status lamaran dengan mudah.
                </h2>
            </div>

            <!-- Testimoni -->
            <div class="testimoni-container">
                <div class="testimoni-isi">
                <p>
                    &quot;Dengan LAPER, saya bisa menemukan pekerjaan pertama saya dengan mudah!&quot;<br>
                    &minus; Rina, Web Developer
                </p>
                </div>
                <div class="testimoni-isi">
                <p>
                    &quot;LAPER membantu saya menemukan pekerjaan yang sesuai dengan jurusan saya.
                    Proses lamaran sangat mudah dan cepat.&quot;
                    &minus; Rizky A., Fresh Graduate Teknik Informatika
                </p>
                </div>
                <div class="testimoni-isi">
                <p>
                    &quot;Saya tidak menyangka bisa diterima kerja hanya seminggu setelah melamar lewat LAPER.
                    Web-nya sangat informatif dan mudah digunakan.&quot;
                    &minus; Maya P., Staff Administrasi
                </p>
                </div>
            </div>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>