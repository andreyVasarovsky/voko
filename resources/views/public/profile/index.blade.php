@extends('layouts.app')

@section('content')
    <div class="container mb-2">
        <div class="row">
            <div class="col-12 mb-2">
                <h1 class="mb-2">
                    Мой профиль
                    <a href="{{ route('public.profile.edit', Auth::user()->id) }}" class="action">
                        <i class="fas fa-edit"></i>
                    </a>
                </h1>
            </div>
            <div class="col-12">
                Имя: {{ Auth::user()->name }}
            </div>
            <div class="col-12">

            </div>
        </div>
    </div>
    @if(Auth::user()->can('reader_article_create'))
        @include('public.profile.article.index')
    @endif
    @include('public.article.liked')
    @include('public.user.subscriptions')
@endsection
