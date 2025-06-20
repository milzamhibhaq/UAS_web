<?php
include 'config.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nickname = $_POST['nickname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Cek apakah email sudah terdaftar
  $check = $conn->prepare("SELECT id FROM author WHERE email = ?");
  $check->bind_param("s", $email);
  $check->execute();
  $check->store_result();

  if ($check->num_rows > 0) {
    $error = "Email sudah digunakan.";
  } else {
    // Simpan user baru
    $stmt = $conn->prepare("INSERT INTO author (nickname, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nickname, $email, $hashed_password);

    if ($stmt->execute()) {
      $success = "Registrasi berhasil! Silakan login.";
    } else {
      $error = "Gagal menyimpan data.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Registrasi Author</title>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #f1f5f9;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    form {
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      width: 100%;
      max-width: 400px;
    }
    input {
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      font-size: 1rem;
    }
    button {
      width: 100%;
      padding: 0.75rem;
      background: #10b981;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
    }
    .error { color: red; margin-bottom: 1rem; }
    .success { color: green; margin-bottom: 1rem; }
  </style>
</head>
<body>
  <form method="POST" action="register.php">
    <h2 style="margin-bottom:1rem;">Registrasi Penulis</h2>

    <?php if ($error): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="success"><?= $success ?></div>
    <?php endif; ?>

    <input type="text" name="nickname" placeholder="Nama Panggilan" required />
    <input type="email" name="email" placeholder="Email" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Daftar</button>
<p style="text-align:center; margin-top:1rem;">
  Sudah punya akun? <a href="login.php">Login di sini</a>
</p>

  </form>
</body>
</html>
