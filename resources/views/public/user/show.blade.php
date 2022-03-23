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
                                <a href="" style="font-size: 32px;" class="text-secondary">
                                    <i class="fas fa-minus-square"></i>
                                </a>
                            @else
                                <a href="" style="font-size: 32px;" class="text-danger">
                                    <i class="fas fa-plus-square"></i>
                                </a>
                            @endif
                        </div>
                    @endif
                @endauth
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
