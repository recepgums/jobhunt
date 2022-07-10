<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'city_id',
        'title',
        'description',
        'slug',
        'cover_image',
        'work_type_id',
        'category_id',
        'district_id',
        'fee',
        'level',
        'gender',
        'qualification',
        'has_contract',
        'published_until_at',
        'status',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    const TYPE = [
        'full_time' => 1,
        'part_time' => 2,
        'hibrit' => 3,
    ];

    const CATEGORIES = [
        'firinci' => 1,
        'yazilimci' => 2,
        'hamal' => 3,
    ];

    const NEIGHBORHOODS = [
        'Eyup' => 1,
        'Balat' => 2,
        'Akarcesme' => 3,
    ];

    const LEVEL = [
        'Acemi' => 1,
        'Kalfa' => 2,
        'Usta' => 3,
    ];

    const GENDER = [
        'Erkek' => 1,
        'Kadin' => 2,
    ];

    const QUALIFICATIONS = [
        'Lise' => 1,
        'Universite' => 2,
        'Doktora' => 3,
    ];

    const PUBLISH_DAYS = [
        '1 gün (7.99 TL)' => 1,
        '2 gün (8.99 TL)' => 2,
        '3 gün (9.99 TL)' => 3,
        '5 gün (10.99 TL)' => 5,
        '7 gün (11.99 TL)' => 7,
    ];

    const STATUS = [
        'pending' => 1,
        'published' => 2, // paid
        'canceled' => 3, //paid
        'expired' => 4, //paid
    ];

    public function scopeListable($query)
    {
        return $query->where('published_until_at','>=',now())->where('status',self::STATUS['published']);
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
}
