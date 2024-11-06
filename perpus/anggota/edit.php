<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM anggota WHERE id_anggota = $id");
    $anggota = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];

    $sql = "UPDATE anggota SET nama='$nama', alamat='$alamat', no_telepon='$no_telepon', email='$email' WHERE id_anggota=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Edit Anggota</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $anggota['nama'] ?>">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $anggota['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $anggota['no_telepon'] ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $anggota['email'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update Anggota</button>
    </form>
</div>
</body>
</html>
