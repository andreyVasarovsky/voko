<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }

    public function dateDiff()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->diffForHumans();
    }
}
