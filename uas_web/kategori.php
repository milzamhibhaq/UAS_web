<?php
session_start();
include 'config.php';


$category_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Kategori Artikel</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/kategori.css" />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
   

  <div class="container">
    <h1 style="margin-top: 2rem;">Kategori Artikel</h1>
    <div style="margin: 1.5rem 0;">
  <a href="index.php" style="
    display: inline-block;
    padding: 0.6rem 1.4rem;
    background-color: #3b82f6;
    color: white;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    box-shadow: 0 3px 8px rgba(0,0,0,0.08);
    transition: background 0.3s ease;
  " onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">
    ← Kembali ke Beranda
  </a>
</div>
<!-- <div style="text-align: right; margin-bottom: 1rem;">
  <a href="kelola_kategori.php" style="
    padding: 0.5rem 1.2rem;
    background: #10b981;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  ">
    ✏️ Edit Kategori
  </a> -->
 <!-- Search Bar -->
<div class="search-bar-container" style="margin-bottom: 2rem; max-width: 100%;">
  <form method="GET" action="kategori.php" style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
    <input type="hidden" name="id" value="<?= $category_id ?>">
    <input 
      type="text" 
      name="search" 
      placeholder="Cari judul artikel..." 
      value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"
      style="flex: 1; min-width: 250px; padding: 0.6rem 1rem; border-radius: 8px; border: 1px solid #ccc; font-size: 1rem;"
    />
    <button type="submit" style="padding: 0.6rem 1.2rem; background: #2563eb; color: white; border: none; border-radius: 8px;">
      🔍 Cari
    </button>
  </form>
</div>


</div>

    <!-- Kotak kategori -->
    <div class="category-cards">
      <?php
      $result = $conn->query("SELECT * FROM category");
      while ($cat = $result->fetch_assoc()):
        $active = $cat['id'] == $category_id ? 'active' : '';
      ?>
        <a href="kategori.php?id=<?= $cat['id'] ?>" class="category-card <?= $active ?>">
          <i class="fa-solid fa-folder-open" style="font-size: 1.8rem; margin-bottom: 0.5rem;"></i><br />
          <?= htmlspecialchars($cat['name']) ?>
        </a>
      <?php endwhile; ?>
    </div>

<!-- Tampilkan artikel jika kategori dipilih -->
<?php if ($category_id > 0): ?>
  <?php
  $stmtCat = $conn->prepare("SELECT name, description FROM category WHERE id = ?");
  $stmtCat->bind_param("i", $category_id);
  $stmtCat->execute();
  $resCat = $stmtCat->get_result();
  $catData = $resCat->fetch_assoc();

if (!$catData) {
  echo "<p>Kategori tidak ditemukan.</p>";
} else {
  echo "<h2 style='margin-bottom: 0.5rem;'>Artikel dalam kategori: <em>" . htmlspecialchars($catData['name']) . "</em></h2>";
  echo "<p style='margin-bottom: 1.5rem; color: #475569;'>" . nl2br(htmlspecialchars($catData['description'])) . "</p>";
}




    // Ambil artikel
   $search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';

$stmt = $conn->prepare("
  SELECT a.id, a.title, a.date, a.picture, au.nickname 
  FROM article a
  JOIN article_category ac ON a.id = ac.article_id
  JOIN article_author aa ON a.id = aa.article_id
  JOIN author au ON aa.author_id = au.id
  WHERE ac.category_id = ? AND a.title LIKE ?
  ORDER BY a.date DESC
");
$stmt->bind_param("is", $category_id, $search);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
      echo "<p>Tidak ada artikel dalam kategori ini.</p>";
    } else {
      echo '<div class="articles">';
      while ($row = $result->fetch_assoc()):
        $article_id = $row['id'];
        $article_title = htmlspecialchars($row['title']);
        $article_date = date("d M Y", strtotime($row['date']));
        $article_image = !empty($row['picture']) ? 'uploads/' . $row['picture'] : 'uploads/default.jpg';
      ?>
        <div class="article-card" style="margin-bottom: 1rem; cursor: pointer;">
          <a href="detail.php?id=<?= $article_id ?>" style="text-decoration: none; color: inherit;">
            <img src="<?= $article_image ?>" alt="Gambar Artikel" style="width: 100%; border-radius: 12px;">
            <h3><?= $article_title ?></h3>
            <p class="article-date"><?= $article_date ?></p>
          </a>
        </div>
      <?php
      endwhile;
      echo '</div>';
    }
  
  ?>
<?php endif; ?>

  </div>
</body>
</html>
