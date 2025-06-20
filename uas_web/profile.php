<?php
session_start();
include 'config.php';

if (!isset($_SESSION['author_id'])) {
    header("Location: login.php");
    exit();
}

$author_id = $_SESSION['author_id'];
$pesan = "";

// Ambil data user
$stmt = $conn->prepare("SELECT nickname, email, password, address, phone, country, instagram FROM author WHERE id = ?");
$stmt->bind_param("i", $author_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "User tidak ditemukan.";
    exit();
}

$user = $result->fetch_assoc();

// Update profil
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_profile'])) {
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $instagram = $_POST['instagram'];

    $update = $conn->prepare("UPDATE author SET address = ?, phone = ?, country = ?, instagram = ? WHERE id = ?");
    $update->bind_param("ssssi", $address, $phone, $country, $instagram, $author_id);
    $update->execute();
    $pesan = "<p style='color:green;'>Profil berhasil diperbarui.</p>";

    // Refresh data
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

// Ganti password (kode sebelumnya tetap)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_password'])) {
    $old = $_POST['old_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if (!password_verify($old, $user['password'])) {
        $pesan = "<p style='color:red;'>Password lama salah.</p>";
    } elseif ($new !== $confirm) {
        $pesan = "<p style='color:red;'>Password baru tidak cocok.</p>";
    } elseif (strlen($new) < 6) {
        $pesan = "<p style='color:red;'>Password baru minimal 6 karakter.</p>";
    } else {
        $hash = password_hash($new, PASSWORD_DEFAULT);
        $update = $conn->prepare("UPDATE author SET password = ? WHERE id = ?");
        $update->bind_param("si", $hash, $author_id);
        $update->execute();
        $pesan = "<p style='color:green;'>Password berhasil diperbarui.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Profil Saya</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="profile-container">
        <h2><i class="fa-solid fa-user"></i> Profil Saya</h2>

        <div class="message"><?= $pesan ?></div>

        <!-- Informasi Dasar -->
        <p><span class="label">Nickname:</span> <?= htmlspecialchars($user['nickname']) ?></p>
        <p><span class="label">Email:</span> <?= htmlspecialchars($user['email']) ?></p>

        <!-- Form Edit Profil -->
        <h3 class="section-title">Edit Informasi Tambahan</h3>
        <form method="POST">
            <input type="text" name="address" placeholder="Alamat" value="<?= htmlspecialchars($user['address'] ?? '') ?>" />
            <input type="text" name="phone" placeholder="Nomor HP" value="<?= htmlspecialchars($user['phone'] ?? '') ?>" />
            <input type="text" name="country" placeholder="Negara" value="<?= htmlspecialchars($user['country'] ?? '') ?>" />
            <input type="text" name="instagram" placeholder="Instagram (@username)" value="<?= htmlspecialchars($user['instagram'] ?? '') ?>" />
            <button type="submit" name="update_profile">Simpan Perubahan</button>
        </form>

        <!-- Ganti Password -->
        <h3 class="section-title">Ganti Password</h3>
        <form method="POST">
            <input type="password" name="old_password" placeholder="Password Lama" required />
            <input type="password" name="new_password" placeholder="Password Baru" required />
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password Baru" required />
            <button type="submit" name="change_password">Ganti Password</button>
        </form>

        <a href="index.php" class="back-link">&larr; Kembali ke Beranda</a>
    </div>
</body>
</html>
