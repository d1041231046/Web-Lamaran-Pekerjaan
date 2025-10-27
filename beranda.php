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
                    <button onclick="window.location.href='lowongan.php'">Lihat Lowongan</button>
                </div>
                
                <div class="utama-img">
                    <img src="utama.jpg">
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
                    <img src="Rina.jpg" alt="Foto Rina">
                    <div class="testimoni-text">
                        <p>"Dengan LAPER, saya bisa menemukan pekerjaan pertama saya dengan mudah!"</p>
                        <h4>Rina</h4>
                        <span>Web Developer</span>
                    </div>
                </div>

                <div class="testimoni-isi">
                    <img src="Rizky.jpg" alt="Foto Rizky">
                    <div class="testimoni-text">
                        <p>"LAPER membantu saya menemukan pekerjaan yang sesuai dengan jurusan saya."</p>
                        <h4>Rizky A.</h4>
                        <span>Fresh Graduate Teknik Informatika</span>
                    </div>
                </div>

                <div class="testimoni-isi">
                    <img src="Maya.png" alt="Foto Maya">
                    <div class="testimoni-text">
                        <p>"Saya diterima kerja hanya seminggu setelah melamar lewat LAPER."</p>
                        <h4>Maya P.</h4>
                        <span>Staff Administrasi</span>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>