<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM peminjaman WHERE id_peminjaman = $id");
    header("Location: list_peminjaman.php");
}
?>
