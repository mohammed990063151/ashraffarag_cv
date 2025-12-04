<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'bio',
        'profile_image',
        'address',
        'location',
        'phone',
        'email',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'github_url',
    ];
}
