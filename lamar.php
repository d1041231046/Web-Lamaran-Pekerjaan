<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    die("Lowongan tidak ditemukan.");
}

$Id_User = $_SESSION['user']['Id_User'];
$Id_Lowongan = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $pendidikan = $_POST['pendidikan'];
    $pengalaman = $_POST['pengalaman'];
    $status = "Diproses";

    $cv_name = $_FILES['cv']['name'];
    $foto_name = $_FILES['foto']['name'];
    $cv_path = "uploads/" . basename($cv_name);
    $foto_path = "uploads/" . basename($foto_name);

    if (!is_dir("uploads")) {
        mkdir("uploads");
    }

    move_uploaded_file($_FILES['cv']['tmp_name'], $cv_path);
    move_uploaded_file($_FILES['foto']['tmp_name'], $foto_path);

    $query = "INSERT INTO lowongan_user 
        (Id_User, Id_Lowongan_Pekerjaan, Nama_Lengkap, Tanggal_Lahir, Jenis_Kelamin, Alamat, No_Telp, Email, `Pendidikan Terakhir`, `Pengalaman Kerja`, CV, Foto, Status_Lamaran)
        VALUES ('$Id_User', '$Id_Lowongan', '$nama', '$tgl_lahir', '$jk', '$alamat', '$no_telp', '$email', '$pendidikan', '$pengalaman', '$cv_path', '$foto_path', '$status')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: lamaran.php");
        exit;
    } else {
        echo "Gagal menyimpan lamaran: " . mysqli_error($conn);
    }
}
?>

<html>
    <head>
        <link rel="icon" href="Logo.png">
        <title>LAPER - Lamar Pekerjaan</title>
        <link rel="stylesheet" href="lamar.css">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="footer.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <main class="lamar">
            <div class="form-container">
                <h2>Lamar Pekerjaan</h2>
                <form method="post" enctype="multipart/form-data">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" required>

                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" required>

                    <label>Jenis Kelamin</label>
                    <select name="jk" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    <label>Alamat</label>
                    <textarea name="alamat" required></textarea>

                    <label>No Telepon</label>
                    <input type="text" name="no_telp" required>

                    <label>Email</label>
                    <input type="email" name="email" required>

                    <label>Pendidikan Terakhir</label>
                    <input type="text" name="pendidikan" required>

                    <label>Pengalaman Kerja</label>
                    <textarea name="pengalaman" required></textarea>

                    <label>Upload CV (PDF/DOC)</label>
                    <input type="file" name="cv" accept=".pdf,.doc,.docx" required>

                    <label>Upload Foto (JPG/PNG)</label>
                    <input type="file" name="foto" accept=".jpg,.jpeg,.png" required>

                    <button type="submit">Kirim Lamaran</button>
                </form>
            </div>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>
