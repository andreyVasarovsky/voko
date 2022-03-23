<?php

namespace App\Http\Controllers\Public\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionsIndexController extends Controller
{
    public function __invoke()
    {
        $articles = Article::whereIn('user_id', function($query){
            $query->select('subscribe_user_id')
                ->from(with(new Subscription)->getTable())
                ->where('user_id', Auth::user()->id);
        })->get();

        return view('public.article.index', compact('articles'));
    }
}
