# Product Requirements Document (PRD)

## A. Nama Produk

**Sistem Informasi Menu Omah Tengkleng Klangenan**

## B. Deskripsi Produk

Sistem Informasi Menu Omah Tengkleng Klangenan adalah website berbasis **Laravel** dan **MySQL** yang digunakan untuk mengelola dan menampilkan informasi menu warung makan.

Website memiliki dua area utama:

- **Halaman pengunjung**, yaitu halaman publik dengan tampilan bernuansa hijau seperti website warung/restoran. Pengunjung dapat melihat halaman beranda dan daftar menu yang tersedia.
- **Halaman admin**, yaitu halaman pengelolaan berbasis AdminLTE yang hanya dapat diakses setelah login.

Sistem ini membantu admin dalam mengelola data menu, mengatur ketersediaan menu, menentukan menu spesial, mengarsipkan menu, serta mengelola data user.

## C. Tujuan Perancangan

Tujuan dari perancangan sistem ini adalah:

- Mempermudah pengelolaan data menu pada usaha warung makan.
- Menampilkan informasi menu kepada pengunjung secara rapi dan mudah diakses.
- Mengatur status ketersediaan menu secara cepat.
- Menentukan menu rekomendasi atau menu spesial pada halaman awal.
- Mengamankan halaman pengelolaan menggunakan login.
- Mendukung digitalisasi usaha kuliner skala kecil.

## D. Pengguna Sistem

### 1. Admin

Admin memiliki akses untuk mengelola menu, mengatur status menu, menentukan menu spesial, mengelola user, serta mengakses dashboard.

### 2. User/Karyawan

User atau karyawan dapat masuk ke sistem untuk membantu pengelolaan data sesuai kebutuhan operasional.

### 3. Pengunjung

Pengunjung dapat membuka website tanpa login untuk melihat informasi warung dan daftar menu yang tersedia.

## E. Rancangan Fitur

### 1. Halaman Home Pengunjung

Halaman home menampilkan identitas Omah Tengkleng Klangenan, banner utama, menu rekomendasi spesial, dan beberapa menu tersedia. Tampilan halaman menggunakan warna hijau agar sesuai dengan karakter website warung makan.

### 2. Halaman Menu Pengunjung

Halaman menu menampilkan daftar menu yang tersedia, lengkap dengan gambar, nama menu, harga, deskripsi singkat, dan status ketersediaan.

### 3. Login

Fitur login digunakan untuk membatasi akses ke halaman admin. Pengguna harus memasukkan email dan password yang valid.

### 4. Dashboard Admin

Dashboard menampilkan ringkasan informasi sistem, seperti total menu, menu tersedia, menu tidak tersedia, serta daftar menu terbaru.

### 5. CRUD Menu

Fitur kelola menu digunakan untuk:

- Menambah menu baru.
- Melihat daftar menu.
- Mengubah data menu.
- Menghapus menu.
- Mengunggah gambar menu.
- Mengatur status menu.
- Mengarsipkan atau menonaktifkan menu.

### 6. Manajemen Ketersediaan Menu

Admin dapat mengubah status menu menjadi tersedia, tidak tersedia, atau arsip/nonaktif sesuai kondisi bahan dan operasional harian.

### 7. Menu Spesial

Admin dapat menandai satu menu sebagai menu spesial. Menu spesial ditampilkan pada bagian rekomendasi di halaman home.

### 8. Manajemen User

Admin dapat mengelola user melalui fitur:

- Menambah user.
- Melihat daftar user.
- Mengubah data user.
- Menghapus user.
- Mengaktifkan atau menonaktifkan user.
- Mengarsipkan dan memulihkan user.

## F. Struktur Menu

### 1. Menu Pengunjung

- Beranda
- Menu
- Login

### 2. Menu Admin

- Dashboard
- Kelola Menu
- Kelola User
- Logout

## G. Kebutuhan Data

Data utama yang digunakan dalam sistem ini disimpan di database MySQL.

### 1. Data Menu

| Field | Keterangan |
| --- | --- |
| id | Kode unik menu |
| nama_menu | Nama makanan atau minuman |
| kategori | Jenis menu |
| harga | Harga menu |
| deskripsi | Deskripsi menu |
| gambar | Lokasi file gambar menu |
| status | Status menu: tersedia, tidak tersedia, atau arsip |
| is_special | Penanda menu spesial |
| created_by | User yang membuat data |
| updated_by | User yang memperbarui data |
| created_at | Waktu data dibuat |
| updated_at | Waktu data diperbarui |

### 2. Data User

| Field | Keterangan |
| --- | --- |
| id | Kode unik user |
| name | Nama user |
| email | Email login |
| password | Password terenkripsi |
| role_id | Relasi ke role user |
| is_active | Status aktif, nonaktif, atau arsip |
| remember_token | Token remember me |
| created_at | Waktu data dibuat |
| updated_at | Waktu data diperbarui |

### 3. Data User Role

| Field | Keterangan |
| --- | --- |
| id | Kode unik role |
| nama_role | Nama role, misalnya admin atau user |
| keterangan | Keterangan role |
| created_at | Waktu data dibuat |
| updated_at | Waktu data diperbarui |

## H. Kebutuhan Teknologi

| Komponen | Teknologi |
| --- | --- |
| Framework | Laravel |
| Bahasa Pemrograman | PHP |
| Database | MySQL/MariaDB |
| Template | Blade |
| Tema Admin | AdminLTE |
| Frontend | HTML, CSS, JavaScript |
| Web Server Lokal | XAMPP atau `php artisan serve` |
| Autentikasi | Laravel Auth manual menggunakan model User |

## I. Kebutuhan Fungsional

- Sistem dapat menampilkan halaman home pengunjung.
- Sistem dapat menampilkan halaman daftar menu.
- Sistem dapat menampilkan menu yang tersedia saja kepada pengunjung.
- Sistem dapat menampilkan menu spesial di halaman home.
- Sistem dapat menyediakan login admin/user.
- Sistem dapat membatasi halaman admin hanya untuk user yang sudah login.
- Sistem dapat menampilkan dashboard admin.
- Sistem dapat menambah data menu.
- Sistem dapat mengubah data menu.
- Sistem dapat menghapus data menu.
- Sistem dapat mengubah status ketersediaan menu.
- Sistem dapat mengarsipkan atau menonaktifkan menu.
- Sistem dapat mengelola data user.
- Sistem dapat mengaktifkan, menonaktifkan, mengarsipkan, dan memulihkan user.

## J. Kebutuhan Non-Fungsional

- Tampilan pengunjung menggunakan nuansa hijau dan sesuai dengan karakter website warung makan.
- Halaman admin menggunakan AdminLTE agar mudah digunakan.
- Data tersimpan di database MySQL secara terstruktur.
- Password user disimpan dalam bentuk hash.
- Website dapat dijalankan secara lokal menggunakan XAMPP dan `php artisan serve`.
- Halaman tetap dapat dibuka walaupun data menu masih kosong.

## K. Rancangan Database

### 1. Tabel `menus`

| Field | Tipe Data | Keterangan |
| --- | --- | --- |
| id | BIGINT UNSIGNED | Primary key |
| nama_menu | VARCHAR(255) | Nama menu |
| kategori | VARCHAR(100) | Kategori menu |
| harga | DECIMAL(10,2) | Harga menu |
| deskripsi | TEXT | Deskripsi menu |
| gambar | VARCHAR(255) | Path gambar |
| status | BOOLEAN/INTEGER | 1 tersedia, 0 tidak tersedia, -1 arsip |
| is_special | BOOLEAN | 1 menu spesial, 0 menu biasa |
| created_by | VARCHAR(255) | Pembuat data |
| updated_by | VARCHAR(255) | Pengubah data |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

### 2. Tabel `users`

| Field | Tipe Data | Keterangan |
| --- | --- | --- |
| id | BIGINT UNSIGNED | Primary key |
| name | VARCHAR(255) | Nama user |
| email | VARCHAR(255) | Email login |
| password | VARCHAR(255) | Password hash |
| role_id | SMALLINT UNSIGNED | Relasi ke `userrole` |
| is_active | INTEGER/BOOLEAN | 1 aktif, 0 nonaktif, -1 arsip |
| remember_token | VARCHAR(100) | Token login |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

### 3. Tabel `userrole`

| Field | Tipe Data | Keterangan |
| --- | --- | --- |
| id | SMALLINT UNSIGNED | Primary key |
| nama_role | VARCHAR(255) | Nama role |
| keterangan | VARCHAR(255) | Keterangan role |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

## L. Rancangan Laravel

### Model

- `Menu`
- `User`
- `Role`

### Controller

- `HomeController`
- `AuthController`
- `Admin\DashboardController`
- `Admin\MenuController`
- `Admin\UserController`

### View

- `resources/views/layouts/public.blade.php`
- `resources/views/home.blade.php`
- `resources/views/menu/index.blade.php`
- `resources/views/auth/login.blade.php`
- `resources/views/admin/dashboard.blade.php`
- `resources/views/admin/menus`
- `resources/views/admin/users`

## M. Route Sistem

| URL | Akses | Keterangan |
| --- | --- | --- |
| `/` | Pengunjung | Halaman home |
| `/menu` | Pengunjung | Halaman daftar menu |
| `/login` | Guest | Halaman login |
| `/logout` | User login | Logout |
| `/admin/dashboard` | User login | Dashboard admin |
| `/admin/menus` | User login | Daftar menu |
| `/admin/menus/create` | User login | Tambah menu |
| `/admin/menus/{menu}/edit` | User login | Edit menu |
| `/admin/menus/{menu}/toggle-status` | User login | Ubah status menu |
| `/admin/menus/{menu}/toggle-special` | User login | Ubah menu spesial |
| `/admin/menus/{menu}/deactivate` | User login | Arsip/nonaktifkan menu |
| `/admin/users` | User login | Daftar user |
| `/admin/users/create` | User login | Tambah user |
| `/admin/users/{user}/edit` | User login | Edit user |
| `/admin/users/{user}/deactivate` | User login | Aktif/nonaktif user |
| `/admin/users/{user}/archive` | User login | Arsip user |
| `/admin/users/{user}/restore` | User login | Pulihkan user |

## N. Alur Penggunaan

### 1. Alur Pengunjung

1. Pengunjung membuka halaman home.
2. Pengunjung melihat informasi warung dan menu spesial.
3. Pengunjung membuka halaman menu.
4. Sistem menampilkan daftar menu tersedia.

### 2. Alur Admin/User

1. Admin/user membuka halaman login.
2. Admin/user memasukkan email dan password.
3. Sistem memverifikasi akun.
4. Admin/user masuk ke dashboard.
5. Admin/user mengelola data menu atau user sesuai kebutuhan.

## O. Batasan Sistem

- Sistem belum menyediakan pemesanan online.
- Sistem belum menyediakan pembayaran online.
- Sistem berfokus pada informasi menu, pengelolaan menu, dan pengelolaan user.
- Website dijalankan untuk kebutuhan lokal/tugas menggunakan XAMPP dan Laravel.

## P. Output yang Diharapkan

Output yang diharapkan adalah website informasi menu warung makan berbasis Laravel dan MySQL dengan tampilan publik bernuansa hijau, halaman admin berbasis AdminLTE, fitur login, CRUD menu, pengaturan status menu, menu spesial, dan manajemen user.
