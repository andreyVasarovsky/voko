<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        $users = User::all();
        $articles = Article::all();
        $categories = Category::all();
        return view('admin.index', compact('articles', 'tags', 'categories', 'users'));
    }
}
