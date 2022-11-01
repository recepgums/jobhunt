<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Categories extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'model',
        'description',
        'default_cover_image',
    ];

    protected function defaultCoverImage():Attribute
    {
        return Attribute::make(
            get:function($value) {
                return asset($value);
            }
        );
    }

    public function scopeForBlog($query)
    {
        return $query->where('model', Blog::class);
    }

    public function scopeForJob($query)
    {
        return $query->where('model', Job::class);
    }

    public function setSlugAttribute($value)
    {
        if (self::whereSlug($slug = Str::slug($value))->exists()) {
            $slug = $this->incrementSlug($slug);
        }

        $this->attributes['slug'] = $slug;
    }

    public function scopeOnlyParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id', 'id');
    }
}
