<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'desk',
        'image',
        'show',
        'category_id',
        'user_id',
    ];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function Chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function Pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
