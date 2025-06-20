<?php
session_start();
if (!isset($_SESSION['author_id']) || $_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit();
}
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/admin_index.css">
</head>
<body>

<div class="sidebar">
  <h4>SKYARTICLE</h4>
  <a href="#" onclick="showTable('penulis')"><i class="bi bi-person-lines-fill"></i> Penulis</a>
  <a href="#" onclick="showTable('kategori')"><i class="bi bi-tags-fill"></i> Kategori</a>
  <a href="#" onclick="showTable('artikel')"><i class="bi bi-journal-text"></i> Artikel</a>
  <a href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
</div>

<div class="content">
  <div class="admin-title">Admin Panel</div>

  <div id="penulis" class="table-container">
    <h3>Data Penulis</h3>
    <table class="table table-striped">
      <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Aksi</th></tr></thead>
      <tbody>
        <?php
        $result = $conn->query("SELECT id, nickname, email FROM author");
        while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['nickname'] ?></td>
          <td><?= $row['email'] ?></td>
          <td>
            <a href="edit_author.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="delete_author.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

 <div id="kategori" class="table-container">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Data Kategori</h3>
    <a href="kelola_kategori.php" class="btn btn-primary">
      <i class="bi bi-plus-circle"></i> Tambah Kategori
    </a>
  </div>
  <table class="table table-striped">

      <thead><tr><th>ID</th><th>Nama</th><th>Deskripsi</th><th>Aksi</th></tr></thead>
      <tbody>
        <?php
        $result = $conn->query("SELECT id, name, description FROM category");
        while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['description'] ?></td>
          <td>
            <a href="edit_kategori.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="delete_category.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <div id="artikel" class="table-container">
    <h3>Data Artikel</h3>
    <table class="table table-striped">
      <thead><tr><th>ID</th><th>Tanggal</th><th>Judul</th><th>Aksi</th></tr></thead>
      <tbody>
        <?php
        $result = $conn->query("SELECT id, date, title FROM article");
        while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['date'] ?></td>
          <td><?= $row['title'] ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="delete_article.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  function showTable(id) {
    document.querySelectorAll('.table-container').forEach(el => el.classList.remove('active'));
    document.getElementById(id).classList.add('active');
  }
</script>

</body>
</html>
