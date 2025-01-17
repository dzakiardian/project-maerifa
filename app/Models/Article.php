<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'content',
        'categories',
        'user_id',
    ];

    public static function boot(): void
    {
        parent::boot();
        static::creating(fn($model) => empty($model->id) ? $model->id = rand(10000, 100000) : '');
    }

    public function categories(): Attribute
    {
        return Attribute::make(
            get: function($categories) {
                return explode(",", $categories);
            }
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
