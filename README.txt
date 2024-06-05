; ======================================== ;
;  CARA MENJALANKAN WEBSITE RODAZA CLINIC  ;
; ======================================== ;
; Anggota Kelompok :			           ;
; 140810230008 - Robby Azwan Saputra	   ;
; 140810230014 - Muhammad Zahran Muntazar  ;
; 140810230022 - Dafa Ghani Abdul Rabbani  ;
; ======================================== ;

Berikut penjelasan konfigurasi agar bisa mencoba website RoDaZa Clinic.

1. Unzip folder project ini (atau clone dari repository).

2. Pada MySQL (atau SQL lain sesuai pada desktop), silahkan buat sebuah database sesuai keinginan (misal rodaza_clinic).

3. Buka Visual Studio Code, lalu pilih folder yang sudah diekstrak.

4. Pastikan Composer dan Laravel sudah terinstall pada desktop.

5. Jalankan perintah 'composer update' pada terminal.

6. Pada file .env, atur nama database dan nama user sesuai database yang ingin digunakan (apabila file .env belum ada, jalankan perintah 'cp .env.example .env' pada terminal).
   Contoh :
   DB_CONNECTION=MySQL
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=rodaza_clinic
   DB_USERNAME=root           //sesuaikan dengan nama user pada desktop
   DB_PASSWORD=password_anda  //apabila password tidak di-set, kosongkan

7. Jalankan perintah 'php artisan migrate:fresh' pada terminal.

8. Pada MySQL (atau SQL lain sesuai pada desktop), jalankan query berikut :

                                                   -- Query Pertama--
   INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
   (1, 'asepinjeksi@gmail.com', NULL, '$2y$12$Pz2t/5yUsMvE/oFfhEzeueT5a4p.5RszhKx.G8ltPh6Vx2kaXk8jm', 'dokter', NULL, '2024-05-29 06:20:43', '2024-05-29 06:20:43'),
   (2, 'firmanspakbor@gmail.com', NULL, '$2y$12$O1SRs3/UWnv6wXQGbqjs9ura2PUu5JwRQYLqtjlTar7iK5Vx710Mu', 'dokter', NULL, '2024-05-29 07:58:00', '2024-05-29 07:58:00'),
   (3, 'dadangturbo@gmail.com', NULL, '$2y$12$PTPycUQncL8ROy8NdcvRceFr2Sbyn8/YgnCl7jZDvsMOoGDiFdLrq', 'dokter', NULL, '2024-05-29 08:01:55', '2024-05-29 08:01:55'),
   (4, 'sintaknalpot@gmail.com', NULL, '$2y$12$diIzC544PvyjM0lUCVSbyuvPEOvJXq7Mru/PVoiRagHPUehMH6hUO', 'dokter', NULL, '2024-05-29 08:02:22', '2024-05-29 08:02:22'),
   (5, 'ucupremot@gmail.com', NULL, '$2y$12$kxN0WKXbQjzOH6Whrn55VOYFCw.5Qp84k//xpsPPVlF0NX4IvFFB.', 'dokter', NULL, '2024-05-29 08:04:51', '2024-05-29 08:04:51'),
   (6, 'linaklakson@gmail.com', NULL, '$2y$12$cGhsuo0bow2VGwf37lyrf.3sgnAO1RT64HlmaD3qQDOUWjI4c4.Dq', 'dokter', NULL, '2024-05-29 08:05:39', '2024-05-29 08:05:39'),
   (7, 'tutiember@gmail.com', NULL, '$2y$12$3B2s5JG9R7BsShyJAU2qwu34HD/e4PCWqnBU7vFMBO70uE0oJqEty', 'dokter', NULL, '2024-05-29 08:06:45', '2024-05-29 08:06:45'),
   (8, 'riribaskom@gmail.com', NULL, '$2y$12$5okIDe4Xv2HRjraVPHPXEeKkA5/97szPHMIkInenRf4PP0Bx9K5KC', 'dokter', NULL, '2024-05-29 08:07:58', '2024-05-29 08:07:58'),
   (9, 'dafabohlam@gmail.com', NULL, '$2y$12$NDnig5DMhKXe7c.8B2V7oO4LGiDddLalTHS8l2hA2wjPxvf/LyS6e', 'dokter', NULL, '2024-05-29 08:08:44', '2024-05-29 08:08:44'),
   (10, 'jonikabel@gmail.com', NULL, '$2y$12$S057AQMQnPN.8nX521hiZ.DTazobW9/UK/U.t02RIblxfSOkpM7OO', 'dokter', NULL, '2024-05-29 08:09:34', '2024-05-29 08:09:34');

                                                   -- Query Kedua--
   INSERT INTO `dokter` (`id_dokter`, `nama`, `slug`, `spesialis`, `no_telepon`, `email`, `created_at`, `updated_at`) VALUES
   ('D0001', 'Asep Injeksi', 'asep-injeksi', 'THT', '083476518965', 'asepinjeksi@gmail.com', NULL, NULL),
   ('D0002', 'Dadang Turbo', 'dadang-turbo', 'Anak', '086451218575', 'dadangturbo@gmail.com', NULL, NULL),
   ('D0003', 'Firman Spakbor', 'firman-spakbor', 'Mata', '089054721432', 'firmanspakbor@gmail.com', NULL, NULL),
   ('D0004', 'Lina Klakson', 'lina-klakson', 'Dermatologi', '082284513290', 'linaklakson@gmail.com', NULL, NULL),
   ('D0005', 'Sinta Knalpot', 'sinta-knalpot', 'Jantung', '081234216784', 'sintaknalpot@gmail.com', NULL, NULL),
   ('D0006', 'Ucup Remot', 'ucup-remot', 'Ortopedi', '081126517623', 'ucupremot@gmail.com', NULL, NULL),
   ('D0007', 'Dafa Bohlam', 'dafa-bohlam', 'Saraf', '089179381094', 'dafabohlam@gmail.com', NULL, NULL),
   ('D0008', 'Joni Kabel', 'joni-kabel', 'Bedah', '083225418094', 'jonikabel@gmail.com', NULL, NULL),
   ('D0009', 'Riri Baskom', 'riri-baskom', 'Gigi', '081321056453', 'riribaskom@gmail.com', NULL, NULL),
   ('D0010', 'Tuti Ember', 'tuti-ember', 'Paru-Paru', '085176913377', 'tutiember@gmail.com', NULL, NULL);

                                                   -- Query Ketiga--
   INSERT INTO `ruangan` (`id`, `lantai`, `jenis_ruangan`, `luas`, `status`, `created_at`, `updated_at`) VALUES
   (1, 1, 'Ruang Pemeriksaan', 242.83, 'tersedia', '2024-05-26 01:20:07', '2024-05-26 01:20:07'),
   (2, 1, 'Ruang Pemeriksaan', 232.75, 'tersedia', '2024-05-26 01:20:07', '2024-05-26 01:20:07'),
   (3, 1, 'Ruang Konsultasi', 137.47, 'tersedia', '2024-05-26 01:20:07', '2024-05-26 01:20:07'),
   (4, 2, 'Ruang Perawatan', 103.78, 'tersedia', '2024-05-26 01:20:07', '2024-05-26 01:20:07'),
   (5, 2, 'Ruang Konsultasi', 169.01, 'tersedia', '2024-05-26 01:20:07', '2024-05-26 01:20:07');

9. Setelah itu, jalankan perintah 'php artisan serve', lalu klik link yang ada pada terminal.

10. Untuk mencoba menggunakan fitur pada user pasien, silakan ke laman register, dan buat sebuah akun sesuai keinginan, kemudian login dengan akun tersebut.

11. Untuk mencoba menggunakan fitur pada user dokter, silakan untuk login dengan akun pasien yang sudah tersedia di database (password default adalah 12345678, apabila gagal login, silakan ubah password pada user dengan role 'dokter' sesuai keinginan).

; ============================================= ;
;  PENJELASAN FITUR PADA WEBSITE RODAZA CLINIC  ;
; ============================================= ;

Fitur yang bisa digunakan oleh user pada website RoDaZa Clinic tergantung pada role-nya.

1. ROLE DOKTER
   Role 'dokter' dapat melakukan hal berikut :
   - Membaca data konsultasi yang sesuai dengan dokter tersebut.
   - Menerima/menolak konsultasi yang masuk.
   - Mengedit data konsultasi yang masuk.

2. ROLE PASIEN
   Role 'pasien' dapat melakukan hal berikut :
   - Membuat data konsultasi baru
   - Mengedit data konsultasi yang sudah dibuat.
   - Menghapus data konsultasi yang sudah dibuat.
