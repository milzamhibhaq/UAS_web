<?php
session_start();

if (!isset($_SESSION['author_id'])) {
  header("Location: login.php");
  exit();
}
include 'config.php';
$conn->set_charset("latin1");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $date = $_POST['date'];
  $content = $_POST['content'];
  $category = $_POST['category'];
  $author_id = $_SESSION['author_id'];

  // Upload gambar
  $image = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($image);

  if (move_uploaded_file($tmp_name, $target_file)) {
    // Simpan artikel ke tabel article
    $stmt = $conn->prepare("INSERT INTO article (title, date, content, picture) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $date, $content, $image);

    if ($stmt->execute()) {
      $article_id = $conn->insert_id;

      // Simpan relasi article_author
      $stmt2 = $conn->prepare("INSERT INTO article_author (article_id, author_id) VALUES (?, ?)");
      $stmt2->bind_param("ii", $article_id, $author_id);
      $stmt2->execute();

      // Simpan relasi article_category
      $stmt3 = $conn->prepare("INSERT INTO article_category (article_id, category_id) VALUES (?, ?)");
      $stmt3->bind_param("ii", $article_id, $category);
      $stmt3->execute();

      echo "<script>alert('Artikel berhasil diunggah!'); window.location='index.php';</script>";
    } else {
      echo "<p style='color:red;'>Gagal menyimpan artikel.</p>";
    }
  } else {
    echo "<p style='color:red;'>Gagal mengunggah gambar.</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Unggah Artikel</title>
  <link rel="stylesheet" href="css/upload.css">
</head>
<body>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <h2>Unggah Artikel Baru</h2>
    <input type="text" name="title" placeholder="Judul Artikel" required />
    <input type="date" name="date" required />
    <textarea name="content" rows="6" placeholder="Isi Artikel" required></textarea>

    <select name="category" required>
      <option value="">Pilih Kategori</option>
      <?php
      $kategori = $conn->query("SELECT * FROM category");
      while ($row = $kategori->fetch_assoc()) {
        echo "<option value='{$row['id']}'>{$row['name']}</option>";
      }
      ?>
    </select>

    <input type="file" name="image" accept="image/*" required />
    <a href="index.php" style="
      display: inline-block;
      margin-top: 1rem;
      padding: 0.6rem 1.5rem;
      background: #e2e8f0;
      color: #1e293b;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 600;
    ">Kembali</a>

    <button type="submit">Unggah Artikel</button>
  </form>
</body>
</html>
