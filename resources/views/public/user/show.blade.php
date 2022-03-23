@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Статьи пользователя: {{ $author->name }}</h1>
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
