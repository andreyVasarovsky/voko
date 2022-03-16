<?php


namespace App\Http\Controllers\Public\Comment;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Public\Comment\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $comment = Comment::firstOrCreate($data);
        return redirect(route('public.article.show', $comment->article_id));
    }
}
