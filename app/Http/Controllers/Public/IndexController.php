<?php


namespace App\Http\Controllers\Public;


use App\Http\Controllers\Controller;
use App\Models\Article;

class IndexController extends Controller
{
    public function __invoke()
    {
        $articles = Article::withCount('likes')->orderBy('likes_count', 'desc')->limit(5)->get();

        return view('public.home', compact('articles'));
    }
}
