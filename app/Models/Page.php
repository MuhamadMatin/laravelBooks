<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'book_id',
        'chapter_id',
        'body',
    ];

    public function Book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function Chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }
}
