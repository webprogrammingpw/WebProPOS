# WebPro POS
Point of Sale for Web Programming

## 1. Skema Database
a. Gambaran Aplikasi
b. Instal Laravel
c. Migration
d. Seeder
e. Upload ke github

## 2. Layout Template
a. Memilih Tema - AdminLTE 3.2 stable version
b. Download
c. Sesuaikan
d. Buat Layout
e. Upload ke github

## 3. Manajemen Kategori
a. Data dan Tambah Kategori
b. Simpan Kategori
c. Hapus Kategori
d. Edit dan Update Kategori
e. Upload ke Github

## 4. Manajemen Produk
## 5. Autentikasi Pengguna
## 6. Peran & Izin Pengguna
## 7. Transaksi (Keranjang)
## 8. Transaksi 2
## 9. Laporan
## 10. Grafik


### Cara Menggunakan Aplikasi
1. Duplikat code dengan perintah clone.
```
git clone https://github.com/webprogrammingpw/WebProPOS.git
```
2. Masuk ke folder kerja dengan perintah.
```
cd WebProPOS
```
3. Install vendor dan lain yang dibutuhkan dengan perintah.
```
composer install
```
4. duplikat .env.example dengan perintah.
```
cp .env.example .env
```
5. Sesuaikan isi .env dengan informasi DB dan Password yang, misalnya.
```bash
APP_NAME="WebPro POS"
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webpropos
DB_USERNAME=root
DB_PASSWORD=
APP_TIMEZONE="Asia/Jakarta"
```
6. Jalankan aplikasi dengan perintah.
```
php artisan serve
```
7. Aplikasi siap digunakan pada http://127.0.0.1:8000