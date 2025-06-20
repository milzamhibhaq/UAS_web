<?php
session_start();
include 'config.php';

if (!isset($_SESSION['author_id'])) {
  header("Location: login.php");
  exit;
}

if (!isset($_GET['id'])) {
  echo "ID artikel tidak ditemukan.";
  exit;
}

$id = intval($_GET['id']);
$author_id = $_SESSION['author_id'];

// Verifikasi kepemilikan artikel
$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

// Jika admin, ambil artikel langsung
if ($is_admin) {
  $stmt = $conn->prepare("SELECT * FROM article WHERE id = ?");
  $stmt->bind_param("i", $id);
} else {
  // Jika bukan admin, pastikan user adalah pembuat artikel
  $stmt = $conn->prepare("SELECT article.* FROM article 
                          JOIN article_author ON article.id = article_author.article_id 
                          WHERE article.id = ? AND article_author.author_id = ?");
  $stmt->bind_param("ii", $id, $author_id);
}
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
  echo "Akses ditolak.";
  exit;
}

$article = $result->fetch_assoc();

// Ambil semua kategori
$categories = $conn->query("SELECT * FROM category");

// Ambil kategori artikel saat ini
$article_cat = $conn->prepare("SELECT category_id FROM article_category WHERE article_id = ?");
$article_cat->bind_param("i", $id);
$article_cat->execute();
$cat_result = $article_cat->get_result();
$selected_categories = [];
while ($row = $cat_result->fetch_assoc()) {
  $selected_categories[] = $row['category_id'];
}

// Proses form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $new_categories = isset($_POST['categories']) ? $_POST['categories'] : [];

  // Upload gambar jika ada
  $new_image = $_FILES['picture']['name'];
  if (!empty($new_image)) {
    $tmp = $_FILES['picture']['tmp_name'];
    $target = 'uploads/' . basename($new_image);
    move_uploaded_file($tmp, $target);

    // Update artikel + gambar
    $update = $conn->prepare("UPDATE article SET title = ?, content = ?, picture = ? WHERE id = ?");
    $update->bind_param("sssi", $title, $content, $new_image, $id);
  } else {
    // Update artikel tanpa gambar
    $update = $conn->prepare("UPDATE article SET title = ?, content = ? WHERE id = ?");
    $update->bind_param("ssi", $title, $content, $id);
  }
  $update->execute();

  // Hapus kategori lama & tambahkan yang baru
$del = $conn->prepare("DELETE FROM article_category WHERE article_id = ?");
if ($del) {
  $del->bind_param("i", $id);
  $del->execute();
} else {
  echo "Gagal menghapus kategori lama: " . $conn->error;
  exit;
}


  foreach ($new_categories as $cat_id) {
    $stmt = $conn->prepare("INSERT INTO article_category (article_id, category_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $id, $cat_id);
    $stmt->execute();
  }
  

  header("Location: detail.php?id=$id");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Artikel</title>
 <link rel="stylesheet" href="css/edit.css">
</head>
<body>

<h2 style="text-align:center;">Edit Artikel</h2>

<form method="POST" enctype="multipart/form-data">
  <label>Judul</label>
  <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>

  <label>Konten</label>
  <textarea name="content" rows="10" required><?= htmlspecialchars($article['content']) ?></textarea>

  <label>Gambar Saat Ini</label>
  <img src="uploads/<?= htmlspecialchars($article['picture'] ?? 'default.jpg') ?>" width="200" style="display:block; margin-bottom:1rem;">

  <label>Ubah Gambar (Opsional)</label>
  <input type="file" name="picture" accept="image/*">

  <label>Kategori</label>
  <div class="checkbox-group">
    <?php while ($cat = $categories->fetch_assoc()): ?>
      <label>
        <input type="checkbox" name="categories[]" value="<?= $cat['id'] ?>" 
          <?= in_array($cat['id'], $selected_categories) ? 'checked' : '' ?>>
        <?= htmlspecialchars($cat['name']) ?>
      </label>
    <?php endwhile; ?>
  </div>

  <button type="submit">Simpan Perubahan</button>
</form>

</body>
</html>
