<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Omgtheking\OmgIyzicoPayment\OmgPayable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia, LogsActivity,OmgPayable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'about',
        'age',
        'profile_image_url',
        'experience_year',
        'expected_salary',
        'company_name',
        'is_searchable_for_job',
        'user_type',
        'city_id',
        'district_id',
        'email_verified_at',
        'phone_verified_at',
        'verify_code',
        'password',
        'coin',
        'highlighted_until_at',
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
        'employee' => 2,
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function categories()
    {
        return $this->hasMany(CategoryUser::class);
    }

    public function setRoleByTypeId($data)
    {
        if (isset($data['type'])) {
            $id = $data['type']; // id role
            foreach (self::TYPES as $k => $v) { // $k => candidate, $v => 1
                if ($id == $v) {
                    $this->assignRole($k);
                }
            }
        }

        $this->save();
    }

    public function jobs()
    {
        return $this->hasMany(JobUser::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            if (!$user->username) {
                $user->username = Str::slug(Str::slug($user->name) . '-' . Str::random(4));
                $user->save();
            }
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name',
                'email',
                'phone',
                'about',
                'age',
                'profile_image_url',
                'experience_year',
                'expected_salary',
                'company_name',
                'is_searchable_for_job',
                'user_type',
                'city_id',
                'district_id',
                'email_verified_at',
                'phone_verified_at',
                'verify_code',
                'password',
                'coin',
                'highlighted_until_at',
            ]);
    }
}
