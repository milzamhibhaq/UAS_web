<?php
session_start();
include 'config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, nickname, password, role FROM author WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
      $_SESSION['author_id'] = $user['id'];
      $_SESSION['nickname'] = $user['nickname'];
      $_SESSION['role'] = $user['role'];

      if ($user['role'] === 'admin') {
        header("Location: admin_index.php");
      } else {
        header("Location: index.php");
      }
      exit();
    } else {
      $error = "Password salah.";
    }
  } else {
    $error = "Email tidak terdaftar.";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/login.css">
  <style>
    .btn-kembali {
      width: 100%;
      padding: 0.75rem;
      background: #e2e8f0;
      color: #1e293b;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      margin-top: 0.75rem;
      cursor: pointer;
    }
    .btn-kembali:hover {
      background: #cbd5e1;
    }

    .register-link {
      text-align: center;
      margin-top: 1rem;
      font-size: 0.95rem;
    }

    .register-link a {
      color: #3b82f6;
      font-weight: 600;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <form method="POST" action="login.php">
    <h2 style="margin-bottom:1rem;">Login Author</h2>
    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <input type="email" name="email" placeholder="Email" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Login</button>

    <!-- Tombol kembali dibuat button agar sama seperti login -->
    <button type="button" class="btn-kembali" onclick="location.href='index.php'">← Kembali</button>

    <div class="register-link">
      Belum punya akun? <a href="register.php">Yuk daftar</a>
    </div>
  </form>
</body>
</html>
