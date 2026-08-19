<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'edition_number',
        'publish_date',
        'cover_image',
        'pdf_file',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'publish_date' => 'date',
        ];
    }
}
