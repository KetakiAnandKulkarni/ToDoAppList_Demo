<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'title',
        'description',
        'deadline',
        'is_completed',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_completed' => 'boolean',
    ];
}