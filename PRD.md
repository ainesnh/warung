# Product Requirements Document (PRD)

## A. Nama Produk

**Sistem Informasi Menu Omah Tengkleng Klangenan**

## B. Deskripsi Produk

Sistem Informasi Menu Omah Tengkleng Klangenan adalah aplikasi web berbasis **Laravel** dan **MySQL/MariaDB** untuk membantu pengelolaan informasi menu warung makan.

Aplikasi ini memiliki halaman publik untuk pengunjung dan halaman admin untuk pengelolaan data. Pengunjung dapat melihat halaman beranda dan daftar menu yang tersedia, sedangkan admin atau user internal dapat login untuk mengelola menu, user, role, dan pengaturan tampilan website.

Tampilan halaman publik dirancang dengan nuansa hijau agar sesuai dengan karakter website warung makan. Area admin menggunakan tema AdminLTE agar proses pengelolaan data lebih rapi dan mudah digunakan.

## C. Tujuan Perancangan

Tujuan dari perancangan sistem ini adalah:

- Mempermudah pengelolaan data menu makanan dan minuman.
- Menampilkan informasi menu, harga, gambar, dan deskripsi kepada pengunjung.
- Mengatur status ketersediaan menu secara cepat.
- Menampilkan menu spesial pada halaman beranda.
- Mengamankan halaman pengelolaan menggunakan fitur login.
- Mengelola user dan role pengguna sistem.
- Mengatur identitas dan banner website melalui halaman setting.
- Mendukung digitalisasi usaha kuliner skala kecil.

## D. Pengguna Sistem

### 1. Pengunjung

Pengunjung dapat mengakses halaman publik tanpa login. Pengunjung dapat melihat halaman beranda dan halaman daftar menu yang tersedia.

### 2. User/Karyawan

User atau karyawan dapat login ke halaman admin untuk membantu pengelolaan data operasional sesuai hak akses yang diberikan.

### 3. Admin

Admin memiliki akses utama untuk mengelola menu, user, role, dan setting website.

## E. Ruang Lingkup Sistem

Sistem mencakup:

- Halaman beranda pengunjung.
- Halaman daftar menu pengunjung.
- Login dan logout.
- Dashboard admin.
- CRUD menu.
- Pengaturan status menu.
- Pengaturan menu spesial.
- Pengarsipan/nonaktif menu.
- CRUD user.
- Aktivasi, nonaktivasi, arsip, dan restore user.
- CRUD role.
- Setting nama aplikasi, judul banner, dan gambar banner.

Sistem tidak mencakup:

- Pemesanan online.
- Pembayaran online.
- Keranjang belanja.
- Integrasi pengiriman.
- Laporan transaksi penjualan.

## F. Rancangan Fitur

### 1. Halaman Home

Halaman home menampilkan identitas Omah Tengkleng Klangenan, banner utama, menu spesial, dan beberapa menu tersedia. Halaman ini digunakan sebagai halaman awal website.

### 2. Halaman Menu

Halaman menu menampilkan daftar menu yang tersedia. Informasi yang ditampilkan meliputi gambar, nama menu, harga, deskripsi, dan status.

### 3. Login

Fitur login digunakan untuk membatasi akses ke halaman admin. User harus memasukkan email dan password yang valid.

### 4. Logout

Fitur logout digunakan untuk keluar dari sesi login.

### 5. Dashboard Admin

Dashboard admin menampilkan ringkasan informasi sistem, seperti jumlah menu, menu tersedia, menu tidak tersedia, dan informasi terbaru.

### 6. Kelola Menu

Fitur kelola menu digunakan untuk:

- Menambah menu.
- Melihat daftar menu.
- Mengubah data menu.
- Menghapus menu.
- Mengunggah gambar menu.
- Mengatur ketersediaan menu.
- Menandai menu sebagai menu spesial.
- Menonaktifkan atau mengarsipkan menu.

### 7. Kelola User

Fitur kelola user digunakan untuk:

- Menambah user.
- Melihat daftar user.
- Mengubah data user.
- Menghapus user.
- Mengaktifkan atau menonaktifkan user.
- Mengarsipkan user.
- Mengembalikan user dari arsip.

### 8. Kelola Role

Fitur kelola role digunakan untuk:

- Menambah role.
- Melihat daftar role.
- Mengubah role.
- Menghapus role jika belum digunakan oleh user.

### 9. Setting Website

Fitur setting website digunakan untuk mengatur:

- Nama aplikasi.
- Judul banner halaman home.
- Judul banner halaman menu.
- Gambar banner halaman home.
- Gambar banner halaman menu.

## G. Struktur Menu

### 1. Menu Pengunjung

- Beranda
- Menu
- Login

### 2. Menu Admin

- Dashboard
- User Role
- User
- Menu
- Lihat Website
- Setting Website
- Logout

## H. Kebutuhan Data

### 1. Data Menu

| Field | Keterangan |
| --- | --- |
| id | Kode unik menu |
| nama_menu | Nama makanan atau minuman |
| kategori | Kategori menu |
| harga | Harga menu |
| deskripsi | Deskripsi menu |
| gambar | Lokasi file gambar menu |
| status | Status menu |
| is_special | Penanda menu spesial |
| created_by | User pembuat data |
| updated_by | User pengubah data |
| created_at | Waktu data dibuat |
| updated_at | Waktu data diperbarui |

### 2. Data User

| Field | Keterangan |
| --- | --- |
| id | Kode unik user |
| name | Nama user |
| email | Email untuk login |
| password | Password terenkripsi |
| role_id | Relasi ke role |
| is_active | Status user |
| remember_token | Token remember me |
| created_at | Waktu data dibuat |
| updated_at | Waktu data diperbarui |

### 3. Data Role

| Field | Keterangan |
| --- | --- |
| id | Kode unik role |
| nama_role | Nama role |
| keterangan | Keterangan role |
| created_at | Waktu data dibuat |
| updated_at | Waktu data diperbarui |

### 4. Data Setting

| Field | Keterangan |
| --- | --- |
| id | Kode unik setting |
| key | Nama kunci pengaturan |
| value | Nilai pengaturan |
| group | Kelompok pengaturan |
| created_at | Waktu data dibuat |
| updated_at | Waktu data diperbarui |

## I. Kebutuhan Teknologi

| Komponen | Teknologi |
| --- | --- |
| Framework | Laravel |
| Bahasa Pemrograman | PHP |
| Database | MySQL/MariaDB |
| Template | Blade |
| Tema Admin | AdminLTE |
| Frontend | HTML, CSS, JavaScript |
| Server Lokal | XAMPP dan `php artisan serve` |
| Autentikasi | Laravel Auth berbasis model User |

## J. Kebutuhan Fungsional

- Sistem dapat menampilkan halaman home.
- Sistem dapat menampilkan halaman daftar menu.
- Sistem dapat menampilkan menu yang tersedia kepada pengunjung.
- Sistem dapat menampilkan menu spesial di halaman home.
- Sistem dapat menyediakan fitur login dan logout.
- Sistem dapat membatasi halaman admin hanya untuk user yang sudah login.
- Sistem dapat menampilkan dashboard admin.
- Sistem dapat menambah, melihat, mengubah, dan menghapus menu.
- Sistem dapat mengubah status ketersediaan menu.
- Sistem dapat menandai menu sebagai menu spesial.
- Sistem dapat menonaktifkan atau mengarsipkan menu.
- Sistem dapat menambah, melihat, mengubah, dan menghapus user.
- Sistem dapat mengaktifkan, menonaktifkan, mengarsipkan, dan memulihkan user.
- Sistem dapat menambah, melihat, mengubah, dan menghapus role.
- Sistem dapat mengatur nama aplikasi dan banner website.

## K. Kebutuhan Non-Fungsional

- Website mudah digunakan oleh pengunjung dan admin.
- Tampilan pengunjung responsif dan bernuansa hijau.
- Halaman admin menggunakan AdminLTE.
- Data disimpan secara terstruktur di database MySQL/MariaDB.
- Password user disimpan dalam bentuk hash.
- Halaman admin dilindungi autentikasi.
- Gambar menu dan banner dapat diunggah melalui form.
- Sistem dapat dijalankan secara lokal menggunakan XAMPP.

## L. Rancangan Database

### 1. Tabel `menus`

| Field | Tipe Data | Keterangan |
| --- | --- | --- |
| id | BIGINT UNSIGNED | Primary key |
| nama_menu | VARCHAR(255) | Nama menu |
| kategori | VARCHAR(100) | Kategori menu |
| harga | DECIMAL(10,2) | Harga menu |
| deskripsi | TEXT | Deskripsi menu |
| gambar | VARCHAR(255) | Path gambar menu |
| status | INTEGER/BOOLEAN | 1 tersedia, 0 tidak tersedia, -1 arsip |
| is_special | BOOLEAN | 1 spesial, 0 biasa |
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
| email_verified_at | TIMESTAMP | Waktu verifikasi email |
| password | VARCHAR(255) | Password hash |
| role_id | SMALLINT UNSIGNED | Foreign key ke `userrole` |
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

### 4. Tabel `settings`

| Field | Tipe Data | Keterangan |
| --- | --- | --- |
| id | BIGINT UNSIGNED | Primary key |
| key | VARCHAR(255) | Kunci pengaturan |
| value | TEXT | Nilai pengaturan |
| group | VARCHAR(255) | Kelompok pengaturan |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

## M. Rancangan Laravel

### 1. Model

- `Menu`
- `User`
- `Role`
- `Setting`

### 2. Controller

- `HomeController`
- `AuthController`
- `Admin\DashboardController`
- `Admin\MenuController`
- `Admin\UserController`
- `Admin\RoleController`
- `Admin\SettingController`

### 3. View Utama

- `resources/views/layouts/public.blade.php`
- `resources/views/layouts/adminlte.blade.php`
- `resources/views/home.blade.php`
- `resources/views/menu/index.blade.php`
- `resources/views/auth/login.blade.php`
- `resources/views/admin/dashboard.blade.php`
- `resources/views/admin/menus`
- `resources/views/admin/users`
- `resources/views/admin/userrole`
- `resources/views/admin/settings`

## N. Rancangan Route

| URL | Akses | Keterangan |
| --- | --- | --- |
| `/` | Pengunjung | Halaman home |
| `/menu` | Pengunjung | Halaman daftar menu |
| `/login` | Guest | Halaman login |
| `/logout` | User login | Logout |
| `/admin/dashboard` | User login | Dashboard admin |
| `/admin/menus` | User login | Daftar menu |
| `/admin/menus/create` | User login | Form tambah menu |
| `/admin/menus/{menu}/edit` | User login | Form edit menu |
| `/admin/menus/{menu}/toggle-status` | User login | Ubah status menu |
| `/admin/menus/{menu}/toggle-special` | User login | Ubah menu spesial |
| `/admin/menus/{menu}/deactivate` | User login | Nonaktifkan menu |
| `/admin/users` | User login | Daftar user |
| `/admin/users/create` | User login | Form tambah user |
| `/admin/users/{user}/edit` | User login | Form edit user |
| `/admin/users/{user}/deactivate` | User login | Aktif/nonaktif user |
| `/admin/users/{user}/archive` | User login | Arsip user |
| `/admin/users/{user}/restore` | User login | Restore user |
| `/admin/roles` | User login | Kelola role |
| `/admin/settings` | User login | Halaman setting website |
| `/admin/settings/update` | User login | Simpan setting website |

## O. Alur Penggunaan

### 1. Alur Pengunjung

1. Pengunjung membuka halaman home.
2. Pengunjung melihat banner dan menu spesial.
3. Pengunjung membuka halaman menu.
4. Sistem menampilkan daftar menu yang tersedia.

### 2. Alur Admin/User

1. Admin/user membuka halaman login.
2. Admin/user memasukkan email dan password.
3. Sistem memverifikasi akun.
4. Admin/user masuk ke dashboard.
5. Admin/user mengelola data sesuai menu yang tersedia.
6. Admin/user logout setelah selesai.

## P. Batasan Sistem

- Sistem belum memiliki fitur pemesanan online.
- Sistem belum memiliki fitur pembayaran online.
- Sistem belum memiliki laporan penjualan.
- Sistem difokuskan untuk pengelolaan data menu, user, role, dan setting website.

## Q. Output yang Diharapkan

Output yang diharapkan adalah aplikasi web Omah Tengkleng Klangenan berbasis Laravel dan MySQL/MariaDB yang memiliki halaman publik bernuansa hijau, halaman admin berbasis AdminLTE, login, dashboard, pengelolaan menu, pengelolaan user, pengelolaan role, dan pengaturan tampilan website.
