@extends('admin.main')
@extends('admin.nav')
@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-12 mb-2">
                            <h1 class="m-0 d-inline align-middle">Статьи</h1>
                        </div>
                        @if(Auth::user()->can('article_create'))
                            <div class="col-12 mb-2">
                                <a href="{{ route('admin.article.create') }}" type="button"
                                   class="btn btn-sm btn-success d-inline">Добавить</a>
                            </div>
                        @endif
                    </div>
                </div>
                @include('public.article.sort')
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        @if($articles->count() > 0)
                            @foreach($articles AS $article)
                                <div class="col-12 col-sm-6 col-md-4 col-xl-3 mt-2">
                                    <div class="article-admin-card">
                                        <div class="img-wrapper">
                                            <img src="{{ asset($article->preview) }}" alt="Картинка">
                                        </div>
                                        <div class="title">
                                            {{ $article->title }}
                                        </div>
                                        <div class="category">
                                            <span class="badge badge-dark">{{ $article->category->title }}</span>
                                            @if($article->is_from_reader)
                                                <span class="badge badge-info">От читателя!</span>
                                            @endif
                                        </div>
                                        <div class="desc text-center">
                                            {{ $article->desc }}<br>
                                            <span>
                                                ({{ $article->comments->count() }} <i class="fas fa-comments"></i>,
                                                {{ $article->likes_count }} <i class="fas fa-heart text-danger"></i>,
                                                {{ $article->view_qty }} <i class="fas fa-eye"></i>)
                                            </span>
                                        </div>
                                        <div class="action-list text-center mt-2">
                                            @if(Auth::user()->can('article_show'))
                                                <a href="{{ route('admin.article.show', $article->id) }}"
                                                   class="action">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @endif
                                            @if(Auth::user()->can('article_edit'))
                                                <a href="{{ route('admin.article.edit', $article->id) }}"
                                                   class="action">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endif
                                            @if(Auth::user()->can('article_delete'))
                                                <form action="{{ route('admin.article.destroy', $article->id) }}"
                                                      method="POST" class="action d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent p-0">
                                                        <i class="fas fa-trash-alt text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="article-tag-list text-center mt-2">
                                        @if($article->tags->count() > 0)
                                            @foreach($article->tags AS $tag)
                                                <span class="badge badge-primary mb-2">{{ $tag->title }}</span>
                                            @endforeach
                                        @else
                                            &nbsp;
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
