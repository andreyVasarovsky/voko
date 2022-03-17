<?php


namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use App\Http\Filters\UserFilter;
use App\Http\Requests\Admin\User\FilterRequest;
use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $query = $request->validated();
        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($query)]);
        $users = User::sortable()->withCount('comments')->withCount('articles')->filter($filter)->get();
        return view('admin.user.index', compact('users', 'query'));
    }
}
