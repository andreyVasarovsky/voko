<?php


namespace App\Http\Controllers\Public\Article;

use App\Http\Controllers\Admin\Article\BaseController;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class DestroyController extends BaseController
{
    public function __invoke(Article $article)
    {
        $this->service->delete($article);
        return redirect(route('public.profile.index', Auth::user()->id));
    }
}
