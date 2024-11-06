<?php
include '../config.php';
$result = $conn->query("SELECT * FROM anggota");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota Perpustakaan</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Daftar Anggota Perpustakaan</h2>
    <a href="add.php" class="btn btn-success mb-3">Tambah Anggota</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id_anggota']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['no_telepon']; ?></td>
                <td><?= $row['email']; ?></td>
                <td>
                    <a href="anggota/edit.php?id=<?= $row['id_anggota']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="anggota/delete.php?id=<?= $row['id_anggota']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
