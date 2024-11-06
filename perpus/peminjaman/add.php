<?php
include '../config.php';

// Ambil data anggota dan buku dari database
$anggotaResult = $conn->query("SELECT id_anggota, nama FROM anggota");
$bukuResult = $conn->query("SELECT id_buku, judul, stok FROM buku");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    // Periksa stok buku terlebih dahulu
    $stokQuery = $conn->query("SELECT stok FROM buku WHERE id_buku = '$id_buku'");
    $stokRow = $stokQuery->fetch_assoc();
    
    if ($stokRow['stok'] > 0) {
        // Simpan data peminjaman
        $sql = "INSERT INTO peminjaman (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali) VALUES ('$id_anggota', '$id_buku', '$tanggal_pinjam', '$tanggal_kembali')";
        
        if ($conn->query($sql) === TRUE) {
            // Kurangi stok buku
            $conn->query("UPDATE buku SET stok = stok - 1 WHERE id_buku = '$id_buku'");
            header("Location: list_peminjaman.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Stok buku habis. Tidak dapat melakukan peminjaman.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Peminjaman</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="id_anggota" class="form-label">ID Anggota</label>
            <select class="form-control" id="id_anggota" name="id_anggota" required>
                <option value="" disabled selected>Pilih Anggota</option>
                <?php while ($row = $anggotaResult->fetch_assoc()) { ?>
                    <option value="<?= $row['id_anggota']; ?>"><?= $row['id_anggota']; ?> - <?= $row['nama']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_buku" class="form-label">ID Buku</label>
            <select class="form-control" id="id_buku" name="id_buku" required>
                <option value="" disabled selected>Pilih Buku</option>
                <?php while ($row = $bukuResult->fetch_assoc()) { ?>
                    <option value="<?= $row['id_buku']; ?>"><?= $row['id_buku']; ?> - <?= $row['judul']; ?> (Stok: <?= $row['stok']; ?>)</option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Peminjaman</button>
    </form>
</div>
</body>
</html>
