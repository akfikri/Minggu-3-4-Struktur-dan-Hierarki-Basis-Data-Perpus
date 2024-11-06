<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];

    $sql = "INSERT INTO anggota (nama, alamat, no_telepon, email) VALUES ('$nama', '$alamat', '$no_telepon', '$email')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Tambah Anggota</h2>
    <form method="POST" action="add.php">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Anggota</button>
    </form>
</div>
</body>
</html>
