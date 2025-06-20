<?php
session_start();
include 'config.php';

// Tambah kategori
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
  $name = trim($_POST['name']);
  $desc = trim($_POST['description']);

  if ($name !== '') {
    $stmt = $conn->prepare("INSERT INTO category (name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $desc);
    $stmt->execute();
    header("Location: kelola_kategori.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Kategori</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #f8fafc;
      padding: 2rem;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    }
    h2 {
      margin-bottom: 1.5rem;
      color: #1e293b;
      text-align: center;
    }
    input, textarea {
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      font-size: 1rem;
    }
    button {
      background: #2563eb;
      color: white;
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
    }
    button:hover {
      background: #1e40af;
    }
    .back {
      display: inline-block;
      margin-top: 1.5rem;
      text-decoration: none;
      color: #2563eb;
      font-weight: 600;
    }
    .back:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Tambah Kategori</h2>

  <form method="POST">
    <input type="text" name="name" placeholder="Nama kategori" required>
    <textarea name="description" rows="3" placeholder="Deskripsi kategori (opsional)"></textarea>
    <button type="submit" name="add">Tambah Kategori</button>
  </form>

  <a href="admin_index.php" class="back">← Kembali</a>
</div>

</body>
</html>
