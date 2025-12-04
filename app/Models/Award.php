<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
