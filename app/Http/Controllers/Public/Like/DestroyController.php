<?php


namespace App\Http\Controllers\Public\Like;

use App\Http\Controllers\Controller;
use App\Models\Like;

class DestroyController extends Controller
{
    public function __invoke(Like $like)
    {
        $like->delete();
        return redirect()->back();
    }
}
