<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserVerify extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_verify_code',
        'email_verify_code',
        'phone_verified_at',
        'email_verified_at',
        'token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTokenAttribute($value)
    {
        $this->attributes['token'] = Str::random(20);
    }
}