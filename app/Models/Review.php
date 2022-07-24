<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'name',
        'role',
        'review',
        'order',
    ];

    public $timestamps = false;

}
