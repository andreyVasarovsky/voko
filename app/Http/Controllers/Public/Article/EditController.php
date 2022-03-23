<?php


namespace App\Http\Controllers\Public\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Article $article)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $articleTagIds = array_keys($article->tags()->get()->keyBy('id')->toArray());
        return view('public.article.edit', compact('article', 'tags', 'categories', 'articleTagIds'));
    }
}
