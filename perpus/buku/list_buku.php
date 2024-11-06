<?php
include '../config.php';
$result = $conn->query("SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Data Buku</h2>
    <a href="add.php" class="btn btn-success mb-3">Tambah Buku</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id_buku']; ?></td>
                <td><?= $row['judul']; ?></td>
                <td><?= $row['penulis']; ?></td>
                <td><?= $row['penerbit']; ?></td>
                <td><?= $row['tahun_terbit']; ?></td>
                <td><?= $row['stok']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_buku']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['id_buku']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
