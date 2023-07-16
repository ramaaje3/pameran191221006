## Features
- `login sebagai Admin` akan tersedia fitur CRUD Drivers, CRUD Kendaraan, export pesanan dalam bentuk excel dan melakukan pengajuan pesanan, selain itu kita juga bisa melihat pesanan yang telah disetujui dan ditolak
- `login sebagai Owner` akan tersedia fitur CRUD users untuk menambah admin, melakukan penyetujuan pesanan yang telah diajukan oleh admin, melakukan export pesanan dalam bentuk excel, serta melihat pesanan yang telah disetujui dan ditolak

## Installation
- Clone repo dan `cd` ke dalamnya
- Run `composer install` di terminal
- Rename atau copy `.env.example` file menjadi `.env`
- Atur kredensial database anda didalam `.env` file
- Run migration dan seeder `php artisan migrate --seed` di terminal

## Step to use
- Pastikan migration dan seeder telah sukses dan berhasil
- Run `php artisan serve` di terminal
- Login sebagai Admin menggunakan `email` : admin@mail.com & `password` : 12345678
- Login sebagai Owner menggunakan `email` : owner@mail.com & `password` : 12345678
- Dan silahkan melakukan testing

## Made using
- Framework Laravel versi 8 
- PHP versi 7.4.30
- Database MySQL
