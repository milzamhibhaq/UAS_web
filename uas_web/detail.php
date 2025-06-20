<?php
session_start();
require 'config.php';

include 'navbar.php'; 


// Validasi ID artikel
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    echo "ID artikel tidak valid.";
    exit;
}

// Cek apakah user login dan merupakan penulis artikel
$isAuthor = false;

if (isset($_SESSION['author_id'])) {
  // Cek apakah user adalah salah satu author dari artikel ini
  $cekAuthor = $conn->prepare("SELECT 1 FROM article_author WHERE article_id = ? AND author_id = ?");
  $cekAuthor->bind_param("ii", $id, $_SESSION['author_id']);
  $cekAuthor->execute();
  $cekAuthor->store_result();
  if ($cekAuthor->num_rows > 0) {
    $isAuthor = true;
  }
  $cekAuthor->close();
}

// Ambil data artikel
$stmt = $conn->prepare("
  SELECT a.id, a.title, a.date, a.content, a.picture, au.nickname
  FROM article a
  JOIN article_author aa ON a.id = aa.article_id
  JOIN author au ON aa.author_id = au.id
  WHERE a.id = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

// Ambil kategori artikel
$stmt_cat = $conn->prepare("
  SELECT c.name 
  FROM category c
  JOIN article_category ac ON c.id = ac.category_id
  WHERE ac.article_id = ?
");
$stmt_cat->bind_param("i", $id);
$stmt_cat->execute();
$res_cat = $stmt_cat->get_result();

$kategori_list = [];
while ($row = $res_cat->fetch_assoc()) {
  $kategori_list[] = $row['name'];
}
$stmt_cat->close();

if (!$article) {
    echo "Artikel tidak ditemukan.";
    exit;
}

// Apakah user adalah penulis artikel?
// $isAuthor = isset($_SESSION['author_id']) && $_SESSION['author_id'] == $article['author_id'];

// Proses kirim komentar
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['komentar']) && isset($_SESSION['author_id'])) {
    $komen = trim($_POST['komentar']);
    if (!empty($komen)) {
        $stmt = $conn->prepare("INSERT INTO comment (article_id, author_id, content) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $id, $_SESSION['author_id'], $komen);
        $stmt->execute();
        header("Location: detail.php?id=$id");
        exit;
    }
}

// Ambil komentar
$stmt_komen = $conn->prepare("SELECT c.content, c.created_at, a.nickname 
                              FROM comment c 
                              JOIN author a ON c.author_id = a.id 
                              WHERE c.article_id = ? 
                              ORDER BY c.created_at DESC");
$stmt_komen->bind_param("i", $id);
$stmt_komen->execute();
$komen_result = $stmt_komen->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($article['title']) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>

<div class="container">
    <!-- Konten Artikel -->
    <div class="article">
        <div class="article-title"><?= htmlspecialchars($article['title']) ?></div>
       <div class="article-meta">
  Oleh <strong><?= htmlspecialchars($article['nickname']) ?></strong> |
  <?= date("d M Y", strtotime($article['date'])) ?>
</div>

<?php if (!empty($kategori_list)): ?>
  <div style="margin: 0.3rem 0 1rem 0; color: #64748b; font-size: 0.95rem;">
    Kategori:
    <?php foreach ($kategori_list as $i => $kategori): ?>
      <span style="font-weight: 500;"><?= htmlspecialchars($kategori) ?></span><?= $i < count($kategori_list) - 1 ? ', ' : '' ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

        <img src="uploads/<?= htmlspecialchars($article['picture'] ?? 'default.jpg') ?>" alt="Gambar Artikel" style="max-width: 100%; border-radius: 12px; margin-bottom: 1rem;">
        <div class="article-content"><?= nl2br(htmlspecialchars($article['content'])) ?></div>

        <div class="btn-group">
            <?php if ($isAuthor): ?>
                <a href="edit.php?id=<?= $article['id'] ?>" class="btn">✏️ Edit</a>
                <a href="hapus.php?id=<?= $article['id'] ?>" class="btn delete" onclick="return confirm('Yakin ingin menghapus artikel ini?')">🗑️ Hapus</a>
            <?php endif; ?>
            <a href="index.php" class="btn">← Kembali</a>
        </div>
    </div>

    <!-- Komentar -->
    <div class="komentar">
        <h3 style="margin-bottom: 1rem;">Komentar</h3>

        <?php if (isset($_SESSION['author_id'])): ?>
            <form method="POST" style="margin-bottom: 1.5rem;">
                <textarea name="komentar" placeholder="Tulis komentar..." rows="3" required></textarea>
                <button type="submit">Kirim</button>
            </form>
        <?php else: ?>
            <p><a href="login.php">Login</a> untuk menulis komentar.</p>
        <?php endif; ?>

        <?php if ($komen_result->num_rows > 0): ?>
            <?php while ($komen = $komen_result->fetch_assoc()): ?>
                <div style="margin-bottom: 1rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 0.8rem;">
                    <strong><?= htmlspecialchars($komen['nickname']) ?></strong>
                    <div style="font-size: 0.85rem; color: #64748b;">
                        <?= date("d M Y H:i", strtotime($komen['created_at'])) ?>
                    </div>
                    <div style="margin-top: 0.5rem;">
                        <?= nl2br(htmlspecialchars($komen['content'])) ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Belum ada komentar.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
