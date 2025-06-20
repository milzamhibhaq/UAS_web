<?php
session_start();
include 'config.php';
include 'navbar.php';

// Ambil semua artikel dan penulis
$articles_result = $conn->query("
  SELECT a.id, a.title, a.date, a.picture, a.content, au.nickname
  FROM article a
  JOIN article_author aa ON a.id = aa.article_id
  JOIN author au ON aa.author_id = au.id
  ORDER BY a.date DESC
");

// Simpan ke array
$articles = [];
while ($row = $articles_result->fetch_assoc()) {
  $articles[] = $row;
}

// Ambil semua kategori untuk semua artikel (1 query)
$kategori_result = $conn->query("
  SELECT ac.article_id, c.name 
  FROM article_category ac
  JOIN category c ON ac.category_id = c.id
");

// Mapping kategori per article_id
$kategori_per_artikel = [];
while ($row = $kategori_result->fetch_assoc()) {
  $kategori_per_artikel[$row['article_id']][] = $row['name'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Semua Artikel</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/artikel.css" />
</head>
<body>

<div class="container">
  <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
    <h1 class="section-title">Semua Artikel</h1>
    <input 
      type="text" name="search" placeholder="Cari artikel..." 
      style="padding: 0.75rem 1rem; font-size: 1rem; border-radius: 8px; border: 1px solid #ccc; max-width: 300px; width: 100%;"
    >
  </div>

  <div class="hero-container">
  <?php if (!empty($articles)): ?>
    <?php
      // Ambil artikel pertama untuk hero
      $hero = array_shift($articles);
      $hero_id = $hero['id'];
      $hero_title = htmlspecialchars($hero['title']);
      $hero_date = date("d M Y", strtotime($hero['date']));
      $hero_author = htmlspecialchars($hero['nickname']);
      $hero_img = !empty($hero['picture']) ? "uploads/" . $hero['picture'] : "uploads/default.jpg";
      $hero_categories = $kategori_per_artikel[$hero_id] ?? [];

      $kategori_html = '';
      foreach ($hero_categories as $cat) {
        $kategori_html .= "<span style='background:#e2e8f0; padding:3px 8px; border-radius:6px; font-size:0.8rem; margin-right:4px; display:inline-block; margin-top:4px;'>"
                        . htmlspecialchars($cat) . "</span>";
      }
    ?>
    <!-- Hero -->
    <div class="hero">
      <a href="detail.php?id=<?= $hero_id ?>">
        <img src="<?= $hero_img ?>" alt="Hero Image">
        <div class="hero-content">
          <div class="hero-date"><?= $hero_date ?> &bull; <span style="font-style: italic;"><?= $hero_author ?></span></div>
          <div class="hero-title"><?= $hero_title ?></div>
          <div class="hero-desc"><?= $hero['content'] ? substr(strip_tags($hero['content']), 0, 150) . '...' : '' ?></div>
          <div style="margin-top: 0.6rem;"><?= $kategori_html ?></div>
        </div>
      </a>
    </div>
  <?php endif; ?>
  </div>

  <!-- Grid Artikel -->
  <div class="grid">
    <?php foreach ($articles as $article): ?>
      <?php
        $id = $article['id'];
        $title = htmlspecialchars($article['title']);
        $date = date("d M Y", strtotime($article['date']));
        $author = htmlspecialchars($article['nickname']);
        $img = !empty($article['picture']) ? "uploads/" . $article['picture'] : "uploads/default.jpg";
        $categories = $kategori_per_artikel[$id] ?? [];

        $kategori_html = '';
        foreach ($categories as $cat) {
          $kategori_html .= "<span style='background:#e2e8f0; padding:3px 8px; border-radius:6px; font-size:0.8rem; margin-right:4px; display:inline-block; margin-top:4px;'>"
                          . htmlspecialchars($cat) . "</span>";
        }
      ?>
      <a href="detail.php?id=<?= $id ?>" class="card">
        <img src="<?= $img ?>" alt="Thumbnail">
        <div class="card-content">
          <div class="card-title"><?= $title ?></div>
          <div class="card-date"><?= $date ?> &bull; <span style="font-style: italic;"><?= $author ?></span></div>
          <div class="card-kategori" style="margin-top: 0.5rem;"><?= $kategori_html ?></div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('input[name="search"]');
    const cards = document.querySelectorAll('.card');
    const heroSection = document.querySelector('.hero-container');

    if (searchInput) {
      searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase();
        let found = false;

        cards.forEach(card => {
          const titleEl = card.querySelector('.card-title');
          const title = titleEl ? titleEl.textContent.toLowerCase() : '';
          const visible = title.includes(keyword);
          card.style.display = visible ? 'block' : 'none';
          if (visible) found = true;
        });

        if (keyword.trim() !== '') {
          heroSection.style.display = 'none';
        } else {
          heroSection.style.display = 'block';
        }
      });
    }
  });
</script>

<!-- Footer -->
<footer style="background: #f1f5f9; text-align: center; padding: 1rem; margin-top: 3rem; border-top: 1px solid #cbd5e1;">
  &copy; <?= date('Y') ?> SkyArticles. All rights reserved.
</footer>

</body>
</html>
