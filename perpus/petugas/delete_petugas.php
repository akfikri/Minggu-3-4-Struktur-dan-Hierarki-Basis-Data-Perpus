<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM petugas WHERE id_petugas = $id");
    header("Location: list_petugas.php");
}
?>
