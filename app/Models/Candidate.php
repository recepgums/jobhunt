<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'city_id',
        'description',
        'is_searchable',
        'expected_salary',
        'maximum_salary',
        'experience_year',
        'age',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function categories()
    {
        return $this->hasMany(CandidateCategory::class,'candidate_id');
    }
}
