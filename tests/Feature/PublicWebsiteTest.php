<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\ArticleAttachment;
use App\Models\BranchChurch;
use App\Models\Creed;
use App\Models\History;
use App\Models\Magazine;
use App\Models\PastorProfile;
use App\Models\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicWebsiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_default_seed_data_meets_public_content_requirements(): void
    {
        $this->seed();

        $this->assertDatabaseCount('schedules', 4);
        $this->assertDatabaseCount('histories', 6);
        $this->assertDatabaseCount('branch_churches', 3);
        $this->assertDatabaseCount('creeds', 31);
        $this->assertDatabaseCount('pastor_profiles', 1);
        $this->assertDatabaseCount('articles', 4);
        $this->assertDatabaseCount('magazines', 4);

        $this->get('/')->assertOk();
        $this->get('/tentang')->assertOk();
        $this->get('/warta-jemaat')->assertOk();
        $this->get('/pedang-roh')->assertOk();
    }

    public function test_homepage_only_displays_active_schedules(): void
    {
        Schedule::create([
            'name' => 'Ibadah Aktif',
            'day' => 'Minggu',
            'start_time' => '09:00',
            'end_time' => '11:00',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Schedule::create([
            'name' => 'Ibadah Nonaktif',
            'day' => 'Sabtu',
            'start_time' => '09:00',
            'end_time' => '11:00',
            'sort_order' => 2,
            'is_active' => false,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Ibadah Aktif')
            ->assertDontSee('Ibadah Nonaktif');
    }

    public function test_about_page_displays_all_database_sections(): void
    {
        PastorProfile::create([
            'name' => 'Gembala Pengujian',
            'title' => 'Gembala Jemaat',
            'greeting' => 'Salam sejahtera untuk jemaat.',
            'is_active' => true,
        ]);

        History::create([
            'year' => 2000,
            'title' => 'Sejarah Pengujian',
            'description' => 'Peristiwa bersejarah.',
            'sort_order' => 1,
        ]);

        BranchChurch::create([
            'name' => 'Tunas Jemaat Pengujian',
            'pastor_name' => 'Pelayan Pengujian',
            'sort_order' => 1,
        ]);

        Creed::create([
            'number' => 1,
            'title' => 'Pengakuan Iman Pengujian',
            'content' => 'Isi pengakuan iman.',
            'sort_order' => 1,
        ]);

        $this->get('/tentang')
            ->assertOk()
            ->assertSeeText('Gembala Pengujian')
            ->assertSeeText('Sejarah Pengujian')
            ->assertSeeText('Tunas Jemaat Pengujian')
            ->assertSeeText('Pengakuan Iman Pengujian');
    }

    public function test_warta_only_exposes_articles_marked_as_published(): void
    {
        $published = Article::create([
            'title' => 'Artikel Publik',
            'slug' => 'artikel-publik',
            'body' => '<p>Isi artikel publik.</p>',
            'published_at' => now()->subDay(),
            'is_published' => true,
        ]);

        ArticleAttachment::create([
            'article_id' => $published->id,
            'file_name' => 'Buletin Publik.pdf',
            'file_path' => 'articles/pdfs/buletin-publik.pdf',
        ]);

        Article::create([
            'title' => 'Artikel Draf',
            'slug' => 'artikel-draf',
            'body' => '<p>Isi artikel draf.</p>',
            'published_at' => now()->subDay(),
            'is_published' => false,
        ]);

        Article::create([
            'title' => 'Artikel Masa Depan',
            'slug' => 'artikel-masa-depan',
            'body' => '<p>Isi artikel masa depan.</p>',
            'published_at' => now()->addDay(),
            'is_published' => true,
        ]);

        $this->get('/warta-jemaat')
            ->assertOk()
            ->assertSeeText('Artikel Publik')
            ->assertSee('storage/articles/pdfs/buletin-publik.pdf')
            ->assertDontSeeText('Artikel Draf')
            ->assertDontSeeText('Artikel Masa Depan');

        $this->get('/warta-jemaat/artikel-publik')->assertOk();
        $this->get('/warta-jemaat/artikel-draf')->assertNotFound();
        $this->get('/warta-jemaat/artikel-masa-depan')->assertNotFound();
    }

    public function test_magazine_page_supports_year_filter_search_and_pagination(): void
    {
        foreach (range(1, 9) as $edition) {
            Magazine::create([
                'title' => "Majalah Tahun Ini {$edition}",
                'edition_number' => (string) $edition,
                'publish_date' => "2026-01-{$edition}",
                'pdf_file' => "magazines/pdfs/edisi-{$edition}.pdf",
            ]);
        }

        Magazine::create([
            'title' => 'Majalah Arsip Lama',
            'edition_number' => 'LAMA-1',
            'publish_date' => '2025-06-01',
            'pdf_file' => 'magazines/pdfs/arsip-lama.pdf',
        ]);

        $response = $this->get('/pedang-roh');

        $response->assertOk()
            ->assertViewHas('magazines', fn ($magazines): bool => $magazines->perPage() === 8 && $magazines->total() === 10)
            ->assertSee('storage/magazines/pdfs/edisi-9.pdf');

        $this->get('/pedang-roh?year=2025')
            ->assertOk()
            ->assertSeeText('Majalah Arsip Lama')
            ->assertDontSeeText('Majalah Tahun Ini');

        $this->get('/pedang-roh?search=LAMA-1')
            ->assertOk()
            ->assertSeeText('Majalah Arsip Lama')
            ->assertDontSeeText('Majalah Tahun Ini');
    }
}
