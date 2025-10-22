# Javis Authentication Tests

Project ini adalah aplikasi web sederhana untuk menampilkan form login dan fungsionalitasnya.

## Tech Stack

* **Backend:** PHP 8.3+, Laravel 11
* **Frontend:** Tailwind CSS, JavaScript, Blade
* **Database:** MySQL
* **Package Managers:** Composer

## Cara Menjalankan Project

1.  **Clone repository:**
    ```bash
    git clone <URL_REPOSITORY_ANDA>
    cd javis-test-authentication
    ```
2.  **Install dependensi PHP:**
    ```bash
    composer install
    ```
3.  **Salin file environment:**
    ```bash
    cp .env.example .env
    ```
4.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```
5.  **Konfigurasi database:**
    * Buka file `.env`.
    * Sesuaikan pengaturan database (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD). Secara default menggunakan SQLite. Jika menggunakan SQLite, pastikan file database ada atau buat file baru (misal: `database/database.sqlite`), atau ganti ke MySQL.
7.  **Jalankan migrasi database dan seeder:**
    ```bash
    php artisan migrate --seed
    ```
    * Perintah ini akan membuat tabel `users`, `password_reset_tokens`, `sessions`, `cache`, `cache_locks`, `jobs`, `job_batches`, `failed_jobs`, dan mengisi data user awal dari `UserSeeder.php`.

8.  **Jalankan server development:**
    ```bash
    php artisan serve
    ```
9. **Akses aplikasi:** Buka browser dan kunjungi `http://localhost:8000` (atau port lain yang ditampilkan oleh `php artisan serve`).

## Penjelasan Arsitektur

Project ini mengikuti arsitektur Model-View-Controller (MVC) standar Laravel:

* **Models:** (`app/Models/Users.php`) Merepresentasikan data aplikasi dan berinteraksi dengan database. Model `Users` mengelola data pengguna.
* **Views:** (`resources/views/auth.blade.php`, `resources/views/dashboard.blade.php`) Bertanggung jawab untuk menampilkan data kepada pengguna. Menggunakan Blade templating engine dan Tailwind CSS untuk styling.
* **Controllers:** (`app/Http/Controllers/AuthController.php`, `app/Http/Controllers/DashboardController.php`) Menangani permintaan pengguna, berinteraksi dengan Model, dan memilih View yang sesuai untuk ditampilkan. `AuthController` menangani logika login dan logout. `DashboardController` menangani tampilan halaman dashboard setelah login.
* **Routes:** (`routes/web.php`) Mendefinisikan URL aplikasi dan menghubungkannya ke metode Controller yang sesuai.
* **Migrations:** (`database/migrations/`) Mengelola skema database. Terdapat migrasi untuk tabel users dan tabel sistem Laravel (sessions, cache, jobs, dll.).
* **Seeders:** (`database/seeders/UserSeeder.php`) Mengisi database dengan data awal atau data dummy. `UserSeeder` membuat satu pengguna contoh.
