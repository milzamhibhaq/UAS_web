<?php
include 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah kategori dengan ID tersebut ada
    $check = $conn->query("SELECT * FROM category WHERE id = $id");

    if ($check->num_rows > 0) {
        // Hapus kategori dari database
        $delete = $conn->query("DELETE FROM category WHERE id = $id");

        if ($delete) {
            echo "<script>alert('Kategori berhasil dihapus!'); window.location='admin_index.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus kategori!'); window.location='admin_index.php';</script>";
        }
    } else {
        echo "<script>alert('Data kategori tidak ditemukan!'); window.location='admin_index.php';</script>";
    }
} else {
    echo "<script>alert('ID kategori tidak valid!'); window.location='admin_index.php';</script>";
}
?>
