<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Blog extends Model implements HasMedia
{
    use HasFactory, SoftDeletes,InteractsWithMedia,Sluggable;

    protected string $sluggableField = 'title';

    protected $appends = ['cover_image'];

    protected $fillable = [
        'category_id',
        'cover_image',
        'title',
        'slug',
        'summary',
        'content',
        'seen_count',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function getCoverImageAttribute($value)
    {
        $firstMediaUrl = $this->getFirstMediaUrl('images');
        return strlen($firstMediaUrl)>0 ? $firstMediaUrl : optional($this->category)->default_cover_image;
    }
}
