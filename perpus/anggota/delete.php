<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM anggota WHERE id_anggota = $id");
    header("Location: ../index.php");
}
?>
