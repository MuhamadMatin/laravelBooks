<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'book_id',
    ];

    public function Book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function Pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
