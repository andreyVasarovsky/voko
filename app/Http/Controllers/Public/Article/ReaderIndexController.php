<?php

namespace App\Http\Controllers\Public\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ReaderIndexController extends Controller
{
    public function __invoke()
    {
        $articles = Article::sortable()->where('is_from_reader', true)->get();
        return view('public.article.index', compact('articles'));
    }
}
