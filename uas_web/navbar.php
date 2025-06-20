<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Navbar SkyArticles</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    header {
      background: white;
      padding: 1.5rem 3rem;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      position: sticky;
      top: 0;
      z-index: 1000;
      width: 100vw;
      box-sizing: border-box;
      border-bottom: 1px solid #e2e8f0;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.5rem;
      font-weight: 700;
      color: #0ea5e9;
      text-decoration: none;
    }

    nav {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    nav a {
      color: #334155;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s;
    }

    nav a:hover {
      color: #2563eb;
    }

    .upload-btn {
      color: white;
      background-color: #10b981;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      font-weight: 600;
      transition: background-color 0.3s;
    }

    .upload-btn:hover {
      background-color: #059669;
    }

    .logout-link:hover {
      color: #ef4444;
    }


  </style>
</head>
<body>

<header>
  <a href="index.php" class="logo">SkyArticles</a>

  <nav>
    <a href="index.php">Dashboard</a>
    <a href="artikel.php">Artikel</a>
    <a href="kategori.php">Kategori</a>
    <a href="penulis.php">Penulis</a>

    <!-- Tombol upload SELALU tampil -->
    <a href="<?= isset($_SESSION['author_id']) ? 'upload.php' : 'login.php' ?>" style="font-weight: 600; color: #10b981;"">
      Upload Artikel
    </a>

    <?php if (isset($_SESSION['author_id'])): ?>
      <a href="profile.php"><i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['nickname']) ?></a>
      <a href="logout.php" class="logout-link">Logout</a>
    <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
  </nav>
</header>


</body>
</html>
