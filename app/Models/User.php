<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Omgtheking\OmgIyzicoPayment\OmgPayable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, OmgPayable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'candidate_id',
        'profile_image_url',
        'employer_id',
        'token',
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
