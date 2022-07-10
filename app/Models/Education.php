<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = "educations";

    protected $fillable = [
        'candidate_id',
        'type',
        'name',
        'department_name',
        'description',
        'start_year',
        'end_year',
    ];

    const TYPE = [
        'primary_school' => 1,
        'high_school' => 2,
        'university' => 3,
        'degree' => 4,
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
