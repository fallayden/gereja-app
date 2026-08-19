<?php

namespace Tests\Feature;

use App\Filament\Resources\ArticleResource\Pages\CreateArticle;
use App\Filament\Resources\ArticleResource\Pages\EditArticle;
use App\Filament\Resources\ArticleResource\Pages\ListArticles;
use App\Filament\Resources\BranchChurchResource\Pages\CreateBranchChurch;
use App\Filament\Resources\BranchChurchResource\Pages\EditBranchChurch;
use App\Filament\Resources\BranchChurchResource\Pages\ListBranchChurches;
use App\Filament\Resources\CreedResource\Pages\CreateCreed;
use App\Filament\Resources\CreedResource\Pages\EditCreed;
use App\Filament\Resources\CreedResource\Pages\ListCreeds;
use App\Filament\Resources\HistoryResource\Pages\CreateHistory;
use App\Filament\Resources\HistoryResource\Pages\EditHistory;
use App\Filament\Resources\HistoryResource\Pages\ListHistories;
use App\Filament\Resources\MagazineResource\Pages\CreateMagazine;
use App\Filament\Resources\MagazineResource\Pages\EditMagazine;
use App\Filament\Resources\MagazineResource\Pages\ListMagazines;
use App\Filament\Resources\PastorProfileResource\Pages\CreatePastorProfile;
use App\Filament\Resources\PastorProfileResource\Pages\EditPastorProfile;
use App\Filament\Resources\PastorProfileResource\Pages\ListPastorProfiles;
use App\Filament\Resources\ScheduleResource\Pages\CreateSchedule;
use App\Filament\Resources\ScheduleResource\Pages\EditSchedule;
use App\Filament\Resources\ScheduleResource\Pages\ListSchedules;
use App\Models\Article;
use App\Models\BranchChurch;
use App\Models\Creed;
use App\Models\History;
use App\Models\Magazine;
use App\Models\PastorProfile;
use App\Models\Schedule;
use App\Models\User;
use Filament\Auth\Pages\Login;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Filament::setCurrentPanel(Filament::getPanel('admin'));
    }

    public function test_admin_can_log_in_with_seeded_credentials(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin GBIA Grammata',
            'email' => 'admin@gbiagrammata.org',
            'password' => 'password',
        ]);

        $this->get('/admin')->assertRedirect('/admin/login');

        Livewire::test(Login::class)
            ->fillForm([
                'email' => 'admin@gbiagrammata.org',
                'password' => 'password',
            ])
            ->call('authenticate')
            ->assertHasNoFormErrors();

        $this->assertAuthenticatedAs($admin);
        $this->get('/admin')->assertOk();
    }

    public function test_only_the_configured_admin_account_can_access_the_panel_in_production(): void
    {
        config(['app.env' => 'production']);

        $admin = User::factory()->create(['email' => 'admin@gbiagrammata.org']);
        $otherUser = User::factory()->create(['email' => 'jemaat@example.com']);

        $this->actingAs($admin)->get('/admin')->assertOk();
        $this->actingAs($otherUser)->get('/admin')->assertForbidden();
    }

    public function test_all_admin_resource_pages_render(): void
    {
        $this->signInAsAdmin();

        $routes = [
            'filament.admin.resources.articles.index',
            'filament.admin.resources.articles.create',
            'filament.admin.resources.magazines.index',
            'filament.admin.resources.magazines.create',
            'filament.admin.resources.schedules.index',
            'filament.admin.resources.schedules.create',
            'filament.admin.resources.pastor-profiles.index',
            'filament.admin.resources.pastor-profiles.create',
            'filament.admin.resources.histories.index',
            'filament.admin.resources.histories.create',
            'filament.admin.resources.branch-churches.index',
            'filament.admin.resources.branch-churches.create',
            'filament.admin.resources.creeds.index',
            'filament.admin.resources.creeds.create',
        ];

        foreach ($routes as $route) {
            $this->get(route($route))->assertOk();
        }
    }

    public function test_crud_works_for_all_seven_admin_resources(): void
    {
        Storage::fake('public');
        $this->signInAsAdmin();

        $resources = $this->resourceTestCases();

        foreach ($resources as $resource) {
            Livewire::test($resource['createPage'])
                ->fillForm($resource['createData'])
                ->call('create')
                ->assertHasNoFormErrors();

            $record = $resource['model']::query()->latest('id')->firstOrFail();

            Livewire::test($resource['listPage'])
                ->assertCanSeeTableRecords([$record]);

            Livewire::test($resource['editPage'], ['record' => $record->getRouteKey()])
                ->fillForm($resource['updateData'])
                ->call('save')
                ->assertHasNoFormErrors();

            $record->refresh();
            $this->assertSame($resource['updatedValue'], $record->getAttribute($resource['updatedField']));

            if (isset($resource['storedFiles'])) {
                foreach ($resource['storedFiles']($record) as $path) {
                    Storage::disk('public')->assertExists($path);
                }
            }

            Livewire::test($resource['editPage'], ['record' => $record->getRouteKey()])
                ->callAction('delete');

            $this->assertModelMissing($record);
        }
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function resourceTestCases(): array
    {
        return [
            [
                'model' => Article::class,
                'createPage' => CreateArticle::class,
                'editPage' => EditArticle::class,
                'listPage' => ListArticles::class,
                'createData' => [
                    'title' => 'Artikel Admin',
                    'slug' => 'artikel-admin',
                    'published_at' => now(),
                    'is_published' => true,
                    'thumbnail' => [UploadedFile::fake()->image('artikel.jpg')],
                    'body' => '<p>Isi artikel dari admin.</p>',
                    'attachments' => [[
                        'file_name' => 'Buletin Admin.pdf',
                        'file_path' => [UploadedFile::fake()->create('buletin.pdf', 100, 'application/pdf')],
                    ]],
                ],
                'updateData' => ['title' => 'Artikel Admin Diperbarui'],
                'updatedField' => 'title',
                'updatedValue' => 'Artikel Admin Diperbarui',
                'storedFiles' => fn (Article $article): array => [
                    $article->thumbnail,
                    $article->attachments()->firstOrFail()->file_path,
                ],
            ],
            [
                'model' => Magazine::class,
                'createPage' => CreateMagazine::class,
                'editPage' => EditMagazine::class,
                'listPage' => ListMagazines::class,
                'createData' => [
                    'edition_number' => 'TEST-001',
                    'title' => 'Majalah Admin',
                    'publish_date' => '2026-08-05',
                    'cover_image' => [UploadedFile::fake()->image('kover.jpg')],
                    'pdf_file' => [UploadedFile::fake()->create('majalah.pdf', 100, 'application/pdf')],
                    'description' => 'Majalah hasil pengujian admin.',
                ],
                'updateData' => ['title' => 'Majalah Admin Diperbarui'],
                'updatedField' => 'title',
                'updatedValue' => 'Majalah Admin Diperbarui',
                'storedFiles' => fn (Magazine $magazine): array => [
                    $magazine->cover_image,
                    $magazine->pdf_file,
                ],
            ],
            [
                'model' => Schedule::class,
                'createPage' => CreateSchedule::class,
                'editPage' => EditSchedule::class,
                'listPage' => ListSchedules::class,
                'createData' => [
                    'name' => 'Ibadah Admin',
                    'day' => 'Minggu',
                    'start_time' => '09:00',
                    'end_time' => '11:00',
                    'location' => 'Gedung Utama',
                    'sort_order' => 1,
                    'is_active' => true,
                ],
                'updateData' => ['name' => 'Ibadah Admin Diperbarui'],
                'updatedField' => 'name',
                'updatedValue' => 'Ibadah Admin Diperbarui',
            ],
            [
                'model' => PastorProfile::class,
                'createPage' => CreatePastorProfile::class,
                'editPage' => EditPastorProfile::class,
                'listPage' => ListPastorProfiles::class,
                'createData' => [
                    'name' => 'Gembala Admin',
                    'title' => 'Gembala Jemaat',
                    'photo' => [UploadedFile::fake()->image('gembala.jpg')],
                    'greeting' => 'Salam sejahtera untuk seluruh jemaat.',
                    'is_active' => true,
                ],
                'updateData' => ['name' => 'Gembala Admin Diperbarui'],
                'updatedField' => 'name',
                'updatedValue' => 'Gembala Admin Diperbarui',
                'storedFiles' => fn (PastorProfile $pastor): array => [$pastor->photo],
            ],
            [
                'model' => History::class,
                'createPage' => CreateHistory::class,
                'editPage' => EditHistory::class,
                'listPage' => ListHistories::class,
                'createData' => [
                    'year' => 2026,
                    'title' => 'Sejarah Admin',
                    'description' => 'Peristiwa sejarah hasil pengujian.',
                    'sort_order' => 1,
                ],
                'updateData' => ['title' => 'Sejarah Admin Diperbarui'],
                'updatedField' => 'title',
                'updatedValue' => 'Sejarah Admin Diperbarui',
            ],
            [
                'model' => BranchChurch::class,
                'createPage' => CreateBranchChurch::class,
                'editPage' => EditBranchChurch::class,
                'listPage' => ListBranchChurches::class,
                'createData' => [
                    'name' => 'Tunas Admin',
                    'pastor_name' => 'Pelayan Admin',
                    'address' => 'Alamat pengujian',
                    'sort_order' => 1,
                    'photo' => [UploadedFile::fake()->image('tunas.jpg')],
                ],
                'updateData' => ['name' => 'Tunas Admin Diperbarui'],
                'updatedField' => 'name',
                'updatedValue' => 'Tunas Admin Diperbarui',
                'storedFiles' => fn (BranchChurch $branch): array => [$branch->photo],
            ],
            [
                'model' => Creed::class,
                'createPage' => CreateCreed::class,
                'editPage' => EditCreed::class,
                'listPage' => ListCreeds::class,
                'createData' => [
                    'number' => 32,
                    'title' => 'Pengakuan Admin',
                    'content' => 'Isi pengakuan hasil pengujian.',
                    'sort_order' => 32,
                ],
                'updateData' => ['title' => 'Pengakuan Admin Diperbarui'],
                'updatedField' => 'title',
                'updatedValue' => 'Pengakuan Admin Diperbarui',
            ],
        ];
    }

    private function signInAsAdmin(): User
    {
        $admin = User::factory()->create([
            'email' => 'admin@gbiagrammata.org',
        ]);

        $this->actingAs($admin);

        return $admin;
    }
}
