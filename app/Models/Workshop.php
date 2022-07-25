<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workshop extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'city_id',
        'district_id',
        'sale_type',
        'package_id',
        'title',
        'description',
        'slug',
        'contact_name',
        'contact_phone',
        'latitude',
        'longitude',
        'price',
        'is_price_fixed',
        'square',
        'night_mode_start_at',
        'night_mode_end_at',
        'view_counter',//todo maybe no need to add in fillable array
    ];

    const SALE_TYPE = [
        'kiralik' => 0,
        'satilik' => 1,
        'devren' => 2,
    ];

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
}
