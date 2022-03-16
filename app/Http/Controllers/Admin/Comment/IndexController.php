<?php


namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = Comment::all();
        return view('admin.comment.index', compact('comments'));
    }
}
