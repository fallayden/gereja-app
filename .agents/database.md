# Database Schema — GBIA GRAMMATA Website

> Dokumen ini mendefinisikan seluruh tabel, kolom, tipe data, dan relasi database.  
> Digunakan sebagai panduan saat membuat migration dan model Laravel.

---

## Informasi Umum

- **Engine:** MySQL 8.0
- **Database Name:** `gbia_grammata`
- **Charset:** `utf8mb4`
- **Collation:** `utf8mb4_unicode_ci`
- **Timestamp:** Semua tabel menggunakan `created_at` dan `updated_at` (Laravel timestamps).

---

## Diagram Relasi (ERD Simplified)

```
┌──────────────┐
│   schedules  │  (standalone)
└──────────────┘

┌──────────────┐       ┌──────────────────────┐
│   articles   │──1:N──│  article_attachments  │
└──────────────┘       └──────────────────────┘

┌──────────────┐
│   magazines  │  (standalone)
└──────────────┘

┌──────────────┐
│  histories   │  (standalone)
└──────────────┘

┌────────────────┐
│ branch_churches│  (standalone)
└────────────────┘

┌──────────────┐
│    creeds    │  (standalone)
└──────────────┘

┌─────────────────┐
│ pastor_profiles │  (standalone)
└─────────────────┘

┌──────────────┐
│    users     │  (Laravel default, untuk admin panel)
└──────────────┘
```

---

## Tabel Detail

### 1. `schedules` — Jadwal Ibadah

| Kolom         | Tipe           | Nullable | Keterangan                          |
|---------------|----------------|----------|-------------------------------------|
| `id`          | `bigint` (PK)  | No       | Auto increment                      |
| `name`        | `varchar(255)` | No       | Nama ibadah (e.g., "Kebaktian Umum")|
| `day`         | `varchar(50)`  | No       | Hari (e.g., "Minggu")              |
| `start_time`  | `time`         | No       | Jam mulai (e.g., 09:30)            |
| `end_time`    | `time`         | No       | Jam selesai (e.g., 11:00)          |
| `location`    | `varchar(255)` | Yes      | Lokasi spesifik (jika berbeda)     |
| `note`        | `text`         | Yes      | Catatan tambahan (e.g., "Minggu ke-4")|
| `sort_order`  | `tinyint`      | No       | Urutan tampil, default 0           |
| `is_active`   | `boolean`      | No       | Aktif/nonaktif, default true       |
| `created_at`  | `timestamp`    | Yes      | Laravel timestamp                   |
| `updated_at`  | `timestamp`    | Yes      | Laravel timestamp                   |

**Index:** `sort_order` (untuk ordering).  
**Seed data:** 4 jadwal statis sesuai ui-spec.md.

---

### 2. `articles` — Warta Jemaat (Blog Post)

| Kolom          | Tipe            | Nullable | Keterangan                            |
|----------------|-----------------|----------|---------------------------------------|
| `id`           | `bigint` (PK)   | No       | Auto increment                        |
| `title`        | `varchar(255)`  | No       | Judul warta                           |
| `slug`         | `varchar(255)`  | No       | URL-friendly slug, unique             |
| `excerpt`      | `text`          | Yes      | Cuplikan singkat untuk list view      |
| `body`         | `longtext`      | No       | Isi lengkap warta (HTML/Markdown)     |
| `thumbnail`    | `varchar(500)`  | Yes      | Path gambar thumbnail                 |
| `published_at` | `datetime`      | Yes      | Tanggal publikasi (null = draft)      |
| `is_featured`  | `boolean`       | No       | Ditampilkan di highlight, default false|
| `created_at`   | `timestamp`     | Yes      | Laravel timestamp                     |
| `updated_at`   | `timestamp`     | Yes      | Laravel timestamp                     |

**Index:** `slug` (unique), `published_at` (desc, untuk sorting).  
**Scope:** `published` — hanya yang `published_at` <= now.

---

### 3. `article_attachments` — Lampiran PDF Warta

| Kolom         | Tipe            | Nullable | Keterangan                            |
|---------------|-----------------|----------|---------------------------------------|
| `id`          | `bigint` (PK)   | No       | Auto increment                        |
| `article_id`  | `bigint` (FK)   | No       | Relasi ke `articles.id`               |
| `file_name`   | `varchar(255)`  | No       | Nama file asli                        |
| `file_path`   | `varchar(500)`  | No       | Path di storage                       |
| `file_size`   | `int unsigned`  | Yes      | Ukuran file dalam bytes               |
| `created_at`  | `timestamp`     | Yes      | Laravel timestamp                     |
| `updated_at`  | `timestamp`     | Yes      | Laravel timestamp                     |

**Foreign Key:** `article_id` → `articles.id` (cascade delete).  
**Catatan:** Setiap warta bisa punya 0–N lampiran PDF. 4 PDF terakhir ditampilkan di "Arsip Warta".

---

### 4. `magazines` — Edisi Majalah Pedang Roh

| Kolom         | Tipe            | Nullable | Keterangan                            |
|---------------|-----------------|----------|---------------------------------------|
| `id`          | `bigint` (PK)   | No       | Auto increment                        |
| `title`       | `varchar(255)`  | No       | Judul edisi (e.g., "Edisi 126")      |
| `edition`     | `varchar(50)`   | No       | Nomor edisi                           |
| `year`        | `smallint`      | No       | Tahun terbit (e.g., 2024)            |
| `month`       | `tinyint`       | Yes      | Bulan terbit (1–12)                  |
| `cover_path`  | `varchar(500)`  | Yes      | Path gambar cover (rasio 3:4 / A4)   |
| `file_path`   | `varchar(500)`  | Yes      | Path file PDF majalah                |
| `description` | `text`          | Yes      | Deskripsi singkat edisi               |
| `created_at`  | `timestamp`     | Yes      | Laravel timestamp                     |
| `updated_at`  | `timestamp`     | Yes      | Laravel timestamp                     |

**Index:** `year` (untuk filter dropdown), `edition` (unique).  
**Catatan:** ~126 edisi (2005–2026). Butuh pagination (per 12 item).

---

### 5. `histories` — Timeline Sejarah Gereja

| Kolom         | Tipe            | Nullable | Keterangan                            |
|---------------|-----------------|----------|---------------------------------------|
| `id`          | `bigint` (PK)   | No       | Auto increment                        |
| `year`        | `smallint`      | No       | Tahun peristiwa                       |
| `title`       | `varchar(255)`  | No       | Judul singkat                         |
| `description` | `text`          | No       | Deskripsi peristiwa                   |
| `sort_order`  | `tinyint`       | No       | Urutan tampil pada timeline           |
| `created_at`  | `timestamp`     | Yes      | Laravel timestamp                     |
| `updated_at`  | `timestamp`     | Yes      | Laravel timestamp                     |

**Index:** `sort_order`.  
**Seed:** Data statis dari arsip sejarah gereja.

---

### 6. `branch_churches` — Tunas Jemaat

| Kolom         | Tipe            | Nullable | Keterangan                            |
|---------------|-----------------|----------|---------------------------------------|
| `id`          | `bigint` (PK)   | No       | Auto increment                        |
| `name`        | `varchar(255)`  | No       | Nama gereja tunas                     |
| `pastor_name` | `varchar(255)`  | No       | Nama pendeta penanggung jawab         |
| `photo`       | `varchar(500)`  | Yes      | Path foto gereja                      |
| `address`     | `text`          | Yes      | Alamat lengkap                        |
| `sort_order`  | `tinyint`       | No       | Urutan tampil                         |
| `created_at`  | `timestamp`     | Yes      | Laravel timestamp                     |
| `updated_at`  | `timestamp`     | Yes      | Laravel timestamp                     |

**Seed:** 3 lokasi tunas jemaat.

---

### 7. `creeds` — Butir Pengakuan Iman

| Kolom         | Tipe            | Nullable | Keterangan                            |
|---------------|-----------------|----------|---------------------------------------|
| `id`          | `bigint` (PK)   | No       | Auto increment                        |
| `number`      | `tinyint`       | No       | Nomor butir (1–31)                   |
| `title`       | `varchar(255)`  | No       | Judul/kalimat awal butir             |
| `content`     | `text`          | No       | Isi lengkap penjelasan                |
| `sort_order`  | `tinyint`       | No       | Urutan tampil (biasanya = number)    |
| `created_at`  | `timestamp`     | Yes      | Laravel timestamp                     |
| `updated_at`  | `timestamp`     | Yes      | Laravel timestamp                     |

**Seed:** 31 butir pengakuan iman.  
**UI:** Ditampilkan sebagai accordion.

---

### 8. `pastor_profiles` — Profil Gembala

| Kolom         | Tipe            | Nullable | Keterangan                            |
|---------------|-----------------|----------|---------------------------------------|
| `id`          | `bigint` (PK)   | No       | Auto increment                        |
| `name`        | `varchar(255)`  | No       | Nama lengkap gembala                  |
| `title`       | `varchar(255)`  | Yes      | Gelar/jabatan                         |
| `greeting`    | `text`          | No       | Kata sambutan (teks panjang, serif)   |
| `photo`       | `varchar(500)`  | Yes      | Path foto keluarga gembala            |
| `is_active`   | `boolean`       | No       | Gembala aktif saat ini                |
| `created_at`  | `timestamp`     | Yes      | Laravel timestamp                     |
| `updated_at`  | `timestamp`     | Yes      | Laravel timestamp                     |

**Catatan:** Biasanya hanya 1 record aktif.

---

### 9. `users` — Admin (Laravel Default)

| Kolom              | Tipe            | Nullable | Keterangan                     |
|--------------------|-----------------|----------|--------------------------------|
| `id`               | `bigint` (PK)   | No       | Auto increment                 |
| `name`             | `varchar(255)`  | No       | Nama admin                     |
| `email`            | `varchar(255)`  | No       | Email login, unique            |
| `email_verified_at`| `timestamp`     | Yes      | Verifikasi email               |
| `password`         | `varchar(255)`  | No       | Hashed password                |
| `remember_token`   | `varchar(100)`  | Yes      | Remember me token              |
| `created_at`       | `timestamp`     | Yes      | Laravel timestamp              |
| `updated_at`       | `timestamp`     | Yes      | Laravel timestamp              |

**Catatan:** Tabel bawaan Laravel. Digunakan untuk admin panel (fase selanjutnya).

---

## Catatan Migrasi

- Setiap tabel dibuat via `php artisan make:migration`.
- Nama file migration mengikuti konvensi: `yyyy_mm_dd_hhmmss_create_<table>_table.php`.
- Foreign key harus dibuat setelah tabel induk di-migrate.
- Gunakan `$table->foreignId('article_id')->constrained()->cascadeOnDelete()` untuk FK.

## Catatan Seeder

| Seeder              | Data                                      |
|---------------------|-------------------------------------------|
| `ScheduleSeeder`    | 4 jadwal ibadah tetap                     |
| `HistorySeeder`     | Event-event sejarah gereja                |
| `BranchChurchSeeder`| 3 tunas jemaat                            |
| `CreedSeeder`       | 31 butir pengakuan iman                   |
| `PastorProfileSeeder`| 1 profil gembala aktif                   |
| `DatabaseSeeder`    | Memanggil semua seeder di atas            |
