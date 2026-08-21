# [REFACTOR/ENHANCEMENT] Penyederhanaan Admin Panel: Menghapus Kelola Profil & Informasi Gereja (Dibuat Hardcode)

## 📌 Ringkasan Masalah & Tujuan
Saat ini, Admin Panel (Filament) memiliki fitur pengelola profil dan informasi gereja (Profil Pendeta, Sejarah, Pengakuan Iman, Cabang Gereja, dan Jadwal Ibadah). Namun, kebutuhan riil pengelola gereja hanya fokus pada publikasi berkala, yaitu **Warta Jemaat** dan **Majalah Pedang Roh**. 

Informasi profil gereja relatif statis dan jarang berubah. Oleh karena itu, fitur kelola profil & informasi di Admin Panel akan dihapus, dan data profil tersebut akan dipindahkan menjadi **hardcoded** langsung pada tampilan/blade view atau file konfigurasi statis.

---

## 🎯 Tujuan Utama
1. **Sederhanakan Admin Panel**: Menyoroti dan menyisakan hanya 2 modul utama di Filament Admin:
   - **Warta Jemaat** (`ArticleResource`)
   - **Majalah Pedang Roh** (`MagazineResource`)
2. **Pindahkan Data Profil ke Hardcode**: Mengubah konsumsi data pada halaman publik (Profil, Sejarah, Pengakuan Iman, Pendeta, Jadwal Ibadah, Cabang Gereja) dari database menjadi teks/komponen statis pada Blade templates.
3. **Optimasi & Efisiensi**: Mengurangi beban query database untuk data yang bersifat statis.

---

## 🛠️ Rincian Perubahan yang Diperlukan

### 1. Perubahan Admin Panel (Filament)
Hapus atau nonaktifkan modul-modul Resource berikut dari `app/Filament/Resources/`:
- ❌ `PastorProfileResource.php` & folder terkait
- ❌ `HistoryResource.php` & folder terkait
- ❌ `CreedResource.php` & folder terkait
- ❌ `BranchChurchResource.php` & folder terkait
- ❌ `ScheduleResource.php` & folder terkait

**Menyisakan:**
- ✅ `ArticleResource.php` (Warta Jemaat)
- ✅ `MagazineResource.php` (Majalah Pedang Roh)

---

### 2. Refactoring Halaman Publik (Blade Views & Controllers)
Ubah controller dan view publik agar tidak lagi melakukan fetch data profil dari database:
- **`AboutController.php` / `resources/views/about.blade.php`**:
  - Hapus query ke model `PastorProfile`, `History`, `Creed`, `BranchChurch`.
  - Tuliskan isi Sejarah, Pengakuan Iman, Daftar Pendeta, dan Cabang Gereja secara statis (hardcoded) dengan desain HTML/CSS yang rapi.
- **`HomeController.php` / `resources/views/home.blade.php`**:
  - Hapus query data Jadwal Ibadah dari database (`Schedule`).
  - Tuliskan informasi Jadwal Ibadah secara statis pada komponen UI yang sesuai.

---

### 3. Pembersihan Codebase (Opsional / Clean Up)
- Hapus Controller/Model/Migration yang tidak lagi digunakan jika tidak ada relasi ke modul Warta/Majalah:
  - Model & Migration: `PastorProfile`, `History`, `Creed`, `BranchChurch`, `Schedule`.
  - Hapus file seeder terkait jika ada.

---

## ✅ Rencana Pengujian & Verifikasi
1. **Admin Panel**: Login ke Filament Admin (`/admin`), pastikan navigasi sidebar hanya menampilkan modul **Warta Jemaat** dan **Majalah Pedang Roh**.
2. **Halaman Publik**:
   - Buka Halaman Utama (`/`) dan Halaman Tentang (`/tentang`).
   - Pastikan seluruh informasi profil (Sejarah, Visi Misi/Pengakuan Iman, Pendeta, Jadwal Ibadah, Cabang Gereja) tampil dengan lengkap, rapi, dan responsif.
   - Pastikan tidak ada error 500 / *undefined variable* akibat query database yang dihapus.
