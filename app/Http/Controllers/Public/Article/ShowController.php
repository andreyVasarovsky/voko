<?php


namespace App\Http\Controllers\Public\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ShowController extends Controller
{
    public function __invoke(Article $article)
    {
        $related = $article->getRelatedArticles();
        return view('public.article.show', compact('article', 'related'));
    }
}
