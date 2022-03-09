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
                        <div class="col-12 mb-2">
                            <a href="{{ route('admin.article.create') }}" type="button"
                               class="btn btn-sm btn-success d-inline">Добавить</a>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        @if($articles->count() > 0)
                            @foreach($articles AS $article)
                                <div class="col-12 col-sm-6 col-md-3 col-xl-2 mt-2">
                                    <div class="article-admin-card">
                                        <div class="img-wrapper">
                                            <img src="{{ asset($article->preview) }}" alt="Картинка">
                                        </div>
                                        <div class="title">
                                            {{ $article->title }}
                                        </div>
                                        <div class="category">
                                            <span class="badge badge-dark">{{ $article->category->title }}</span>
                                        </div>
                                        <div class="desc text-center">
                                            {{ $article->desc }}
                                        </div>
                                        <div class="action-list text-center mt-2">
                                            <a href="{{ route('admin.article.show', $article->id) }}" class="action">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.article.edit', $article->id) }}" class="action">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST" class="action d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent p-0">
                                                    <i class="fas fa-trash-alt text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="article-tag-list text-center mt-2">
                                        @if($article->tags->count() > 0)
                                            @foreach($article->tags AS $tag)
                                                <span class="badge badge-primary">{{ $tag->title }}</span>
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
