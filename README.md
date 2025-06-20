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
anyar/
├── index.php               # Halaman utama
├── login.php               # Form login admin
├── artikel.php             # Daftar artikel
├── detail.php              # Detail artikel
├── edit.php                # Edit artikel
├── delete_article.php      # Hapus artikel
├── kategori.php            # Manajemen kategori
├── kelola_kategori.php     # Form kelola kategori
├── config.php              # Konfigurasi koneksi database
├── admin_index.php         # Dashboard admin
└── ...


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

