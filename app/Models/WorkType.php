<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    protected $fillable = [
        'name',
        'type',
    ];

    const TYPES = [
        'Full Time' => 1,
        'Part Time' => 2,
        'Hybrit' => 3,
    ];

    public $timestamps = false;
}
