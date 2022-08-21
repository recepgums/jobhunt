<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'model',
        'description',
        'default_cover_image',
    ];

    public function scopeForBlog($query)
    {
        return $query->where('model', Blog::class);
    }

    public function scopeForJob($query)
    {
        return $query->where('model', Job::class);
    }

    public function scopeOnlyParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Categories::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id', 'id');
    }
}
