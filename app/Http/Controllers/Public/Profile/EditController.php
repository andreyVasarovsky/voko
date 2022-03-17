<?php


namespace App\Http\Controllers\Public\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        return view('public.profile.edit', compact('user'));
    }
}
