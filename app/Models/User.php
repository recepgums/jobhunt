<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Omgtheking\OmgIyzicoPayment\OmgPayable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, OmgPayable,HasRoles;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'about',
        'age',
        'profile_image_url',
        'experience_year',
        'expected_sallary',
        'company_name',
        'is_searchable_for_job',
        'user_type',
        'city_id',
        'district_id',
        'category_id',
        'email_verified_at',
        'phone_verified_at',
        'verify_code',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const TYPES = [
        'candidate' => 1,
        'employer' => 2,
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class,'user_id');
    }
}
