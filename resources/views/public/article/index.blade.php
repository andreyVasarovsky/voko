@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($articles->count() > 0)
                @foreach($articles AS $article)
                    <div class="col-12 col-md-3 mb-2">
                        <div class="card">
                            <span class="badge badge-secondary"
                                  style="position: absolute; font-size: 16px; background-color: black; right: 4px; top: 4px;">{{ $article->category->title }}</span>
                            <img class="card-img-top" src="{{ asset($article->preview) }}" alt="Image" style="min-height: 100px">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ $article->desc }}</p>
                                <div class="tags">
                                    @if($article->tags->count() > 0)
                                        @foreach($article->tags AS $tag)
                                            <span class="badge badge-primary mb-2" style="background-color: #5389fd; padding: 8px; font-size: 14px;">{{ $tag->title }}</span>
                                        @endforeach
                                    @else
                                        &nbsp;
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('public.article.show', $article->id) }}" class="btn btn-primary">Читать</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-dark" role="alert">
                    Статей пока нет, возвращайтесь позже!
                </div>
            @endif
        </div>
    </div>
@endsection
