<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM peminjaman WHERE id_peminjaman = $id");
    $peminjaman = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $sql = "UPDATE peminjaman SET id_anggota='$id_anggota', id_buku='$id_buku', tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$tanggal_kembali' WHERE id_peminjaman=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: list.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Peminjaman</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Peminjaman</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="id_anggota" class="form-label">ID Anggota</label>
            <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?= $peminjaman['id_anggota'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="id_buku" class="form-label">ID Buku</label>
            <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?= $peminjaman['id_buku'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $peminjaman['tanggal_pinjam'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?= $peminjaman['tanggal_kembali'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Peminjaman</button>
    </form>
</div>
</body>
</html>
