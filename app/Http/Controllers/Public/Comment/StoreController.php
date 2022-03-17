<?php


namespace App\Http\Controllers\Public\Comment;

use App\Models\Comment;
use App\Http\Controllers\Public\Comment\BaseController;
use App\Http\Requests\Public\Comment\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $comment = $this->service->store($data);
        return redirect(route('public.article.show', $comment->article_id));
    }
}
