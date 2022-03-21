<?php

namespace App\Http\Controllers\Public\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class IndexController extends Controller
{
    public function __invoke()
    {
        $articles = Article::sortable()->get();
        return view('public.article.index', compact('articles'));
    }
}
