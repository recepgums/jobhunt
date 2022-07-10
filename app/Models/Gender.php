<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'name',
        'type',
    ];

    const TYPES=[
        'Erkek' => 0,
        'Kadin' => 1,
    ];
}
