<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'category_name',
    ];

    public static function boot(): void
    {
        parent::boot();
        static::creating(fn($model) => empty($model->id) ? $model->id = rand(10000, 100000) : '');
    }
}
