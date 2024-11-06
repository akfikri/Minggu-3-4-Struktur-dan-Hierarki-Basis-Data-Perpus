<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM petugas WHERE id_petugas = $id");
    $petugas = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];

    $sql = "UPDATE petugas SET nama='$nama', email='$email', no_telepon='$no_telepon' WHERE id_petugas=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: list_petugas.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Petugas</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Edit Petugas</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $petugas['nama'] ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $petugas['email'] ?>">
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $petugas['no_telepon'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update Petugas</button>
    </form>
</div>
</body>
</html>
