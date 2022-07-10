<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employer extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'company_name',
        'category_id',
        'district_id',
        'team_size',
        'since'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
