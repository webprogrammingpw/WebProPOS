# WebPro POS
Point of Sale for Web Programming

## 1. Skema Database
### a. Gambaran Aplikasi
### b. Instal Laravel
### c. Migration
### d. Seeder

## 2. Manajemen Kategori
## 3. Manajemen Produk
## 4. Autentikasi Pengguna
## 5. Peran & Izin Pengguna
## 6. Transaksi (Keranjang)
## 7. Transaksi 2
## 8. Laporan
## 9. Grafik


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
```
6. Jalankan aplikasi dengan perintah.
```
php artisan serve
```
7. Aplikasi siap digunakan pada http://127.0.0.1:8000