<?php

namespace Tests\Feature;

use Filament\Forms\Components\FileUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PublicUploadUrlTest extends TestCase
{
    public function test_public_upload_urls_are_same_origin_for_existing_file_previews(): void
    {
        Storage::fake('public');

        $path = 'articles/thumbnails/existing-image.png';
        $image = UploadedFile::fake()->image('existing-image.png');

        Storage::disk('public')->put($path, $image->getContent());

        $uploadedFile = FileUpload::make('thumbnail')
            ->disk('public')
            ->visibility('public')
            ->getUploadedFile($path, null);

        $this->assertNotNull($uploadedFile);
        $this->assertSame(
            "/storage/{$path}",
            $uploadedFile['url'],
        );
        $this->assertGreaterThan(0, $uploadedFile['size']);
        $this->assertSame('image/png', $uploadedFile['type']);
    }
}
