<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];
    // eager loading to prevent N+1 problem
    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}