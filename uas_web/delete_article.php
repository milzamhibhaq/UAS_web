<?php
include 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah artikel dengan ID tersebut ada
    $check = $conn->query("SELECT * FROM article WHERE id = $id");

    if ($check->num_rows > 0) {
        // Hapus artikel dari database
        $delete = $conn->query("DELETE FROM article WHERE id = $id");

        if ($delete) {
            echo "<script>alert('Artikel berhasil dihapus!'); window.location='admin_index.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus artikel!'); window.location='admin_index.php';</script>";
        }
    } else {
        echo "<script>alert('Data artikel tidak ditemukan!'); window.location='admin_index.php';</script>";
    }
} else {
    echo "<script>alert('ID artikel tidak valid!'); window.location='admin_index.php';</script>";
}
?>
