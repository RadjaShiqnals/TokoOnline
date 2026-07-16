# TokoOnline - Aplikasi Web E-Commerce berbasis PHP Native

Aplikasi web e-commerce sederhana, ringan, dan responsif yang dibangun menggunakan PHP Native dan MariaDB/MySQL, serta dipercantik menggunakan MDB (Material Design for Bootstrap) dan Font Awesome. Proyek ini dirancang sebagai implementasi praktis dan edukasi untuk pemrograman web dasar, integrasi database, serta autentikasi berbasis session.

---

## Fitur Utama

- Autentikasi Pengguna: Sistem Login, Register, dan Logout berbasis PHP Session.
- Katalog Belanja: Menampilkan barang secara dinamis dari database MariaDB dengan tampilan card yang rapi dan seragam.
- Keranjang Belanja (Shopping Cart): Menambahkan produk ke keranjang belanja sebelum melakukan checkout.
- Riwayat Transaksi (Histori Pembelian): Pencatatan riwayat transaksi pembelian barang beserta status pembayaran.
- Profil Pengguna: Halaman informasi akun pengguna yang sedang aktif.
- Custom 404 Router: Penanganan error rute halaman tidak ditemukan dengan tampilan kustom yang elegan.

---

## Tech Stack

- Backend: PHP 8.x (Native)
- Database: MariaDB / MySQL
- Frontend: MDB Bootstrap 5, Font Awesome 6, Vanilla CSS & JS

---

## Prasyarat Instalasi

Pastikan komputer lokal Anda sudah terinstal:
1. PHP (Minimal versi 8.0) dengan ekstensi mysqli diaktifkan.
2. MySQL / MariaDB Server berjalan.

---

## Cara Instalasi & Konfigurasi

### 1. Kloning Repositori
Masuk ke direktori kerja Anda dan kloning proyek ini:
```bash
git clone <url-repository> TokoOnline
cd TokoOnline
```

### 2. Konfigurasi Database
1. Buka MySQL terminal atau aplikasi database manager (seperti phpMyAdmin, DBeaver, dll.).
2. Buat database baru bernama tokoonlines:
   ```sql
   CREATE DATABASE tokoonlines;
   ```
3. Import file database tokoonlines.sql ke database yang baru dibuat:
   ```bash
   mysql -u root -p tokoonlines < tokoonlines.sql
   ```
   *(Ganti root dengan nama pengguna database Anda).*

### 3. Konfigurasi Koneksi PHP
Buka file koneksi.php dan sesuaikan kredensial koneksi database Anda:
```php
<?php
// koneksi.php
$conn = mysqli_connect('localhost', 'username_kamu', 'password_kamu', 'tokoonlines');
```

---

## Cara Menjalankan Aplikasi di Lokal

Gunakan built-in PHP development server dengan menyertakan router kustom (router.php) agar rute halaman redirect root dan halaman 404 berfungsi dengan baik.

Jalankan perintah berikut di terminal pada direktori proyek:
```bash
php -d extension=mysqli -S localhost:8000 router.php
```

Setelah server aktif, buka browser Anda dan akses:
[http://localhost:8000](http://localhost:8000)

*(Secara otomatis Anda akan diarahkan ke halaman utama home.php).*

---

## Data Uji Coba (Akun Bawaan)

Anda dapat menggunakan akun bawaan berikut yang sudah di-import dari database untuk mencoba fitur transaksi:

| Peran (Role) | Username / Login ID | Password |
| :--- | :--- | :--- |
| Administrator | admin | admin |
| Regular User | user | user |

---

## Struktur Direktori Proyek

```plaintext
├── assets/                  # File CSS, JS, Audio, dan Gambar pendukung
├── koneksi.php              # File konfigurasi koneksi database MySQLi
├── header.php               # Komponen header navbar umum
├── footer.php               # Komponen footer umum
├── home.php                 # Halaman utama aplikasi (Landing page)
├── belanja.php              # Halaman katalog belanja barang
├── beli_barang.php          # Halaman formulir pembelian barang
├── keranjang.php            # Halaman detail keranjang belanja
├── histori_pembelian.php    # Halaman riwayat pembelian barang
├── login.php / register.php # Halaman autentikasi akun pengguna
├── 404.php                  # Halaman kustom penanganan error 404
├── router.php               # Script routing untuk PHP development server
└── tokoonlines.sql          # Dump file database MySQL/MariaDB
```
