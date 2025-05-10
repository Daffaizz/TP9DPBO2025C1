# Janji
Saya Daffa Faiz Restu Oktavian dengan NIM 2309013 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program
Program ini menggunakan arsitektur Model-View-Presenter (MVP) untuk memisahkan logika bisnis, data, dan tampilan. Berikut adalah penjelasan komponen utama:

1. **Model**
   - Berisi kelas-kelas yang berhubungan dengan data dan database.
   - File terkait:
     - `DB.class.php`: Mengelola koneksi dan eksekusi query ke database.
     - `Mahasiswa.class.php`: Representasi data mahasiswa.
     - `TabelMahasiswa.class.php`: Berisi query untuk operasi CRUD pada tabel `mahasiswa`.

2. **View**
   - Bertanggung jawab untuk menampilkan data kepada pengguna.
   - File terkait:
     - `TampilMahasiswa.php`: Mengelola tampilan data mahasiswa dalam tabel.
     - Template HTML:
       - `form_create.html`: Form untuk menambahkan data mahasiswa.
       - `form_update.html`: Form untuk mengedit data mahasiswa.
       - `skin.html`: Template utama untuk menampilkan data mahasiswa.

3. **Presenter**
   - Menghubungkan model dan view, serta mengelola logika bisnis.
   - File terkait:
     - `ProsesMahasiswa.php`: Mengelola proses CRUD mahasiswa.
     - `KontrakPresenter.php`: Interface untuk presenter.

# Penjelasan Alur

1. **Menampilkan Data Mahasiswa**
   - File `index.php` memanggil `TampilMahasiswa` untuk mengambil data dari database melalui `ProsesMahasiswa`.
   - Data yang diambil ditampilkan dalam tabel menggunakan template `skin.html`.

2. **Menambahkan Data Mahasiswa**
   - File `create.php` memuat form dari `form_create.html`.
   - Setelah form disubmit, data dikirim ke `ProsesMahasiswa` untuk disimpan ke database melalui `TabelMahasiswa`.
   - Setelah berhasil, pengguna diarahkan kembali ke halaman utama (`index.php`).

3. **Mengedit Data Mahasiswa**
   - File `update.php` memuat data mahasiswa berdasarkan ID yang diterima dari URL.
   - Data ditampilkan dalam form `form_update.html`.
   - Setelah form disubmit, data diperbarui di database melalui `ProsesMahasiswa` dan `TabelMahasiswa`.
   - Setelah berhasil, pengguna diarahkan kembali ke halaman utama (`index.php`).

4. **Menghapus Data Mahasiswa**
   - File `index.php` menangani penghapusan data jika parameter `hapus` diterima dari URL.
   - Data dihapus dari database melalui `ProsesMahasiswa` dan `TabelMahasiswa`.
   - Setelah berhasil, pengguna diarahkan kembali ke halaman utama (`index.php`).

# Struktur Database
Tabel `mahasiswa` memiliki kolom-kolom berikut:
- `id` (int, primary key, auto increment)
- `nim` (varchar)
- `nama` (varchar)
- `tempat` (varchar)
- `tl` (date)
- `gender` (varchar)
- `email` (varchar)
- `telp` (varchar)

# Dokumentasi
