# Changelog — GBIA GRAMMATA Website

> Semua perubahan penting pada proyek ini didokumentasikan di file ini.  
> Format mengikuti [Keep a Changelog](https://keepachangelog.com/id-ID/1.0.0/).

---

## [Unreleased]

### Planned
- Implementasi halaman Beranda (jadwal ibadah, visi-misi, CTA, Google Maps)
- Implementasi halaman Profil/Tentang (sambutan gembala, timeline, tunas jemaat, accordion pengakuan iman)
- Implementasi halaman Warta Jemaat (blog list, detail, arsip PDF)
- Implementasi halaman Pedang Roh (etalase majalah, filter tahun, pagination)
- Admin panel untuk manajemen konten
- SEO optimization (meta tags, Open Graph)

---

## [0.1.0] — 2026-08-04

### Added
- **Project Setup:** Inisialisasi proyek Laravel 11.x.
- **Dokumentasi:** Dibuat file `design.md` (design system) dan `ui-spec.md` (spesifikasi UI).
- **Dokumentasi Tambahan:** Dibuat `README.md`, `architecture.md`, `database.md`, `routes.md`, `components.md`, `changelog.md`, `todo.md`.
- **Environment:** Konfigurasi `.env` lokal, koneksi database MySQL.
- **Dev Server:** Proyek berjalan di lokal via `php artisan serve`.

---

## Template Entry

Gunakan template di bawah ini saat menambahkan entry baru:

```markdown
## [X.Y.Z] — YYYY-MM-DD

### Added
- Fitur baru yang ditambahkan.

### Changed
- Perubahan pada fitur yang sudah ada.

### Fixed
- Bug yang diperbaiki.

### Removed
- Fitur atau file yang dihapus.

### Security
- Perbaikan keamanan.
```

---

## Panduan Versioning

| Versi   | Kapan Dinaikkan                                      |
|---------|------------------------------------------------------|
| `0.1.x` | Setup awal, dokumentasi, scaffolding                |
| `0.2.x` | Halaman publik pertama selesai (Beranda)            |
| `0.3.x` | Halaman Profil/Tentang selesai                      |
| `0.4.x` | Halaman Warta Jemaat selesai                        |
| `0.5.x` | Halaman Pedang Roh selesai                          |
| `0.6.x` | Admin panel dasar                                   |
| `0.7.x` | Responsive polish & testing                         |
| `1.0.0` | Rilis pertama ke production                         |
