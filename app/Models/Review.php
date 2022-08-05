<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Review extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = [
        'name',
        'role',
        'review',
        'order',
    ];

    public $timestamps = false;

    public function getCoverImageAttribute($value)
    {
        return $this->getFirstMediaUrl('images');
    }
}
