@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="d-inline">Статьи пользователя: {{ $author->name }}</h1>
                @auth
                    @if($author->id !== Auth::user()->id)
                        <div class="d-inline">
                            @if(Auth::user()->subscriptions->contains('subscribe_user_id', $author->id))
                                <form
                                    action="{{ route('public.subscription.destroy',
                                                Auth::user()
                                                    ->subscriptions
                                                    ->where('subscribe_user_id', $author->id)
                                                    ->first()
                                                    ->id) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-secondary bg-transparent border-0"
                                            style="font-size: 32px;">
                                        <i class="fas fa-minus-square"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('public.subscription.store') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="subscribe_user_id" value="{{ $author->id }}">
                                    <button type="submit" class="text-danger bg-transparent border-0"
                                            style="font-size: 32px;">
                                        <i class="fas fa-plus-square"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endif
                @endauth
            </div>
            <div class="col-12">
                <h5>(Кол-во подписчиков: {{ $author->subscribers->count() }})</h5>
            </div>
        </div>
        @if($articles->count() > 0)
            @include('public.article.sort')
            <div class="row">
                @include('public.article.articles')
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-dark" role="alert">
                        Статей пока нет, возвращайтесь позже!
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
