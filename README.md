<h1 align="center">Laundry Management System</h1>
<p align="center">
  <b>Sistem manajemen laundry berbasis web untuk pengelolaan outlet, transaksi, dan laporan</b>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/version-1.0.0-blue?style=for-the-badge" alt="Version">
  <img src="https://img.shields.io/badge/php-8.0+-8892BF.svg?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/laravel-10.0+-FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/bootstrap-5.0+-7952B3.svg?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</p>

## 📋 Deskripsi

Aplikasi Laundry adalah sistem manajemen berbasis web yang dikembangkan untuk mengoptimalkan proses bisnis laundry, mulai dari pendaftaran pelanggan, pengelolaan transaksi, hingga pelaporan. Aplikasi ini menyediakan tiga role pengguna dengan akses yang berbeda: Admin, Kasir, dan Owner, yang dirancang untuk meningkatkan efisiensi operasional dan meningkatkan pelayanan pelanggan.

## 🚀 Demo Aplikasi

### Tampilan Login dengan Efek Parallax
Aplikasi menggunakan efek parallax pada halaman login untuk memberikan pengalaman visual yang menarik bagi pengguna.
<p align="center">
  <img src="public/Login1.png" alt="Tampilan Login dengan Parallax" width="500">
</p>
<p align="center">
  <img src="public/Login2.png" alt="Tampilan Login dengan Parallax" width="500">
</p>

## ✨ Fitur Utama

### 1. Pengelolaan Outlet
Admin dapat mengelola informasi outlet lengkap dengan alamat dan detail kontak.
<p align="center">
  <img src="public/Data Outlet.png" alt="Pengelolaan Outlet" width="500">
</p>

### 2. Manajemen Paket Layanan
Pengaturan berbagai paket layanan laundry dengan harga dan jenis yang berbeda.
<p align="center">
  <img src="public/Data Paket.png" alt="Manajemen Paket" width="500">
</p>

### 3. Registrasi Pelanggan
Pendaftaran pelanggan baru dengan data lengkap untuk memudahkan transaksi berikutnya.
<p align="center">
  <img src="public/Registrasi Pelanggan.png" alt="Registrasi Pelanggan" width="500">
</p>

### 4. Transaksi & Invoice
Pembuatan transaksi lengkap dengan cetak invoice sebagai bukti pembayaran yang sah.
<p align="center">
  <img src="public/Kelola Layanan1.png" alt="Kelola Layanan" width="500">
</p>
<p align="center">
  <img src="public/Kelola Layanan2.png" alt="Detail Kelola Layanan" width="500">
</p>
<p align="center">
  <img src="public/Invoice.png" alt="Invoice" width="500">
</p>
<p align="center">
  <img src="public/Transaksi.png" alt="Transaksi" width="500">
</p>

### 5. Laporan Komprehensif
Sistem pelaporan detail untuk membantu Owner memonitor kinerja bisnis.
<p align="center">
  <img src="public/Laporan Penjualan.png" alt="Laporan" width="500">
</p>

### 6. Manajemen Pengguna
Admin dapat mengelola akun pengguna dengan berbagai role (Admin, Kasir, Owner).
<p align="center">
  <img src="public/Data Pengguna.png" alt="Manajemen Pengguna" width="500">
</p>

### 7. Profile
Melihat data riwayat kerja dan mengedit profil pengguna.
<p align="center">
  <img src="public/Profile.png" alt="Manajemen Pengguna" width="500">
</p>

## 🌟 Manfaat

- **Efisiensi Operasional:** Mengurangi waktu yang dibutuhkan untuk registrasi pelanggan dan pembuatan transaksi.
- **Tracking Status Laundry:** Memudahkan pelacakan status proses laundry dari awal hingga selesai.
- **Pengelolaan Keuangan:** Membantu Owner melacak pendapatan dan kinerja bisnis melalui laporan yang dapat dicetak.
- **Manajemen Multi-Outlet:** Mendukung pengelolaan beberapa outlet dalam satu sistem terpadu.
- **Cetak Invoice Otomatis:** Menghasilkan bukti transaksi profesional yang dapat langsung dicetak untuk pelanggan.

## 👥 Struktur Pengguna

Aplikasi ini memiliki tiga tipe pengguna dengan hak akses berbeda:

### Admin
- Mengelola data outlet (CRUD dengan soft delete)
- Mengelola data paket (CRUD dengan soft delete)
- Registrasi pelanggan dan membuat transaksi
- Mengelola layanan dan transaksi
- Melihat dan mencetak laporan
- Mengelola data pengguna (CRUD dengan soft delete)
- Mengedit profil pribadi

### Kasir
- Registrasi pelanggan dan membuat transaksi
- Mengelola layanan dan transaksi
- Mengedit profil pribadi

### Owner
- Melihat dan mencetak laporan
- Mengedit profil pribadi

## 📊 Alur Kerja Sistem

```mermaid
graph TD
    A[Pelanggan Datang] -->|Kasir/Admin| B[Registrasi Pelanggan]
    B -->|Input Data| C[Pilih Layanan]
    C -->|Konfirmasi| D[Buat Transaksi]
    D -->|Cetak| E[Invoice]
    D -->|Update Status| F[Proses Laundry]
    F -->|Selesai| G[Update Status Selesai]
    G -->|Data Tersimpan| H[Laporan]
    H -->|Owner/Admin| I[Cetak Laporan]
```

## 🛠️ Teknologi yang Digunakan

- **Frontend:** HTML, CSS, JavaScript, Bootstrap, Parallax Effect
- **Backend:** PHP dengan framework Laravel
- **Database:** MySQL
- **Reporting:** DomPDF untuk laporan dan invoice

## 📥 Instalasi dan Penggunaan

### Persyaratan Sistem
- PHP >= 8.0
- Composer
- MySQL

### Langkah Instalasi

1. Clone repositori
```bash
git clone https://github.com/AnnisaDianFadillah06/laundry-management-system.git
cd laundry-management-system
```

2. Instal dependensi
```bash
composer install
```

3. Salin file .env.example menjadi .env dan konfigurasi
```bash
cp .env.example .env
php artisan key:generate
```

4. Konfigurasi database di file .env

5. Migrasi dan isi database
```bash
php artisan migrate --seed
```

6. Jalankan aplikasi
```bash
php artisan serve
```

7. Akses aplikasi melalui browser di http://localhost:8000

## 📚 Detail Menu

### 1. Master (Admin)
- **Menu Data Outlet:** Mengelola data outlet dengan fitur CRUD dan soft delete.
- **Menu Data Paket:** Mengelola data paket layanan dengan fitur CRUD dan soft delete.

### 2. Transaksi (Admin & Kasir)
- **Menu Registrasi Pelanggan:** Mendaftarkan pelanggan baru sekaligus membuat data transaksi dan cetak invoice.
- **Menu Kelola Layanan:** Menampilkan data pelanggan dan pembuatan transaksi disertai cetak invoice.
- **Menu Transaksi:** Memperbarui status proses dan pembayaran serta menghapus permanen data transaksi.

### 3. Lainnya (Admin & Owner)
- **Menu Laporan:** Mencetak data transaksi berdasarkan periode atau kriteria tertentu.

### 4. Pengguna (Admin)
- **Menu Data Pengguna:** Mengelola data pengguna sistem dengan fitur CRUD dan soft delete.

### 5. Profile (Semua role)
- Melihat data riwayat kerja dan mengedit profil pengguna.

## 📚 Proyek Ini Dikembangkan Oleh
Annisa Dian Fadillah
