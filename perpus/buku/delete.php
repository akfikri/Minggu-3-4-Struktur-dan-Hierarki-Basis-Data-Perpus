<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM buku WHERE id_buku = $id");
    header("Location: list.php");
}
?>
