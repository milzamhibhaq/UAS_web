<?php
include 'config.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nickname = $_POST['nickname'];
  $email = $_POST['email'];
  $query = "UPDATE author SET nickname='$nickname', email='$email' WHERE id=$id";
  $conn->query($query);
  header("Location: admin_index.php"); // arahkan kembali ke dashboard admin
  exit();
}
$result = $conn->query("SELECT * FROM author WHERE id=$id");
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Penulis</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/edit_author.css">
</head>
<body>

<div class="container">
  <h2>Edit Data Penulis</h2>
  <form method="post">
    <label for="nickname">Nama:</label>
    <input type="text" name="nickname" id="nickname" value="<?= htmlspecialchars($data['nickname']) ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($data['email']) ?>" required>

    <button type="submit">Simpan Perubahan</button>
  </form>
  <a href="admin_index.php" class="back-link">← Kembali ke Dashboard</a>
</div>

</body>
</html>
