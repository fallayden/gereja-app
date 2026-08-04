# Routes / Endpoints — GBIA GRAMMATA Website

> Daftar lengkap route Laravel yang direncanakan.  
> Semua route didefinisikan di `routes/web.php`.

---

## Konvensi Penamaan

- **URL:** kebab-case (`/warta-jemaat`, `/pedang-roh`)
- **Route name:** dot-notation (`warta.index`, `pedang-roh.show`)
- **Controller method:** Mengikuti resource convention Laravel (`index`, `show`, `create`, `store`, `edit`, `update`, `destroy`)

---

## Public Routes (Tanpa Auth)

### Beranda

| Method | URI        | Route Name  | Controller             | Deskripsi                             |
|--------|------------|-------------|------------------------|---------------------------------------|
| GET    | `/`        | `home`      | `HomeController@index` | Halaman beranda utama                 |

---

### Profil / Tentang

| Method | URI         | Route Name   | Controller              | Deskripsi                            |
|--------|-------------|--------------|--------------------------|--------------------------------------|
| GET    | `/tentang`  | `about`      | `AboutController@index`  | Halaman profil gereja (sambutan gembala, sejarah, tunas jemaat, pengakuan iman) |

---

### Warta Jemaat

| Method | URI                       | Route Name     | Controller               | Deskripsi                            |
|--------|---------------------------|----------------|--------------------------|--------------------------------------|
| GET    | `/warta-jemaat`           | `warta.index`  | `WartaController@index`  | Daftar semua warta (blog list)       |
| GET    | `/warta-jemaat/{slug}`    | `warta.show`   | `WartaController@show`   | Detail satu warta (blog detail)      |
| GET    | `/warta-jemaat/arsip`     | `warta.arsip`  | `WartaController@arsip`  | Halaman arsip PDF warta              |
| GET    | `/warta-jemaat/{id}/download` | `warta.download` | `WartaController@download` | Download file PDF lampiran       |

**Catatan:**
- `warta.index` menampilkan daftar artikel dengan thumbnail + excerpt.
- `warta.arsip` menampilkan 4 PDF warta terakhir.
- `warta.download` me-return file PDF dari storage.

---

### Pedang Roh (Majalah)

| Method | URI                            | Route Name          | Controller                    | Deskripsi                          |
|--------|--------------------------------|---------------------|-------------------------------|------------------------------------|
| GET    | `/pedang-roh`                  | `pedang-roh.index`  | `PedangRohController@index`   | Etalase grid semua edisi majalah   |
| GET    | `/pedang-roh/{id}/download`    | `pedang-roh.download`| `PedangRohController@download`| Download PDF majalah               |

**Query Parameters untuk `/pedang-roh`:**
- `?year=2024` — Filter berdasarkan tahun.
- `?page=2` — Pagination (default 12 per page).

---

## Admin Routes (Future — Butuh Auth)

> Belum diimplementasi. Akan ditambahkan di fase selanjutnya.  
> Semua route admin berada di prefix `/admin` dengan middleware `auth`.

### Auth

| Method | URI              | Route Name      | Controller             | Deskripsi          |
|--------|------------------|-----------------|------------------------|--------------------|
| GET    | `/login`         | `login`         | `AuthController@showLogin` | Form login     |
| POST   | `/login`         | `login.attempt` | `AuthController@login`     | Proses login   |
| POST   | `/logout`        | `logout`        | `AuthController@logout`    | Logout         |

---

### Admin — Warta Jemaat

| Method | URI                            | Route Name           | Controller                    | Deskripsi              |
|--------|--------------------------------|----------------------|-------------------------------|------------------------|
| GET    | `/admin/warta`                 | `admin.warta.index`  | `Admin\WartaController@index` | List semua warta       |
| GET    | `/admin/warta/create`          | `admin.warta.create` | `Admin\WartaController@create`| Form buat warta baru   |
| POST   | `/admin/warta`                 | `admin.warta.store`  | `Admin\WartaController@store` | Simpan warta baru      |
| GET    | `/admin/warta/{id}/edit`       | `admin.warta.edit`   | `Admin\WartaController@edit`  | Form edit warta        |
| PUT    | `/admin/warta/{id}`            | `admin.warta.update` | `Admin\WartaController@update`| Update warta           |
| DELETE | `/admin/warta/{id}`            | `admin.warta.destroy`| `Admin\WartaController@destroy`| Hapus warta           |

---

### Admin — Pedang Roh

| Method | URI                              | Route Name               | Controller                         | Deskripsi              |
|--------|----------------------------------|--------------------------|------------------------------------|------------------------|
| GET    | `/admin/pedang-roh`              | `admin.pedang-roh.index` | `Admin\PedangRohController@index`  | List semua majalah     |
| GET    | `/admin/pedang-roh/create`       | `admin.pedang-roh.create`| `Admin\PedangRohController@create` | Form upload edisi baru |
| POST   | `/admin/pedang-roh`              | `admin.pedang-roh.store` | `Admin\PedangRohController@store`  | Simpan edisi baru      |
| GET    | `/admin/pedang-roh/{id}/edit`    | `admin.pedang-roh.edit`  | `Admin\PedangRohController@edit`   | Form edit edisi        |
| PUT    | `/admin/pedang-roh/{id}`         | `admin.pedang-roh.update`| `Admin\PedangRohController@update` | Update edisi           |
| DELETE | `/admin/pedang-roh/{id}`         | `admin.pedang-roh.destroy`| `Admin\PedangRohController@destroy`| Hapus edisi           |

---

### Admin — Konten Statis

| Method | URI                               | Route Name                  | Controller                          | Deskripsi                     |
|--------|-----------------------------------|-----------------------------|-------------------------------------|-------------------------------|
| GET    | `/admin/jadwal`                   | `admin.schedule.index`      | `Admin\ScheduleController@index`    | Kelola jadwal ibadah          |
| PUT    | `/admin/jadwal/{id}`              | `admin.schedule.update`     | `Admin\ScheduleController@update`   | Update jadwal                 |
| GET    | `/admin/profil-gembala`           | `admin.pastor.edit`         | `Admin\PastorController@edit`       | Edit profil gembala           |
| PUT    | `/admin/profil-gembala/{id}`      | `admin.pastor.update`       | `Admin\PastorController@update`     | Update profil gembala         |

---

## Contoh Implementasi di `routes/web.php`

```php
<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\WartaController;
use App\Http\Controllers\PedangRohController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [AboutController::class, 'index'])->name('about');

Route::prefix('warta-jemaat')->name('warta.')->group(function () {
    Route::get('/', [WartaController::class, 'index'])->name('index');
    Route::get('/arsip', [WartaController::class, 'arsip'])->name('arsip');
    Route::get('/{slug}', [WartaController::class, 'show'])->name('show');
    Route::get('/{id}/download', [WartaController::class, 'download'])->name('download');
});

Route::prefix('pedang-roh')->name('pedang-roh.')->group(function () {
    Route::get('/', [PedangRohController::class, 'index'])->name('index');
    Route::get('/{id}/download', [PedangRohController::class, 'download'])->name('download');
});

// Admin Routes (future)
// Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
//     ...
// });
```
