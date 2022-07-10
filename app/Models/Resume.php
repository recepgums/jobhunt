<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'candidate_id',
        'work_experience_id',
        'education_id',
        'name',
        'cover_letter',
        'url',
        'file_name',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function work_experiences()
    {
        return $this->hasMany(WorkExperience::class);
    }
    public function educations()
    {
        return $this->hasMany(Education::class);
    }
}
