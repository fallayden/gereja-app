<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            [
                'name' => 'Kebaktian Umum',
                'day' => 'Minggu',
                'start_time' => '09:30:00',
                'end_time' => '11:00:00',
                'location' => 'Gedung Utama GBIA GRAMMATA',
                'note' => 'Ibadah rutin setiap hari Minggu',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Sekolah Minggu',
                'day' => 'Minggu',
                'start_time' => '09:30:00',
                'end_time' => '10:30:00',
                'location' => 'Ruang Anak Sekolah Minggu',
                'note' => 'Kelas anak-anak balita hingga remaja',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Kebaktian Doa',
                'day' => 'Jumat',
                'start_time' => '17:30:00',
                'end_time' => '18:30:00',
                'location' => 'Gedung Utama GBIA GRAMMATA',
                'note' => 'Persekutuan doa malam bersama',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Pendalaman Alkitab',
                'day' => 'Sabtu',
                'start_time' => '18:30:00',
                'end_time' => '20:30:00',
                'location' => 'Gedung Utama GBIA GRAMMATA',
                'note' => 'Diadakan setiap Sabtu minggu ke-4',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}
