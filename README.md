# TO2 Karang Taruna

Aplikasi manajemen Karang Taruna untuk mengelola anggota, program kerja, keuangan, dan jadwal kegiatan.

> **Jenis proyek:** Praktikum / Tugas Kuliah

## Ringkasan

TO2 Karang Taruna adalah aplikasi organisasi yang saya bangun sebagai tugas praktikum untuk mengelola kegiatan Karang Taruna Hidayah. Aplikasi ini mencakup data anggota beserta jabatan, program kerja beserta anggaran dan target peserta, serta catatan keuangan pemasukan dan pengeluaran. Anggota dapat mengikuti kegiatan dan bergabung ke program, sedangkan admin dapat menambah, mengubah, dan menghapus data. Seluruh data disimpan di MySQL dan hak akses dibedakan berdasarkan peran admin dan anggota.

## Fitur

- Registrasi anggota dengan jabatan, nomor telepon, dan alamat, serta login memakai email dan peran yang dipilih (`register.php`, `login.php`).
- Dashboard menampilkan ringkasan jumlah anggota, program kerja, kegiatan, dan saldo kas (`dashboard.php`).
- Manajemen anggota dengan pencarian berdasarkan nama atau email, tambah anggota, dan hapus anggota (`members.php`, `member_add.php`).
- Daftar program kerja dengan kategori, periode, target peserta, anggaran, dan status program (`programs.php`).
- Anggota dapat bergabung ke program yang belum berstatus selesai (`program_join.php`).
- Jadwal kegiatan lengkap dengan jumlah peserta, batas kuota, status kegiatan, dan aksi mengikuti (`events.php`, `event_join.php`).
- Laporan keuangan dengan filter rentang tanggal dan jenis transaksi, tambah transaksi, serta saldo otomatis (`finance.php`, `finance_add.php`).
- Pengubahan profil anggota termasuk pembaruan nomor telepon, alamat, jabatan, dan penggantian password (`profile.php`).

## Teknologi

![PHP](https://img.shields.io/badge/PHP-777BB4%20warna?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-4479A1%20warna?style=for-the-badge&logo=mysql)
![HTML](https://img.shields.io/badge/HTML-E34F26%20warna?style=for-the-badge&logo=html5)
![CSS](https://img.shields.io/badge/CSS-1572B6%20warna?style=for-the-badge&logo=css3)
![Session](https://img.shields.io/badge/Session-4F5D95%20warna?style=for-the-badge)

## Cara Menjalankan

Aplikasi ini berjalan di lingkungan XAMPP dengan PHP dan MySQL lokal.

1. Salin/duplikasi folder ke `C:\xampp\htdocs\TO2Karangtaruna\`
2. Jalankan Apache + MySQL dari XAMPP Control Panel
3. Buka http://localhost/phpmyadmin, buat database dengan nama `karangtaruna`, lalu buat database secara manual sesuai tabel yang dipakai di kode. Repo ini tidak menyertakan berkas `.sql` yang dapat diimport.
4. Sesuaikan kredensial di `config.php` (host, user, password, nama database)
5. Buka http://localhost/TO2Karangtaruna/ di browser

Tabel yang dipakai di kode: `users`, `programs`, `program_participants`, `events`, `event_participants`, `finance`.

## Struktur Proyek

```
TO2Karangtaruna/
├── config.php
├── dashboard.php
├── event_join.php
├── events.php
├── finance.php
├── finance_add.php
├── footer.php
├── header.php
├── index.php
├── login.php
├── logout.php
├── member_add.php
├── members.php
├── profile.php
├── program_join.php
├── programs.php
├── register.php
└── style.css
```

## Catatan

- Kredensial database ditulis langsung di `config.php` dengan user `root` dan password kosong (default XAMPP). Untuk deployment nyata, kredensial sebaiknya dipindahkan ke environment variable atau file konfigurasi di luar repo.
- Beberapa tautan pada halaman daftar mengarah ke berkas yang belum tersedia di repo: `event_add.php`, `event_view.php`, `event_edit.php`, `member_edit.php`, `program_add.php`, `program_view.php`, `program_edit.php`, dan `finance_edit.php`.
- Peran yang dipakai di kode hanya `admin` dan `anggota`. Nilai bawaan `guest` pada `get_role()` berlaku bila session belum berisi peran.
- Pendaftaran mandiri mengizinkan pemilihan peran admin. Untuk penggunaan produksi, pembatasan peran saat pendaftaran perlu ditambahkan.
- Query SQL dibangun dengan interpolasi string dari nilai `clean_input()`. Untuk penggunaan produksi, statement yang sama sebaiknya dipindahkan ke prepared statement.

## Lisensi

MIT License — lihat [LICENSE](LICENSE)
