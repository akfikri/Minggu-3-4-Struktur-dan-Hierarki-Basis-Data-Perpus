<?php
include '../config.php';
$result = $conn->query("SELECT * FROM petugas");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Petugas</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Daftar Petugas</h2>
    <a href="add_petugas.php" class="btn btn-success mb-3">Tambah Petugas</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id_petugas']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['no_telepon']; ?></td>
                <td>
                    <a href="edit_petugas.php?id=<?= $row['id_petugas']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_petugas.php?id=<?= $row['id_petugas']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
