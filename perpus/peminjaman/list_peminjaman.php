<?php
include '../config.php';

// Query dengan JOIN untuk mendapatkan nama anggota dan judul buku
$sql = "
    SELECT peminjaman.id_peminjaman, anggota.nama AS nama, buku.judul AS judul, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali 
    FROM peminjaman
    JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota
    JOIN buku ON peminjaman.id_buku = buku.id_buku
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Data Peminjaman</h2>
    <a href="add.php" class="btn btn-success mb-3">Tambah Peminjaman</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id_peminjaman']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['judul']; ?></td>
                <td><?= $row['tanggal_pinjam']; ?></td>
                <td><?= $row['tanggal_kembali']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_peminjaman']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['id_peminjaman']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
