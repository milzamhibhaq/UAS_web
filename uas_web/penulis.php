<?php
session_start();
include 'config.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Penulis</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/penulis.css">
</head>
<body>

 <h1 style="margin-top: 2rem;">
  <i class="fa-solid fa-user-pen"></i> Daftar Penulis
</h1>


  <div class="grid">
    <?php
    $query = $conn->query("SELECT id, nickname, email FROM author");
    while ($author = $query->fetch_assoc()):
    ?>
      <a href="profil_penulis.php?id=<?= $author['id'] ?>" class="card">
        <div class="avatar"><i class="fa-solid fa-user"></i></div>
        <div class="nickname"><?= htmlspecialchars($author['nickname']) ?></div>
        <div class="email"><?= htmlspecialchars($author['email']) ?></div>
      </a>
    <?php endwhile; ?>
  </div>

  <a href="index.php" class="back-link">&larr; Kembali ke Beranda</a>

</body>
</html>
