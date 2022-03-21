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
    protected $withCount = ['likes'];

    const RELATED_POSTS_QTY = 3;

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

    public function getRelatedArticles()
    {
        $relatedArticles = [];

        $foundArticles = [];
        $foundArticlesIds = [];
        foreach ($this->tags as $tag) {
            $tagArticles = $tag->articles;
            if (!empty($tagArticles)) {
                //Calculate same tags qty
                foreach ($tagArticles as $article) {
                    $foundArticles[$article->id] = $article;
                    $foundArticlesIds[] = $article->id;
                }

                $calculatedArticleKeys = array_count_values($foundArticlesIds);
                arsort($calculatedArticleKeys);
                //Found most similar articles by post
                foreach ($calculatedArticleKeys as $articleId => $qty) {
                    if (intval($articleId) === intval($this->id))
                        continue;
                    if (count($relatedArticles) < self::RELATED_POSTS_QTY) {
                        $relatedArticles[$articleId] = $foundArticles[$articleId];
                    } else {
                        break;
                    }
                }
            }
        }
        //If is not enough relatedArticles => get random ones;
        if (count($relatedArticles) < self::RELATED_POSTS_QTY) {
            $qtyToAppend = self::RELATED_POSTS_QTY - count($relatedArticles);
            $randomArticles = Article::inRandomOrder()->whereNotIn('id', array_keys($relatedArticles))->limit($qtyToAppend)->get();
            if (!empty($randomArticles)){
                foreach ($randomArticles AS $article){
                    $relatedArticles[] = $article;
                }
            }
        }

        return $relatedArticles;
    }

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }
}
