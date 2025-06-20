<?php
session_start();
if (!isset($_SESSION['author_id']) || $_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit();
}
include 'config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
  die("ID tidak valid.");
}

// Ambil data kategori
$stmt = $conn->prepare("SELECT name, description FROM category WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
  die("Kategori tidak ditemukan.");
}
$data = $result->fetch_assoc();

// Proses form jika disubmit
$success = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']);
  $desc = trim($_POST['description']);

  if ($name !== '') {
    $update = $conn->prepare("UPDATE category SET name = ?, description = ? WHERE id = ?");
    $update->bind_param("ssi", $name, $desc, $id);
    if ($update->execute()) {
      $success = "Data kategori berhasil diperbarui.";
      // Perbarui nilai input
      $data['name'] = $name;
      $data['description'] = $desc;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Kategori</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/edit_author.css"> <!-- Gaya yang sama dengan edit_author -->
</head>
<body>

<div class="container mt-5">
  <div class="card shadow-sm p-4">
    <h3 class="mb-4">Edit Kategori</h3>

    <?php if ($success): ?>
      <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($data['name']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" name="description" rows="4"><?= htmlspecialchars($data['description']) ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <a href="admin_index.php" class="btn btn-secondary">← Kembali</a>
    </form>
  </div>
</div>

</body>
</html>
