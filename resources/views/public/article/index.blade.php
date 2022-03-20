@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($articles->count() > 0)
                @include('public.article.articles')
            @else
                <div class="alert alert-dark" role="alert">
                    Статей пока нет, возвращайтесь позже!
                </div>
            @endif
        </div>
    </div>
@endsection
