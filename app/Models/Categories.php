<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'model',
        'description',
    ];

    public function scopeForBlog($query)
    {
        return $query->where('model', Blog::class);
    }

    public function scopeForJob($query)
    {
        return $query->where('model', Job::class);
    }
}
