<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creed extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'title',
        'content',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'number' => 'integer',
            'sort_order' => 'integer',
        ];
    }
}
