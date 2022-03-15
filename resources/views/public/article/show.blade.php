@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="text-center">{{ $article->title }}</h1>
            </div>
            <div class="col-12 col-md-4" style="position: relative;">
                <span class="badge badge-secondary"
                      style="position: absolute; font-size: 16px; background-color: black; margin: 4px;">{{ $article->category->title }}</span>
                <img src="{{ asset($article->preview) }}" class="img-fluid rounded w-100" alt="Preview">
                <div class="tags mt-2">
                    @if($article->tags->count() > 0)
                        @foreach($article->tags AS $tag)
                            <span class="badge badge-primary mb-2" style="background-color: #5389fd; padding: 8px; font-size: 14px;">{{ $tag->title }}</span>
                        @endforeach
                    @else
                        &nbsp;
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-8 text-center">
                {!! $article->content !!}
            </div>
        </div>
    </div>
@endsection
