<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchChurch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pastor_name',
        'photo',
        'address',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }
}
