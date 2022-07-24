<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'order',
        'is_published',
    ];

    public $timestamps = false;

    public function scopeListable($query)
    {
        return $query->where('is_published',true);
    }
}
