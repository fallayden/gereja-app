# [OPTIMIZATION] Plan Optimalisasi Codebase & Restrukturisasi Aplikasi GBIA Grammata

## 📌 Ringkasan Masalah & Tujuan
Setelah dilakukan refactoring penyederhanaan Admin Panel (menghapus modul profil & meng-hardcode data profil gereja), codebase memerlukan audit menyeluruh untuk memastikan struktur folder, dependensi, konfigurasi environment, serta kebersihan file tetap mengikuti **best practices** industri.

Tujuan utama issue ini adalah melakukan pembersihan (*clean-up*), penghapusan file/folder redundan, penyelarasan konvensi penamaan, dan optimasi konfigurasi environment agar aplikasi lebih ringan, cepat, dan mudah dipelihara.

---

## 📋 Area Fokus Optimalisasi

### 1. 📁 Struktur Folder & Best Practices
- [ ] **Pembersihan Storage Media**:
  - Hapus subfolder `storage/app/public/pastor/` dan `storage/app/public/branches/` karena aset gambar sudah dipindahkan ke `public/images/`.
  - Pastikan folder `storage/app/public/articles/` dan `storage/app/public/magazines/` tetap terjaga dengan izin akses yang sesuai (*symbolic link* `php artisan storage:link`).
- [ ] **Struktur Blade Views & Components**:
  - Pastikan seluruh reusable UI components terletak konsisten di `resources/views/components/`.
  - Struktur modul publik terpisah jelas: `resources/views/home/`, `resources/views/about/`, `resources/views/warta/`, dan `resources/views/pedang-roh/`.

---

### 2. 🧹 Penghapusan File & Modul Redundan (Dead Code Cleanup)
- [ ] **Hapus Legacy Models yang Unused**:
  - ❌ `app/Models/PastorProfile.php`
  - ❌ `app/Models/History.php`
  - ❌ `app/Models/Creed.php`
  - ❌ `app/Models/BranchChurch.php`
  - ❌ `app/Models/Schedule.php`
- [ ] **Hapus Legacy Seeders yang Unused**:
  - ❌ `database/seeders/PastorProfileSeeder.php`
  - ❌ `database/seeders/HistorySeeder.php`
  - ❌ `database/seeders/CreedSeeder.php`
  - ❌ `database/seeders/BranchChurchSeeder.php`
  - ❌ `database/seeders/ScheduleSeeder.php`
- [ ] **Sederhanakan Migrasi Database**:
  - Hapus atau arsipkan migrasi pembuat tabel profil (`create_pastor_profiles_table`, `create_histories_table`, `create_creeds_table`, `create_branch_churches_table`, `create_schedules_table`).
- [ ] **Hapus Sample/Default Tests**:
  - Hapus `tests/Feature/ExampleTest.php` dan `tests/Unit/ExampleTest.php` bawaan Laravel framework skeleton.

---

### 3. 🏷️ Konsistensi Penamaan File & Aset (Naming Conventions)
- [ ] **Penyelarasan Format & Penamaan Gambar di `public/images/`**:
  - Ubah ekstensi dan nama file di `public/images/` agar konsisten menggunakan format **WebP** atau **JPG** standar:
    - `gembala.jpg` ➔ `gembala.jpg`
    - `tunas-akon.jpeg` ➔ `tunas-akon.jpg` / `tunas-akon.webp`
    - `tunas-servant.jpeg` ➔ `tunas-servant.jpg` / `tunas-servant.webp`
    - `tunas-oka.jpeg` ➔ `tunas-oka.jpg` / `tunas-oka.webp`
- [ ] **Konsistensi Penamaan Controller & Resource**:
  - Seluruh Controller menggunakan `PascalCase` dengan suffix `Controller` (contoh: `WartaController`, `PedangRohController`, `AboutController`).
  - Seluruh Blade template menggunakan `kebab-case` (contoh: `branch-church-card.blade.php`, `magazine-card.blade.php`).

---

### 4. 📦 Audit Dependensi (Composer & NPM)
- [ ] **Composer (Backend)**:
  - Verifikasi bahwa `composer.json` hanya memuat package esensial: `laravel/framework`, `filament/filament`, `laravel/tinker`.
  - Jalankan `composer clear-cache` dan `composer dump-autoload -o` untuk optimasi autoloader PHP.
- [ ] **NPM / Node (Frontend)**:
  - Audit package `package.json`.
  - Evaluasi kebutuhan `@tailwindcss/postcss` vs `@tailwindcss/vite` di Tailwind CSS v4 untuk menghindari double processing stylesheet.
  - Pastikan `npm run build` menghasilkan aset terminifikasi tanpa error.

---

### 5. ⚙️ Evaluasi & Optimasi Konfigurasi Environment (`.env`)
- [ ] **Pembaruan Defaults `.env.example` & `.env`**:
  - `APP_NAME="GBIA GRAMMATA"`
  - `APP_TIMEZONE="Asia/Jakarta"`
  - `APP_LOCALE="id"`
  - `FILESYSTEM_DISK="public"`
- [ ] **Optimasi SQLite Database**:
  - Verifikasi konfigurasi database SQLite agar siap pakai tanpa perlu konfigurasi MySQL eksternal untuk kemudahan deployment.

---

## 🛠️ Rencana Eksekusi Tahapan
1. **Tahap 1**: Menghapus Model, Seeder, dan Migrasi redundan yang sudah tidak terpakai.
2. **Tahap 2**: Membersihkan folder storage `pastor` & `branches` serta menyelaraskan nama aset gambar.
3. **Tahap 3**: Mengupdate `.env` & `.env.example` dengan default lokasi Indonesia & nama aplikasi yang sesuai.
4. **Tahap 4**: Menguji ulang seluruh pengujian otomatis (`php artisan test`) untuk memastikan kestabilan aplikasi.