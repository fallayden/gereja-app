<?php

namespace Tests\Feature;

use App\Models\BranchChurch;
use App\Models\Creed;
use App\Models\History;
use App\Models\PastorProfile;
use Database\Seeders\CreedSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AboutPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_about_page_displays_active_profile_and_ordered_church_data(): void
    {
        PastorProfile::create([
            'name' => 'Gembala Tidak Aktif',
            'greeting' => 'Tidak boleh tampil.',
            'is_active' => false,
        ]);
        PastorProfile::create([
            'name' => 'Gbl. Arifan T. Kusuma',
            'title' => 'Gembala Jemaat GBIA GRAMMATA',
            'greeting' => "Paragraf pertama.\n\nParagraf kedua.",
            'is_active' => true,
        ]);

        History::create(['year' => 2012, 'title' => 'Sejarah Kedua', 'description' => 'B', 'sort_order' => 2]);
        History::create(['year' => 2000, 'title' => 'Sejarah Pertama', 'description' => 'A', 'sort_order' => 1]);
        BranchChurch::create(['name' => 'Cabang Kedua', 'pastor_name' => 'B', 'sort_order' => 2]);
        BranchChurch::create(['name' => 'Cabang Pertama', 'pastor_name' => 'A', 'sort_order' => 1]);
        Creed::create(['number' => 2, 'title' => 'Iman Kedua', 'content' => 'B', 'sort_order' => 2]);
        Creed::create(['number' => 1, 'title' => 'Iman Pertama', 'content' => 'A', 'sort_order' => 1]);

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('Gbl. Arifan T. Kusuma')
            ->assertDontSee('Gembala Tidak Aktif')
            ->assertSeeInOrder(['Sejarah Pertama', 'Sejarah Kedua'])
            ->assertSeeInOrder(['Cabang Pertama', 'Cabang Kedua'])
            ->assertSeeInOrder(['Iman Pertama', 'Iman Kedua']);
    }

    public function test_creed_seeder_uses_the_official_thirty_one_statements(): void
    {
        $this->seed(CreedSeeder::class);

        $this->assertDatabaseCount('creeds', 31);
        $this->assertDatabaseHas('creeds', [
            'number' => 1,
            'title' => 'Percaya bahwa Allah adalah pencipta langit dan bumi...',
            'content' => 'Percaya bahwa Allah adalah pencipta langit dan bumi beserta seluruh isinya dalam enam hari yang literal (Kej.1&2).',
        ]);
        $this->assertDatabaseHas('creeds', [
            'number' => 31,
            'title' => 'Percaya bahwa hari pengangkatan orang percaya terjadi sebelum masa penganiayaan...',
        ]);
    }
}
