
<?php
include 'config.php';

// Mengambil data jumlah petugas, anggota, buku, dan peminjaman
$petugas_count = $conn->query("SELECT COUNT(*) AS count FROM petugas")->fetch_assoc()['count'];
$anggota_count = $conn->query("SELECT COUNT(*) AS count FROM anggota")->fetch_assoc()['count'];
$buku_count = $conn->query("SELECT COUNT(*) AS count FROM buku")->fetch_assoc()['count'];
$peminjaman_count = $conn->query("SELECT COUNT(*) AS count FROM peminjaman")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <h1>Selamat Datang di Sistem Perpustakaan</h1>
    </header>

    <nav>
        <ul>
            <li><a href="petugas/list_petugas.php">Kelola Data Petugas</a></li>
            <li><a href="anggota/list_anggota.php">Kelola Data Anggota</a></li>
            <li><a href="buku/list_buku.php">Kelola Data Buku</a></li>
            <li><a href="peminjaman/list_peminjaman.php">Kelola Data Peminjaman</a></li>
        </ul>
    </nav>

    <section class="summary">
        <h2>Ringkasan Data Perpustakaan</h2>
        <div class="summary-card">
            <h3>Total Petugas</h3>
            <p><?= $petugas_count; ?> petugas</p>
        </div>
        <div class="summary-card">
            <h3>Total Anggota</h3>
            <p><?= $anggota_count; ?> anggota</p>
        </div>
        <div class="summary-card">
            <h3>Total Buku</h3>
            <p><?= $buku_count; ?> buku</p>
        </div>
        <div class="summary-card">
            <h3>Total Peminjaman</h3>
            <p><?= $peminjaman_count; ?> peminjaman</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Sistem Perpustakaan</p>
    </footer>
</body>
</html>
