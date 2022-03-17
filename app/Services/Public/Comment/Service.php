<?php


namespace App\Services\Public\Comment;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class Service
{
    public function store($data): Comment
    {
        $data['user_id'] = Auth::user()->id;
        unset($data['g-recaptcha-response']);
        return Comment::firstOrCreate($data);
    }
}
