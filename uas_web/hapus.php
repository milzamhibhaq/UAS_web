<?php
session_start();
include 'config.php';

// Validasi parameter dan autentikasi user
if (!isset($_GET['id']) || !isset($_SESSION['author_id'])) {
  header("Location: index.php");
  exit;
}

$article_id = intval($_GET['id']);
$author_id = $_SESSION['author_id'];

// Verifikasi bahwa artikel memang milik user yang login
$check = $conn->prepare("
  SELECT 1 FROM article_author 
  WHERE article_id = ? AND author_id = ?
");
if (!$check) {
  echo "Gagal prepare verifikasi: " . $conn->error;
  exit;
}
$check->bind_param("ii", $article_id, $author_id);
$check->execute();
$check->store_result();

if ($check->num_rows === 0) {
  echo "<script>alert('Akses ditolak. Bukan artikel milik Anda.'); window.location='index.php';</script>";
  exit;
}

// Hapus relasi dari article_author
$del_author = $conn->prepare("DELETE FROM article_author WHERE article_id = ?");
if ($del_author) {
  $del_author->bind_param("i", $article_id);
  $del_author->execute();
}

// Hapus relasi dari article_category
$del_category = $conn->prepare("DELETE FROM article_category WHERE article_id = ?");
if ($del_category) {
  $del_category->bind_param("i", $article_id);
  $del_category->execute();
}

// Hapus artikel utama
$delete = $conn->prepare("DELETE FROM article WHERE id = ?");
if ($delete) {
  $delete->bind_param("i", $article_id);
  $delete->execute();
  echo "<script>alert('Artikel berhasil dihapus.'); window.location='index.php';</script>";
} else {
  echo "<script>alert('Gagal menghapus artikel.'); window.location='index.php';</script>";
}
?>
