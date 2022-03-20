<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'article_id', 'id');
    }

    public function isLikedByCurrentUser(): bool
    {
        if (!Auth::user())
            return false;
        return !empty($this->getCurrentUserLike());
    }

    public function getCurrentUserLike()
    {
        return $this->likes->where('user_id', Auth::user()->id)->where('article_id', $this->id)->first();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }
}
