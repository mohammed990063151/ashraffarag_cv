<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'client',
        'project_date',
        'service',
        'category',
        'order',
    ];

    protected $casts = [
        'project_date' => 'date',
    ];
}
