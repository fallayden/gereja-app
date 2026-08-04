# Komponen UI Reusable — GBIA GRAMMATA Website

> Daftar Blade Components yang dirancang untuk dipakai berulang di seluruh halaman.  
> Semua komponen disimpan di `resources/views/components/`.

---

## Konvensi

- **Lokasi file:** `resources/views/components/<nama-komponen>.blade.php`
- **Penggunaan di Blade:** `<x-nama-komponen />` (anonymous component) atau dengan class component.
- **Styling:** Tailwind CSS, mengikuti token dari `design.md`.
- **Props:** Didefinisikan via `@props` directive di Blade.

---

## 1. Layout Components

### `<x-app-layout>`
**File:** `resources/views/components/app-layout.blade.php`

Layout utama yang membungkus semua halaman.

| Prop     | Tipe   | Default           | Keterangan             |
|----------|--------|--------------------|------------------------|
| `title`  | string | "GBIA GRAMMATA"   | Title tag HTML         |

**Berisi:**
- `<head>` dengan meta tags, Google Fonts (Merriweather + Inter), Vite assets
- `<x-navbar />`
- `{{ $slot }}` — konten halaman
- `<x-footer />`

---

### `<x-navbar>`
**File:** `resources/views/components/navbar.blade.php`

Navigasi utama website.

| Prop | Tipe | Default | Keterangan |
|------|------|---------|------------|
| —    | —    | —       | Tidak ada props, membaca route aktif via `request()->routeIs()` |

**Fitur:**
- Logo + nama gereja di kiri.
- Menu navigasi: Beranda, Tentang, Warta Jemaat, Pedang Roh.
- Active state: underline/bold pada menu yang sedang aktif.
- Mobile: hamburger menu toggle (Alpine.js `x-data`).
- Warna: Background `primary` (#1E3A8A), teks `on-primary` (#FFFFFF).

---

### `<x-footer>`
**File:** `resources/views/components/footer.blade.php`

Footer website.

| Prop | Tipe | Default | Keterangan |
|------|------|---------|------------|
| —    | —    | —       | Tidak ada props |

**Berisi:**
- Nama gereja & alamat.
- Link navigasi.
- Tahun copyright dinamis.
- Background `primary` navy.

---

## 2. Content Components

### `<x-section-heading>`
**File:** `resources/views/components/section-heading.blade.php`

Heading untuk setiap section di halaman.

| Prop       | Tipe   | Default | Keterangan                          |
|------------|--------|---------|-------------------------------------|
| `title`    | string | —       | Judul section (wajib)              |
| `subtitle` | string | null    | Subjudul opsional                  |

**Styling:**
- Font: Merriweather (serif), `text-2xl font-semibold`.
- Warna: `primary` navy.
- Garis dekoratif kecil di bawah judul (accent `tertiary` merah).

---

### `<x-card>`
**File:** `resources/views/components/card.blade.php`

Card container general-purpose.

| Prop      | Tipe   | Default    | Keterangan                       |
|-----------|--------|------------|----------------------------------|
| `class`   | string | ""         | Class Tailwind tambahan          |
| `padding` | string | "p-6"     | Custom padding                   |

**Styling:**
- Background: `surface` (#FFFFFF).
- Rounded: `rounded-lg` (12px).
- Shadow: `shadow-md`.
- Mengikuti `card` token dari `design.md`.

**Penggunaan:**
```blade
<x-card>
    <h3>Judul Card</h3>
    <p>Konten card...</p>
</x-card>
```

---

### `<x-schedule-card>`
**File:** `resources/views/components/schedule-card.blade.php`

Card khusus jadwal ibadah (dipakai di Beranda).

| Prop        | Tipe   | Default | Keterangan                        |
|-------------|--------|---------|-----------------------------------|
| `name`      | string | —       | Nama ibadah (wajib)              |
| `day`       | string | —       | Hari ibadah (wajib)              |
| `startTime` | string | —       | Jam mulai (wajib)                |
| `endTime`   | string | —       | Jam selesai (wajib)              |
| `location`  | string | null    | Lokasi spesifik                  |
| `note`      | string | null    | Catatan tambahan                 |

**Styling:**
- Ikon jam (🕐) dan map pin (📍).
- Nama ibadah bold, font Merriweather.
- Waktu dan hari dengan font Inter label.

---

### `<x-visi-misi-card>`
**File:** `resources/views/components/visi-misi-card.blade.php`

Card untuk section Visi, Misi, dan Tentang (3 card horizontal).

| Prop     | Tipe   | Default | Keterangan                     |
|----------|--------|---------|--------------------------------|
| `title`  | string | —       | Judul card (Visi/Misi/Tentang) |
| `icon`   | string | null    | Nama/path ikon opsional        |
| `action` | string | null    | URL tombol "Baca Selengkapnya" |

**Catatan:** Card "Tentang" wajib punya `action` prop untuk tombol CTA.

---

### `<x-cta-section>`
**File:** `resources/views/components/cta-section.blade.php`

Section Call-to-Action dengan background navy solid.

| Prop       | Tipe   | Default                                     | Keterangan            |
|------------|--------|---------------------------------------------|-----------------------|
| `headline` | string | "Mari Bertumbuh dan Beribadah Bersama Kami!" | Teks headline         |
| `buttonText`| string| "Temukan Kami"                               | Label tombol CTA      |
| `buttonUrl` | string| "#lokasi"                                    | URL/anchor tombol     |

**Styling:**
- Background: `primary` navy full-width.
- Teks: putih, font display Merriweather.
- Tombol: `tertiary` merah (button-primary dari design.md).

---

### `<x-timeline-item>`
**File:** `resources/views/components/timeline-item.blade.php`

Satu item pada vertical timeline (Sejarah Gereja).

| Prop          | Tipe   | Default | Keterangan                        |
|---------------|--------|---------|-----------------------------------|
| `year`        | string | —       | Tahun peristiwa (wajib)          |
| `title`       | string | —       | Judul singkat (wajib)            |
| `description` | string | —       | Deskripsi peristiwa (wajib)      |
| `position`    | string | "left"  | Posisi zig-zag: "left" / "right" |

**Styling:**
- Garis vertikal di tengah.
- Tahun di satu sisi, deskripsi di sisi lainnya.
- Dot/bulatan kecil di titik pertemuan garis.

---

### `<x-accordion>`
**File:** `resources/views/components/accordion.blade.php`

Accordion buka-tutup (dipakai untuk Pengakuan Iman).

| Prop    | Tipe   | Default | Keterangan                    |
|---------|--------|---------|-------------------------------|
| `title` | string | —       | Judul/kalimat awal (wajib)   |
| `open`  | bool   | false   | Apakah terbuka secara default|

**Interaksi:** Alpine.js `x-data="{ open: false }"`.

**Penggunaan:**
```blade
<x-accordion title="1. Tentang Allah">
    <p>Isi lengkap butir pengakuan iman...</p>
</x-accordion>
```

---

### `<x-branch-church-card>`
**File:** `resources/views/components/branch-church-card.blade.php`

Card untuk menampilkan tunas jemaat (3 kolom horizontal).

| Prop         | Tipe   | Default | Keterangan                   |
|--------------|--------|---------|------------------------------|
| `name`       | string | —       | Nama gereja tunas (wajib)   |
| `pastorName` | string | —       | Nama pendeta (wajib)        |
| `photo`      | string | null    | Path foto gereja            |
| `address`    | string | null    | Alamat                      |

**Styling:** Foto di atas, nama gereja di tengah, nama pendeta bold di bawah.

---

## 3. Blog / Warta Components

### `<x-article-card>`
**File:** `resources/views/components/article-card.blade.php`

Card artikel di list view Warta Jemaat.

| Prop          | Tipe   | Default | Keterangan                    |
|---------------|--------|---------|-------------------------------|
| `title`       | string | —       | Judul artikel (wajib)        |
| `excerpt`     | string | —       | Cuplikan singkat (wajib)     |
| `thumbnail`   | string | null    | Path gambar thumbnail        |
| `date`        | string | —       | Tanggal publikasi (wajib)    |
| `url`         | string | —       | URL ke detail artikel (wajib)|

**Styling:**
- Layout horizontal: thumbnail kiri, teks kanan.
- Tanggal warna `tertiary` merah (aksen).
- Hover: subtle shadow transition.

---

### `<x-archive-item>`
**File:** `resources/views/components/archive-item.blade.php`

Item di sidebar/section Arsip Warta.

| Prop        | Tipe   | Default | Keterangan                    |
|-------------|--------|---------|-------------------------------|
| `fileName`  | string | —       | Nama file PDF (wajib)        |
| `date`      | string | —       | Tanggal warta (wajib)        |
| `downloadUrl`| string| —       | URL download (wajib)         |

**Tombol:** "Baca di Layar" + "Download PDF" (sesuai ui-spec).

---

## 4. Magazine Components

### `<x-magazine-card>`
**File:** `resources/views/components/magazine-card.blade.php`

Card cover majalah di grid Pedang Roh.

| Prop          | Tipe   | Default | Keterangan                        |
|---------------|--------|---------|-----------------------------------|
| `title`       | string | —       | Judul edisi (wajib)              |
| `edition`     | string | —       | Nomor edisi (wajib)             |
| `coverPath`   | string | null    | Path gambar cover                |
| `downloadUrl` | string | —       | URL download PDF (wajib)        |

**Styling:**
- Aspect ratio potret 3:4 (menyerupai kertas A4).
- Cover image `object-cover`.
- Hover: scale up sedikit + shadow.

---

## 5. Utility Components

### `<x-button>`
**File:** `resources/views/components/button.blade.php`

Tombol reusable.

| Prop      | Tipe   | Default     | Keterangan                         |
|-----------|--------|-------------|------------------------------------|
| `variant` | string | "primary"   | "primary" (merah) / "secondary" (navy) |
| `href`    | string | null        | Jika diisi, render sebagai `<a>`   |
| `type`    | string | "button"    | Type attribute untuk `<button>`    |
| `class`   | string | ""          | Class tambahan                     |

**Styling mengikuti `design.md`:**
- `primary`: bg `tertiary` merah, teks putih, rounded 8px, padding 12px 24px.
- `secondary`: bg `primary` navy, teks putih, rounded 8px, padding 12px 24px.

---

### `<x-google-map>`
**File:** `resources/views/components/google-map.blade.php`

Embed Google Maps.

| Prop     | Tipe   | Default | Keterangan                          |
|----------|--------|---------|-------------------------------------|
| `src`    | string | —       | Google Maps embed URL (wajib)      |
| `height` | string | "400px" | Tinggi iframe                      |

**Styling:** Full-width, tanpa border, rounded atas jika diperlukan.

---

## Ringkasan File

```
resources/views/components/
├── app-layout.blade.php
├── navbar.blade.php
├── footer.blade.php
├── section-heading.blade.php
├── card.blade.php
├── schedule-card.blade.php
├── visi-misi-card.blade.php
├── cta-section.blade.php
├── timeline-item.blade.php
├── accordion.blade.php
├── branch-church-card.blade.php
├── article-card.blade.php
├── archive-item.blade.php
├── magazine-card.blade.php
├── button.blade.php
└── google-map.blade.php
```
