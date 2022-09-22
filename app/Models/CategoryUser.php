<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryUser extends Pivot
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'user_id',
    ];
protected $table = 'categories_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
