<?php


namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ShowController extends Controller
{
    public function __invoke(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }
}
