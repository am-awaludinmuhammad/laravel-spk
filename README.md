## Instalasi
Silahkan cek panduan instalasi resmi Laravel untuk persyaratan server sebelum Anda memulai. [Dokumentasi Laravel](https://laravel.com/docs/8.x/installation)

Install dependency menggunakan composer
```sh
composer install
```
Salin file .env.example dan buat perubahan konfigurasi yang diperlukan di file .env
```sh
cp .env.example .env
```
Generate application key
```sh
php artisan key:generate
```
Jalankan server lokal
```sh
php artisan serve
```