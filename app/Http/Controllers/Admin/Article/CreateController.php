<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.article.create');
    }
}
