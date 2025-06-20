<?php
include 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah data author dengan ID tersebut ada
    $check = $conn->query("SELECT * FROM author WHERE id = $id");

    if ($check->num_rows > 0) {
        // Hapus author dari database
        $delete = $conn->query("DELETE FROM author WHERE id = $id");
        if ($delete) {
            echo "<script>alert('Penulis berhasil dihapus!'); window.location='admin_index.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus penulis!'); window.location='admin_index.php';</script>";
        }
    } else {
        echo "<script>alert('Data penulis tidak ditemukan!'); window.location='admin_index.php';</script>";
    }
} else {
    echo "<script>alert('ID penulis tidak valid!'); window.location='admin_index.php';</script>";
}
?>
