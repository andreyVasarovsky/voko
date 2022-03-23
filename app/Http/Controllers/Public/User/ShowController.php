<?php


namespace App\Http\Controllers\Public\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        return view('public.user.show', [
            'author' => $user,
            'articles' => $user->articles
        ]);
    }
}
