<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const BANNED = 'banned';

    protected function getCallbacks(): array
    {
        return [
            self::BANNED => [$this, 'banned'],
        ];
    }

    public function banned(Builder $builder, $value)
    {
        $builder->where('banned', '=', ($value === 'false' ? 0 : 1));
    }
}
