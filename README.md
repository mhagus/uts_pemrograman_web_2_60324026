# 📚 Manajemen Perpustakaan — UTS

Aplikasi berbasis web sederhana untuk mengelola data buku dan kategori di perpustakaan. Dibangun menggunakan **PHP Native** untuk logika backend dan **Bootstrap 5** untuk antarmuka yang responsif.

## 👤 Identitas Mahasiswa
| Field | Keterangan |
| :--- | :--- |
| **Nama** | Muhammad Agus |
| **NIM** | 60324026 |
| **Mata Kuliah** | Pemrograman Web-II |

---

## 📝 Deskripsi Aplikasi
Aplikasi ini dirancang untuk memudahkan pustakawan dalam melakukan manajemen data buku secara digital. Fitur utama yang tersedia meliputi:
* **Dashboard:** Menampilkan ringkasan statistik data.
* **Manajemen Kategori:** Tambah, edit, dan hapus kategori buku.
* **Manajemen Buku:** Pengelolaan data buku lengkap (Judul, Penulis, Tahun Terbit).
* **Sistem Validasi:** Memastikan input data sesuai dengan format yang ditentukan.

---

## ⚙️ Panduan Instalasi

### 1. Prasyarat
Pastikan komputer Anda sudah terpasang salah satu dari web server lokal berikut:
* **XAMPP** 
* **Laragon**
* **MAMP**

### 2. Langkah-Langkah Instalasi
1.  **Clone Repositori**
    Buka terminal/CMD dan jalankan perintah:
    ```bash
    git clone https://github.com/mhagus/uts_pemrograman_web_2_60324026
    ```
2.  **Pindahkan ke Folder Web Server**
    * Jika menggunakan XAMPP: pindahkan folder ke `C:/xampp/htdocs/uts_60324026
    * Jika menggunakan Laragon: pindahkan folder ke `C:/laragon/www/uts_60324026
3.  **Persiapan Database**
    Buka phpMyAdmin ( http://localhost/phpmyadmin), lalu:
       * Klik Impor
       * Pilih file setup.sqldari folder project
       * Klik Lanjutkan
        Atau jalankan via terminal:
        mysql -u root -p < setup.sql
4.  **Konfigurasi Koneksi**
    Buka file `config/database.php` (atau file koneksi Anda) dan sesuaikan pengaturannya:
    define('DB_SERVER',   'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');           // Sesuaikan password MySQL Anda
    define('DB_NAME',     'uts_perpustakaan_60324026');
    ```
5.  **Jalankan Aplikasi**
    Akses melalui browser di alamat:
    `http://localhost/uts_60324026/index.php

---

## 📁 Struktur Folder

uts-60324026/
│
├── config/
│   └── database.php        # Konfigurasi & koneksi database
│
├── index.php               # Halaman utama — daftar semua kategori
├── create.php              # Form tambah kategori baru
├── edit.php                # Form edit kategori (menerima ?id=)
├── delete.php              # Proses hapus kategori (menerima ?id=)
│
├── setup.sql               # Script SQL: buat database, tabel, dan data awal
│
└── README.md               # Dokumentasi proyek ini


##🔗 Tautan Repositori GitHub

https://github.com/mhagus/uts_pemrograman_web_2_60324026