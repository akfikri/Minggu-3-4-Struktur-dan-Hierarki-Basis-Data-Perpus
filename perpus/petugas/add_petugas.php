<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $no_telepon = $_POST['no_telepon'];

    $sql = "INSERT INTO petugas (nama, email, password, no_telepon) VALUES ('$nama', '$email', '$password', '$no_telepon')";
    if ($conn->query($sql) === TRUE) {
        header("Location: list_petugas.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Petugas</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Tambah Petugas</h2>
    <form method="POST" action="add_petugas.php">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Petugas</button>
    </form>
</div>
</body>
</html>
