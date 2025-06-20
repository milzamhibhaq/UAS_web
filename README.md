# UAS_web

# Sistem Manajemen Artikel 

Sistem manajemen konten berbasis web sederhana menggunakan PHP dan MySQL, dirancang untuk mengelola artikel, kategori, dan penulis.

## Fitur Utama

- Login multi-role: Admin & Penulis
- CRUD Artikel (buat, baca, edit, hapus)
- Sistem Kategori Artikel
- Manajemen Penulis
- Komentar artikel
- Upload gambar artikel
- Sistem relasi antar artikel, kategori, dan penulis
- Dashboard Admin
  
## Struktur Direktori

bash
uas_web/
├── admin_index.php
├── artikel.php
├── config.php
├── delete_article.php
├── delete_author.php
├── delete_category.php
├── detail.php
├── edit.php
├── edit_author.php
├── edit_kategori.php
├── hapus.php
├── index.php
├── kategori.php
├── kelola_kategori.php
├── login.php
├── logout.php
├── navbar.php
├── penulis.php
├── profile.php
├── profil_penulis.php
├── register.php
├── upload.php
├── css/
│   ├── admin_index.css
│   ├── artikel.css
│   ├── detail.css
│   ├── edit.css
│   ├── edit_author.css
│   ├── index.css
│   ├── kategori.css
│   ├── kelola_kategori.css
│   ├── login.css
│   ├── penulis.css
│   ├── profile.css
│   ├── profil_penulis.css
│   ├── style.css
│   └── upload.css
├── uploads/


##  Struktur Database

Database menggunakan nama 'dbcms' dengan tabel utama:
- 'article'
- 'author'
- 'category'
- 'comment'
- 'article_author' (relasi N-N artikel dan penulis)
- 'article_category' (relasi N-N artikel dan kategori)

## File SQL tersedia di repo: 'dbcms.sql'


##  Cara Instalasi

1. **Clone repositori ini:**
   git clone [https://github.com/username/anyar.git](https://github.com/milzamhibhaq/UAS_web)

   Letakkan folder uas_web/ di htdocs/ (XAMPP/Laragon).

2.Impor database:
-Buka phpMyAdmin
-Buat database baru: dbcms
-Impor file dbcms.sql
-Edit koneksi di config.php:
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'dbcms';

| Role    | Email                                                   | Password |
| ------- | ------------------------------------------------------- | -------- |
| Admin   | [admin@gmail.com](mailto:admin@gmail.com)               | 123    |
| Penulis | [milzamhibhaq@gmail.com](mailto:milzamhibhaq@gmail.com) | 123   |

Isi Database
Artikel contoh dari berbagai kategori: pendidikan, alam, budaya, politik.
Kategori, penulis, dan komentar sudah tersedia.
File SQL: dbcms.sql

Lisensi
Aplikasi ini bebas digunakan untuk tujuan pembelajaran dan pengembangan.

