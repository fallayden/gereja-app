<?php

namespace Tests\Feature;

use App\Filament\Resources\ArticleResource\Pages\CreateArticle;
use App\Filament\Resources\ArticleResource\Pages\EditArticle;
use App\Filament\Resources\ArticleResource\Pages\ListArticles;
use App\Filament\Resources\MagazineResource\Pages\CreateMagazine;
use App\Filament\Resources\MagazineResource\Pages\EditMagazine;
use App\Filament\Resources\MagazineResource\Pages\ListMagazines;
use App\Models\Article;
use App\Models\Magazine;
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

    public function test_only_publication_resource_pages_render(): void
    {
        $this->signInAsAdmin();

        $routes = [
            'filament.admin.resources.articles.index',
            'filament.admin.resources.articles.create',
            'filament.admin.resources.magazines.index',
            'filament.admin.resources.magazines.create',
        ];

        foreach ($routes as $route) {
            $this->get(route($route))->assertOk();
        }

        foreach (['schedules', 'pastor-profiles', 'histories', 'branch-churches', 'creeds'] as $resource) {
            $this->assertFalse(app('router')->has("filament.admin.resources.{$resource}.index"));
        }
    }

    public function test_crud_works_for_both_publication_resources(): void
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
