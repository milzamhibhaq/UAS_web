<?php
session_start();
include 'config.php';

if (!isset($_GET['id'])) {
    echo "ID penulis tidak ditemukan.";
    exit();
}

$author_id = intval($_GET['id']);

// Ambil data penulis
$stmt = $conn->prepare("SELECT nickname, email, address, country, phone, instagram FROM author WHERE id = ?");
$stmt->bind_param("i", $author_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Penulis tidak ditemukan.";
    exit();
}
$author = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Profil Penulis</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/profil_penulis.css">
</head>
<body>

<div class="container">
    <h2><i class="fa-solid fa-user"></i> Profil Penulis</h2>

    <div class="info">
        <p><span class="label">Nama:</span> <?= htmlspecialchars($author['nickname']) ?></p>
        <p><span class="label">Email:</span> <?= htmlspecialchars($author['email']) ?></p>
        <p><span class="label">Alamat:</span> <?= htmlspecialchars($author['address'] ?? '-') ?></p>
        <p><span class="label">Negara:</span> <?= htmlspecialchars($author['country'] ?? '-') ?></p>
        <p><span class="label">No HP:</span> <?= htmlspecialchars($author['phone'] ?? '-') ?></p>
        <p><span class="label">Instagram:</span>
            <?php if (!empty($author['instagram'])): ?>
                <a href="https://instagram.com/<?= ltrim($author['instagram'], '@') ?>" target="_blank">
                    <?= htmlspecialchars($author['instagram']) ?>
                </a>
            <?php else: ?>
                -
            <?php endif; ?>
        </p>
    </div>

    <div class="articles">
        <h3>Artikel yang Ditulis:</h3>
        <?php
        $stmt2 = $conn->prepare("
            SELECT a.id, a.title, a.date 
            FROM article a
            JOIN article_author aa ON a.id = aa.article_id
            WHERE aa.author_id = ?
            ORDER BY a.date DESC
        ");
        $stmt2->bind_param("i", $author_id);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($result2->num_rows > 0):
            while ($article = $result2->fetch_assoc()):
        ?>
            <div class="article-item">
                <a class="article-title" href="detail.php?id=<?= $article['id'] ?>">
                    <?= htmlspecialchars($article['title']) ?>
                </a>
                <div class="article-date"><?= date("d M Y", strtotime($article['date'])) ?></div>
            </div>
        <?php
            endwhile;
        else:
            echo "<p>Belum ada artikel.</p>";
        endif;
        ?>
    </div>

    <a href="penulis.php" class="back-link">&larr; Kembali ke Daftar Penulis</a>
</div>

</body>
</html>
