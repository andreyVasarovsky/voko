@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="text-center">{{ $article->title }}</h1>
            </div>
            <div class="col-12 col-md-4" style="position: relative;">
                <div class="badge-list" style="position: absolute; font-size: 16px; margin: 4px;">
                    <span class="badge badge-secondary" style="background-color: black;">{{ $article->category->title }}</span>
                    @if($article->is_from_reader)
                        <span class="badge badge-info" style="background-color: red;">От читателя!</span>
                    @endif
                </div>
                <img src="{{ asset($article->preview) }}" class="img-fluid rounded w-100" alt="Preview">
                <div class="tags mt-2">
                    @if($article->tags->count() > 0)
                        @foreach($article->tags AS $tag)
                            <span class="badge badge-primary mb-2"
                                  style="background-color: #5389fd; padding: 8px; font-size: 14px;">{{ $tag->title }}</span>
                        @endforeach
                    @else
                        &nbsp;
                    @endif
                </div>
                <div class="statistics mt-2">
                    <div class="likes d-inline">
                        {{ $article->likes_count }}
                        @guest
                            <i class="far fa-heart"></i>
                        @else
                            @if($article->isLikedByCurrentUser())
                                <form action="{{ route('public.like.destroy', $article->getCurrentUserLike()->id) }}"
                                      class="d-inline"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="fas fa-heart text-danger" role="button"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('public.like.store') }}" class="d-inline"
                                      method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="far fa-heart" role="button"></i>
                                    </button>
                                </form>
                            @endif
                        @endguest
                    </div>
                    <div class="views d-inline">
                        {{ $article->view_qty }} <i class="fas fa-eye"></i> &nbsp;
                    </div>
                    <div class="author">
                        Автор:
                        <a href="{{ route('public.user.show', $article->user->id) }}">{{ $article->user->name }}</a>
                        (Кол-во подписчиков: {{ $article->user->subscribers->count() }})
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 text-center">
                {!! $article->content !!}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <strong>Похожие статьи:</strong>
            </div>
            @include('public.article.related')
        </div>
        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>
        @if($article->comments->count() > 0)
            @include('public.article.comments')
        @endif
        @guest
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-dark" role="alert">
                        Авторизируйтесь, что бы оставлять комментарии!
                    </div>
                </div>
            </div>
        @else
            @if(Auth::user()->banned)
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            Вы заблокированы и не можете добавлять комментарии!
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('public.comment.store') }}" method="POST">
                            @csrf
                            <input type="text" name="article_id" value="{{$article->id}}" class="d-none">
                            <div class="form-group mb-2">
                                <label for="region">Комментарий</label>
                                <textarea name="text" class="form-control" id="text"
                                          placeholder="Комментарий">{{ (empty(old('text'))) ? '' : old('text') }}</textarea>
                                @error('text')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            @if(config('services.recaptcha.key'))
                                <div class="row mb-2">
                                    <div class="g-recaptcha"
                                         data-sitekey="{{config('services.recaptcha.key')}}">
                                    </div>
                                    @error('g-recaptcha-response')
                                    <div class="col-md-6">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endguest
    </div>
@endsection
