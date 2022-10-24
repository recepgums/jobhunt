<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Job extends Model implements HasMedia,Sitemapable
{
    use HasFactory, SoftDeletes, InteractsWithMedia,LogsActivity;

    protected $fillable = [
        'user_id',
        'category_id',
        'city_id',
        'district_id',
        'package_id',
        'gender_id',
        'work_type_id',
        'title',
        'description',
        'slug',
        'fee',
        'phone',
        'level',
        'has_contract',
        'highlighted_until_at',
        'published_until_at',
        'status',
        'view_counter',
        'sleep_after_at',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    const LEVEL = [
        'Acemi' => 1,
        'Kalfa' => 2,
        'Usta' => 3,
    ];

    const STATUS = [
        'pending' => 1,
        'published' => 2, // paid
        'canceled' => 3, //paid
        'expired' => 4, //paid
    ];

    public function scopeListable($query)
    {
        return $query->where('published_until_at', '>=', now())
            ->where('status', self::STATUS['published']);
    }

    public function toSitemapTag(): Url | string | array
    {
        return route('job.show', $this);
    }

    public function setSlugAttribute($value)
    {
        if (self::whereSlug($slug = Str::slug($value))->exists()) {
            $slug = $this->incrementSlug($slug);
        }

        $this->attributes['slug'] = $slug;
    }

    public function incrementSlug($slug) {
        $original = $slug;
        $count = 2;
        while (static::whereSlug($slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }

        return $slug;
    }

    public function getCoverImageAttribute($value)
    {
        $firstMediaUrl = $this->getFirstMediaUrl('images');
        return strlen($firstMediaUrl)>0 ? $firstMediaUrl : optional($this->category)->default_cover_image;
    }

    public function getPhoneAttribute($value)
    {
        if (is_null($value)){
            return $this->user->phone;
        }

        return $value;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function workType()
    {
        return $this->belongsTo(WorkType::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function users()
    {
        return $this->hasMany(JobUser::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['user_id',
        'category_id',
        'city_id',
        'district_id',
        'package_id',
        'gender_id',
        'work_type_id',
        'title',
        'description',
        'slug',
        'fee',
        'phone',
        'level',
        'has_contract',
        'highlighted_until_at',
        'published_until_at',
        'status',
        'view_counter',
        'sleep_after_at']);
    }
}
