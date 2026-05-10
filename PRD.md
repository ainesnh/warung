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
    Admin bertugas mengelola data menu, mengatur ketersediaan menu, dan mengatur data user.

### 2. User/Karyawan
    User/Karyawan bertugas mengelola data ketersediaan menu.

### 3. Pengunjung
    Pengunjung dapat melihat informasi menu, harga, dan detail menu yang tersedia pada website.

## E. Rancangan Fitur

### 1. Dashboard Admin
    Dashboard Admin menampilkan halaman utama bagi admin yang berfungsi untuk menampilkan ringkasan informasi sistem, seperti jumlah menu, jumlah menu tersedia, dan jumlah menu tidak tersedia.

### 2. CRUD Menu
    Fitur ini digunakan untuk mengelola data menu yang dijual. Admin dapat melakukan hal berikut:
    - Menambah menu baru.
    - Melihat daftar menu.
    - Mengubah data menu.
    - Menghapus data menu.
    Data menu yang dikelola meliputi nama menu, kategori, harga, deskripsi, gambar, dan status ketersediaan.

### 3. Login 
    Fitur login digunakan untuk mengamankan sistem sehingga hanya admin dan user/karyawan yang dapat mengakses fitur pengelolaan data.

### 4. Halaman Home Pengunjung
    Halaman ini menampilkan Banner Utama dan Highlight Card Menu Special pada hari itu.

### 5. Halaman Menu Pengunjung
    Halaman ini menampilkan daftar menu makanan dan minuman yang tersedia beserta harga dan deskripsinya, sehingga memudahkan pelanggan dalam melihat pilihan menu.

## F. Struktur Menu

### 1. Menu Pengunjung
    - Home
    - Menu

### 2. Menu Admin
    - Dashboard
    - Menu
    - User

## G. Kebutuhan Data
    Data utama yang dibutuhkan dalam sistem ini adalah data menu dan data user. Seluruh data disimpan di database MySQL.

### Data Menu
    | Nama Field    |           Keterangan              |
    | ------------- | --------------------------------- |
    | id            | Kode unik menu (Primary Key)      |
    | nama_menu     | Nama makanan atau minuman         |
    | kategori      | Jenis menu (Makanan/Minuman)      |
    | harga         | Harga menu dalam format numerik   |
    | deskripsi     | Penjelasan singkat tentang menu   |
    | gambar        | Path/lokasi file foto menu        |
    | status        | Status ketersediaan               |
    | created_by    | Akun yang membuat data            |
    | updated_by    | Akun yang memperbaharui data      |
    | is_special    | Penanda menu unggulan             |
    | created_at    | Waktu data dibuat                 |
    | updated_at    | Waktu data diperbarui             |

### Data UserRole
    | Nama Field            |           Keterangan          |
    | --------------------- | ----------------------------- |
    | id                    | Kode unik userrole            |
    | nama_role             | Nama role                     |
    | keterangan            | Keterangan role               |
    | created_at            | Waktu data dibuat             |
    | updated_at            | Waktu data diperbarui         |

### Data User
    | Nama Field            |           Keterangan          |
    | --------------------- | ----------------------------- |
    | id                    | Kode unik user                |
    | name                  | Nama admin                    |
    | email                 | Email untuk login             |
    | email_verified_at     | -                             |
    | password              | Password terenkripsi (Hash)   |
    | role_id               | Role user                     |
    | is_active             | Status keaktifan user         |
    | remember_token        | -                             |
    | created_at            | Waktu data dibuat             |
    | updated_at            | Waktu data diperbarui         |

## H. Kebutuhan Teknologi
    Sistem ini dirancang menggunakan teknologi berikut:
    | Komponen              |               Teknologi               |
    | --------------------- | ------------------------------------- |
    | Framework             | Laravel                               |
    | Bahasa Pemrograman    | PHP                                   |
    | Database              | MySQL                                 |
    | Frontend              | Blade Template, HTML, CSS, JavaScript |
    | Styling Admin         | AdminLTE                              |
    | Web Server Lokal      | XAMPP atau server Laravel artisan     |
    | Autentikasi           | Laravel Authentication                |
    Laravel digunakan untuk mengelola routing, controller, model, view, validasi, autentikasi login, dan proses CRUD data menu. MySQL digunakan sebagai tempat penyimpanan data.

## I. Kebutuhan Fungsional
    Kebutuhan fungsional sistem adalah sebagai berikut:
    - Sistem dapat menampilkan halaman home untuk pengunjung.
    - Sistem dapat menampilkan daftar menu yang tersedia kepada pengunjung.
    - Sistem dapat menampilkan informasi harga dan deskripsi menu.
    - Sistem dapat menyediakan halaman login admin/user.
    - Sistem dapat membatasi akses halaman admin hanya untuk pengguna yang sudah login.
    - Sistem dapat menampilkan dashboard admin.
    - Sistem dapat menambahkan data menu baru.
    - Sistem dapat menampilkan daftar seluruh data menu.
    - Sistem dapat mengubah data menu.
    - Sistem dapat menghapus data menu.
    - Sistem dapat mengatur status ketersediaan menu.

## J. Kebutuhan Non-Fungsional
    Kebutuhan non-fungsional sistem adalah sebagai berikut:
    - Website mudah digunakan oleh admin/user dan pengunjung.
    - Data menu tersimpan dengan rapi di database.
    - Halaman admin dilindungi dengan autentikasi login.
    - Informasi menu dapat diakses dengan cepat oleh pengunjung.
    - Sistem menggunakan database MySQL untuk menyimpan data secara terstruktur.
    - Sistem dibangun menggunakan Laravel agar pengembangan lebih rapi dengan pola MVC.

## K. Rancangan Database MySQL

### 1. Tabel users
    Tabel `users` digunakan untuk menyimpan data admin yang dapat login ke sistem.
    | Field             |   Tipe Data   |       Keterangan          |
    | ----------------- | ------------- | ------------------------- |
    | id                | BIGINT=       | Primary key               |
    | name              | VARCHAR(255)  | Nama admin                |
    | email             | VARCHAR(255)  | Email admin               |
    | email_verified_at | TIMESTAMP     | -                         |
    | password          | VARCHAR(255)  | Password terenkripsi      |
    | role_id           | SMALLINT(5)   | Role user                 |
    | is_active         | TINYINT(1)    | Status keaktifan user     |
    | remember_token    | VARCHAR(100)  | -                         |
    | created_at        | TIMESTAMP     | Waktu data dibuat         |
    | updated_at        | TIMESTAMP     | Waktu data diperbarui     |

### 3. Tabel UserRole
    Tabel `userrole` digunakan untuk menyimpan data master role ke sistem.
    | Nama Field            |   Tipe Data    |      Keterangan          |
    | --------------------- | -------------- |------------------------- |
    | id                    | SMALLINT(5)    | Kode unik userrole       |
    | nama_role             | VARCHAR(255)   | Nama role                |
    | keterangan            | VARCHAR(255)   | Keterangan role          |
    | created_at            | TIMESTAMP      | Waktu data dibuat        |
    | updated_at            | TIMESTAMP      | Waktu data diperbarui    |

### 2. Tabel menus
    Tabel `menus` digunakan untuk menyimpan data menu makanan dan minuman.
    | Field      |   Tipe Data  |   Null    |   Keterangan              |
    | ---------- | ------------ | --------- | ------------------------- |
    | id         | SMALLINT(5)  | No        | Primary key               |
    | nama_menu  | VARCHAR(255) | No        | Nama makanan/minuman      |
    | kategori   | VARCHAR(100) | No        | Makanan atau Minuman      |
    | harga      | DECIMAL(10,2)| No        | Harga menu                |
    | deskripsi  | TEXT         | Yes       | Penjelasan detail menu    |
    | gambar     | VARCHAR(255) | Yes       | Path/lokasi file foto menu|
    | status     | TINYINT(1)   | No        | Status ketersediaan harian|
    | created_by | VARCHAR(255) | Yes       | Akun yang membuat data    |
    | updated_by | VARCHAR(255) | Yes       | Akun yang update data     |
    | is_special | TINYINT(1)   | No        | Penanda menu spesial      |
    | created_at | TIMESTAMP    | Yes       | Waktu data dibuat         |
    | updated_at | TIMESTAMP    | Yes       | Waktu data diupdate       |

## L. Rancangan Laravel
    Rancangan struktur Laravel yang digunakan dalam sistem ini adalah sebagai berikut:
    | Komponen Laravel  |                  Fungsi                   |
    | ----------------- | ----------------------------------------- |
    | Route             | Mengatur alamat halaman website           |
    | Controller        | Mengatur proses logika aplikasi           |
    | Model             | Menghubungkan aplikasi ke tabel database  |
    | Migration         | Membuat struktur tabel MySQL              |
    | Blade View        | Menampilkan halaman website               |
    | Middleware Auth   | Melindungi halaman admin                  |

### Route yang Dirancang
    | URL                                  | Akses       | Keterangan                          |
    | ------------------------------------ | ----------- | ----------------------------------- |
    | `/`                                  | Pengunjung  | Halaman home                        |
    | `/menu`                              | Pengunjung  | Halaman daftar menu                 |
    | `/login`                             | Guest/Admin | Halaman login admin                 |
    | `/logout`                            | Admin       | Proses logout admin                 |
    | `/admin/dashboard`                   | Admin       | Dashboard admin                     |
    | `/admin/menus`                       | Admin       | Halaman kelola menu                 |
    | `/admin/menus/create`                | Admin       | Form tambah menu                    |
    | `/admin/menus/{menu}/edit`           | Admin       | Form edit menu                      |
    | `/admin/menus/{menu}/toggle-status`  | Admin       | Mengubah status menu tersedia/tidak |
    | `/admin/menus/{menu}/toggle-special` | Admin       | Mengubah status menu spesial        |
    | `/admin/menus/{menu}/deactivate`     | Admin       | Menonaktifkan menu                  |
    | `/admin/users`                       | Admin       | Halaman kelola user                 |
    | `/admin/users/create`                | Admin       | Form tambah user                    |
    | `/admin/users/{user}/edit`           | Admin       | Form edit user                      |
    | `/admin/users/{user}/deactivate`     | Admin       | Menonaktifkan user                  |
    | `/admin/users/{user}/archive`        | Admin       | Mengarsipkan user                   |
    | `/admin/users/{user}/restore`        | Admin       | Mengembalikan user dari arsip       |

## M. Alur Penggunaan Sistem

### 1. Alur Admin
    1. Admin membuka halaman login.
    2. Admin memasukkan email dan password.
    3. Sistem memverifikasi data login.
    4. Admin masuk ke dashboard.
    5. Admin mengelola data menu (menambah, mengubah, menghapus, dan mengatur ketersediaan menu) melalui halaman Menu.
    6. Admin mengelola data user (menambah, mengubah, menghapus) melalui halaman User.

### 2. Alur User
    1. Admin membuka halaman login.
    2. Admin memasukkan email dan password.
    3. Sistem memverifikasi data login.
    4. Admin masuk ke dashboard.
    5. Admin mengelola data ketersediaan menu melalui halaman Menu.

### 3. Alur Pengunjung
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
