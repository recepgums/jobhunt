<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class JobUser extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'job_id',
        'user_id',
        'hired_at',
        'get_contact_info_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'job_id',
                'user_id',
                'hired_at',
                'get_contact_info_at',
            ]);
    }
}
