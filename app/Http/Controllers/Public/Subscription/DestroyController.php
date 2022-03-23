<?php


namespace App\Http\Controllers\Public\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Subscription;

class DestroyController extends Controller
{
    public function __invoke(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->back();
    }
}
