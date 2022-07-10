<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'profile_image_url',
        'is_searchable',
        'minimum_salary',
        'maximum_salary',
        'experience_year',
        'age',
        'description',
        'facebook_url',
        'linkedin_url',
        'website_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
