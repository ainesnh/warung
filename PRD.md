# Product Requirements Document (PRD)

## A. Nama Produk

**Sistem Informasi Menu Omah Tengkleng Klangenan**

## B. Deskripsi Produk

Website yang dirancang merupakan sistem informasi berbasis web yang digunakan untuk membantu pengelolaan menu dan informasi pada Omah Tengkleng Klangenan. Sistem ini dirancang menggunakan framework **Laravel** dan database **MySQL**.

Sistem ini memungkinkan admin untuk mengelola data menu, seperti menambah, mengubah, dan menghapus menu. Selain itu, website juga dapat diakses oleh pelanggan untuk melihat daftar menu yang tersedia beserta informasi harga dan deskripsi menu.

Dengan adanya sistem ini, pengelolaan usaha diharapkan menjadi lebih terstruktur, efisien, dan informasi menu dapat diakses dengan mudah oleh pelanggan.

## C. Tujuan Perancangan

Tujuan dari perancangan website ini adalah sebagai berikut:

- Mempermudah pengelolaan data menu pada usaha warung makan.
- Meningkatkan efisiensi dalam pengaturan ketersediaan menu.
- Menyediakan informasi menu kepada pelanggan.
- Mendukung proses digitalisasi usaha kuliner skala kecil.

## D. Pengguna Sistem

Pengguna dalam sistem ini terdiri dari:

### 1. Admin

Admin bertugas mengelola data menu, mengatur ketersediaan menu, serta mengelola informasi yang ditampilkan pada website.

### 2. Pengunjung/User

Pengunjung atau user dapat melihat informasi menu, harga, dan detail menu yang tersedia pada website.

## E. Rancangan Fitur

### 1. Dashboard

Dashboard menampilkan halaman utama bagi admin yang berfungsi untuk menampilkan ringkasan informasi sistem, seperti jumlah menu, jumlah menu tersedia, dan jumlah menu tidak tersedia.

### 2. CRUD Menu

Fitur ini digunakan untuk mengelola data menu yang dijual. Admin dapat melakukan hal berikut:

- Menambah menu baru.
- Melihat daftar menu.
- Mengubah data menu.
- Menghapus data menu.

Data menu yang dikelola meliputi nama menu, kategori, harga, deskripsi, gambar, dan status ketersediaan.

### 3. Manajemen Ketersediaan Menu

Fitur ini digunakan untuk mengatur apakah suatu menu tersedia atau tidak. Admin dapat mengaktifkan atau menonaktifkan menu sesuai kondisi bahan atau keputusan harian.

Pendekatan ini digunakan karena usaha kuliner memiliki menu yang tidak selalu tersedia setiap hari.

### 4. Login Admin

Fitur login digunakan untuk mengamankan sistem sehingga hanya admin yang dapat mengakses fitur pengelolaan data.

### 5. Halaman Menu

Halaman ini menampilkan daftar menu makanan dan minuman yang tersedia beserta harga dan deskripsinya, sehingga memudahkan pelanggan dalam melihat pilihan menu.

## F. Struktur Menu

### 1. Menu Pengunjung/User

- Home
- Menu

### 2. Menu Admin

- Dashboard
- Kelola Menu

## G. Kebutuhan Data

Data utama yang dibutuhkan dalam sistem ini adalah data menu dan data admin. Seluruh data disimpan di database MySQL.

### Data Menu

| Nama Field | Keterangan |
| --- | --- |
| id | Kode unik menu |
| nama_menu | Nama makanan atau minuman |
| kategori | Jenis menu, misalnya makanan atau minuman |
| harga | Harga menu |
| deskripsi | Penjelasan singkat tentang menu |
| gambar | Foto menu |
| status | Status ketersediaan menu |
| created_at | Waktu data dibuat |
| updated_at | Waktu data diperbarui |

### Data Admin/User

| Nama Field | Keterangan |
| --- | --- |
| id | Kode unik user |
| name | Nama admin |
| email | Email untuk login |
| password | Password yang sudah dienkripsi |
| created_at | Waktu data dibuat |
| updated_at | Waktu data diperbarui |

## H. Kebutuhan Teknologi

Sistem ini dirancang menggunakan teknologi berikut:

| Komponen | Teknologi |
| --- | --- |
| Framework | Laravel |
| Bahasa Pemrograman | PHP |
| Database | MySQL |
| Frontend | Blade Template, HTML, CSS, JavaScript |
| Styling Admin | AdminLTE |
| Web Server Lokal | Laragon/XAMPP atau server Laravel artisan |
| Autentikasi | Laravel Authentication |

Laravel digunakan untuk mengelola routing, controller, model, view, validasi, autentikasi admin, dan proses CRUD data menu. MySQL digunakan sebagai tempat penyimpanan data menu dan data user/admin.

## I. Kebutuhan Fungsional

Kebutuhan fungsional sistem adalah sebagai berikut:

- Sistem dapat menampilkan halaman home untuk pengunjung.
- Sistem dapat menampilkan daftar menu yang tersedia kepada pengunjung.
- Sistem dapat menampilkan informasi harga dan deskripsi menu.
- Sistem dapat menyediakan halaman login admin.
- Sistem dapat membatasi akses halaman admin hanya untuk pengguna yang sudah login.
- Sistem dapat menampilkan dashboard admin.
- Sistem dapat menambahkan data menu baru.
- Sistem dapat menampilkan daftar seluruh data menu.
- Sistem dapat mengubah data menu.
- Sistem dapat menghapus data menu.
- Sistem dapat mengatur status ketersediaan menu.

## J. Kebutuhan Non-Fungsional

Kebutuhan non-fungsional sistem adalah sebagai berikut:

- Website mudah digunakan oleh admin dan pengunjung.
- Tampilan website responsif pada perangkat desktop dan mobile.
- Data menu tersimpan dengan rapi di database.
- Halaman admin dilindungi dengan autentikasi login.
- Informasi menu dapat diakses dengan cepat oleh pengunjung.
- Sistem menggunakan database MySQL untuk menyimpan data secara terstruktur.
- Sistem dibangun menggunakan Laravel agar pengembangan lebih rapi dengan pola MVC.

## K. Rancangan Database MySQL

### 1. Tabel users

Tabel `users` digunakan untuk menyimpan data admin yang dapat login ke sistem.

| Field | Tipe Data | Keterangan |
| --- | --- | --- |
| id | BIGINT UNSIGNED | Primary key |
| name | VARCHAR(255) | Nama admin |
| email | VARCHAR(255) | Email admin |
| password | VARCHAR(255) | Password terenkripsi |
| created_at | TIMESTAMP | Waktu data dibuat |
| updated_at | TIMESTAMP | Waktu data diperbarui |

### 2. Tabel menus

Tabel `menus` digunakan untuk menyimpan data menu makanan dan minuman.

| Field | Tipe Data | Keterangan |
| --- | --- | --- |
| id | BIGINT UNSIGNED | Primary key |
| nama_menu | VARCHAR(255) | Nama menu |
| kategori | VARCHAR(100) | Kategori menu |
| harga | DECIMAL(10,2) | Harga menu |
| deskripsi | TEXT | Deskripsi menu |
| gambar | VARCHAR(255) | Path gambar menu |
| status | ENUM('tersedia','tidak_tersedia') | Status ketersediaan menu |
| created_at | TIMESTAMP | Waktu data dibuat |
| updated_at | TIMESTAMP | Waktu data diperbarui |

## L. Rancangan Laravel

Rancangan struktur Laravel yang digunakan dalam sistem ini adalah sebagai berikut:

| Komponen Laravel | Fungsi |
| --- | --- |
| Route | Mengatur alamat halaman website |
| Controller | Mengatur proses logika aplikasi |
| Model | Menghubungkan aplikasi dengan tabel database |
| Migration | Membuat struktur tabel MySQL |
| Blade View | Menampilkan halaman website |
| Middleware Auth | Melindungi halaman admin |

### Route yang Dirancang

| URL | Akses | Keterangan |
| --- | --- | --- |
| `/` | Pengunjung | Halaman home |
| `/menu` | Pengunjung | Halaman daftar menu |
| `/login` | Admin | Halaman login admin |
| `/admin/dashboard` | Admin | Dashboard admin |
| `/admin/menu` | Admin | Halaman kelola menu |
| `/admin/menu/create` | Admin | Form tambah menu |
| `/admin/menu/{id}/edit` | Admin | Form edit menu |

## M. Alur Penggunaan Sistem

### 1. Alur Admin

1. Admin membuka halaman login.
2. Admin memasukkan email dan password.
3. Sistem memverifikasi data login.
4. Admin masuk ke dashboard.
5. Admin mengelola data menu melalui halaman Kelola Menu.
6. Admin dapat menambah, mengubah, menghapus, dan mengatur ketersediaan menu.

### 2. Alur Pengunjung/User

1. Pengunjung membuka halaman website.
2. Pengunjung melihat halaman home.
3. Pengunjung membuka halaman menu.
4. Sistem menampilkan daftar menu yang tersedia.
5. Pengunjung melihat informasi nama menu, harga, dan deskripsi menu.

## N. Batasan Sistem

Batasan sistem pada perancangan ini adalah sebagai berikut:

- Sistem berfokus pada pengelolaan dan penampilan data menu.
- Sistem belum mencakup fitur pemesanan online.
- Sistem belum mencakup fitur pembayaran.
- Pengelolaan data hanya dapat dilakukan oleh admin.

## O. Output yang Diharapkan

Output yang diharapkan dari sistem ini adalah website informasi menu Omah Tengkleng Klangenan berbasis Laravel dan MySQL yang memiliki halaman pengunjung dan halaman admin. Admin dapat mengelola data menu secara terstruktur melalui fitur CRUD, sedangkan pengunjung dapat melihat daftar menu yang tersedia beserta harga dan deskripsinya.
