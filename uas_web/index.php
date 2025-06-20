<?php
session_start();
include 'config.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$kategori_id = isset($_GET['kategori_id']) ? intval($_GET['kategori_id']) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SkyArticles</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  
 <!-- ...sebelum penutup body -->


  
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('input[name="search"]');
    const cards = document.querySelectorAll('.card');

    if (searchInput) {
      searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase();

        cards.forEach(card => {
          const title = card.querySelector('.card-title').textContent.toLowerCase();
          const visible = title.includes(keyword);
          card.style.display = visible ? 'block' : 'none';
        });
      });
    }
  });
</script>

</body>
<link rel="stylesheet" href="css/index.css">


</head>
<body>

 <header>
 <h1 style="color: #0ea5e9;">SkyArticles</h1>

  <nav>
    <a href="index.php">Dashboard</a>
    <a href="artikel.php">Artikel</a>
    <a href="kategori.php">Kategori</a>
    <a href="penulis.php">Penulis</a>
    <a href="<?= isset($_SESSION['author_id']) ? 'upload.php' : 'login.php' ?>" style="font-weight: 600; color: #10b981;">
      Upload Artikel
    </a>
    <?php if (isset($_SESSION['author_id'])): ?>
      <a href="profile.php">
        <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['nickname']) ?>
      </a>
      <a href="logout.php" class="logout-link">Logout</a>
    <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
  </nav>
</header>



<section class="hero"
 style="padding: 4rem 3rem; background: url('bg-header.jpg') no-repeat center center/cover; color: black;">
  <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem;">Temukan Artikel Menarik Setiap Hari</h2>
  <p style="font-size: 1.1rem; max-width: 600px;">SkyArticles menyajikan inspirasi, wawasan, dan informasi terbaik untuk kamu. Jelajahi berbagai topik menarik!</p>
</section>


<div class="main">
  <div>
    <h3 style="margin-bottom: 1rem;">Artikel</h3>
    <?php
if ($search) {
  $stmt = $conn->prepare("
    SELECT a.id, a.title, a.date, a.picture, au.nickname
    FROM article a
    JOIN article_author aa ON a.id = aa.article_id
    JOIN author au ON aa.author_id = au.id
    WHERE a.title LIKE ?
    ORDER BY a.date DESC
  ");
  $keyword = "%$search%";
  $stmt->bind_param("s", $keyword);
} elseif ($kategori_id) {
  $stmt = $conn->prepare("
    SELECT a.id, a.title, a.date, a.picture, au.nickname
    FROM article a
    JOIN article_category ac ON a.id = ac.article_id
    JOIN article_author aa ON a.id = aa.article_id
    JOIN author au ON aa.author_id = au.id
    WHERE ac.category_id = ?
    ORDER BY a.date DESC
  ");
  $stmt->bind_param("i", $kategori_id);
} else {
  $stmt = $conn->prepare("
    SELECT a.id, a.title, a.date, a.picture, au.nickname
    FROM article a
    JOIN article_author aa ON a.id = aa.article_id
    JOIN author au ON aa.author_id = au.id
    ORDER BY a.date DESC
    LIMIT 7
  ");
}
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
$cat_stmt = $conn->prepare("
  SELECT c.name 
  FROM category c 
  JOIN article_category ac ON c.id = ac.category_id 
  WHERE ac.article_id = ?
");
$cat_stmt->bind_param("i", $id);
$cat_stmt->execute();
$cat_result = $cat_stmt->get_result();

$kategori_html = '';
while ($cat = $cat_result->fetch_assoc()) {
  $kategori_html .= "<span style='background:#e2e8f0; padding:3px 8px; border-radius:6px; font-size:0.8rem; margin-right:4px; display:inline-block; margin-top:4px;'>"
                  . htmlspecialchars($cat['name']) . "</span>";
}
$cat_stmt->close();

    $title = htmlspecialchars($row['title']);
    $date = date("d M Y", strtotime($row['date']));
    $image = !empty($row['picture']) ? 'uploads/' . $row['picture'] : 'uploads/default.jpg';
    $id = $row['id'];
    $author = htmlspecialchars($row['nickname']);

    
  echo "
  <div class='card'>
    <a href='detail.php?id=$id' style='color:inherit; text-decoration:none;'>
      <img src='$image' alt='Gambar Artikel'/>
      <div class='card-content'>
        <div class='card-title'>$title</div>
        <div class='card-date' style='font-size: 0.9rem; color: #475569; margin-top: 0.4rem;'>
          $date &bull; <span style='font-style: italic;'>$author</span>
        </div>
        <div class='card-kategori' style='margin-top: 0.5rem;'>$kategori_html</div>
      </div>
    </a>
  </div>
";

  }
} else {
  echo "<p>Tidak ada artikel ditemukan.</p>";
}
?>

  </div>

  <aside>
    <div class="sidebar-box">
      <h4>Pencarian</h4>
   <form id="searchForm" method="GET" action="index.php" onsubmit="return false;">
  <input type="text" id="searchInput" name="search" placeholder="Cari artikel..." value="<?= htmlspecialchars($search) ?>" 
    style="width:100%; padding: 0.75rem; border:1px solid #ccc; border-radius: 8px; margin-bottom: 0.5rem;">
</form>


    </div>

    <div class="sidebar-box">
      <h4>Kategori 
      <ul id="kategoriList" style="list-style: none; padding-left: 0; margin-top: 0.5rem;">

        <?php
        $kategori = $conn->query("SELECT * FROM category");
        while ($kat = $kategori->fetch_assoc()) {
          $selectedClass = ($kategori_id == $kat['id']) ? 'class="selected"' : '';
echo "<li><a href='?kategori_id={$kat['id']}' $selectedClass>{$kat['name']}</a></li>";

        }
        ?>
      </ul>
    </div>

    <div class="sidebar-box">
      <h4>Tentang</h4>
      <p>
        <?php
        if ($kategori_id) {
          $stmt = $conn->prepare("SELECT description FROM category WHERE id = ?");
          $stmt->bind_param("i", $kategori_id);
          $stmt->execute();
          $stmt->bind_result($desc);
          $stmt->fetch();
          echo htmlspecialchars($desc ?: 'Tidak ada deskripsi.');
          $stmt->close();
        } else {
          echo "SkyArticles adalah platform berbagi artikel seputar berbagai topik menarik dan edukatif.";
        }
        ?>
      </p>
    </div>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
  <div class="sidebar-box">
    <h4>Admin Panel</h4>
    <a href="admin_index.php" style="display: inline-block; padding: 0.75rem 1rem; background: #0ea5e9; color: white; border-radius: 8px; text-align: center; font-weight: 600; text-decoration: none;">Kelola Website</a>
  </div>
<?php endif; ?>

  </aside>
</div>

<footer>
  &copy; <?= date('Y') ?> SkyArticles. All rights reserved.
</footer>

</body>
</html>