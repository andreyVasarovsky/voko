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
                        <div class="col-sm-6 align-items-center">
                            <h1 class="m-0 d-inline">Статья: {{ $article->title }} ({{ $article->comments->count() }}
                                комментариев, {{ $article->likes_count }} <i class="fas fa-heart text-danger"></i>)
                            </h1>
                        </div>
                        @if(session('error'))
                            <div class="col-12 alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <h3 class="category" style="position: absolute; top: 4px; right: 18px;"><span
                                    class="badge badge-secondary">{{ $article->category->title }}</span></h3>
                            <img class="w-100" src="{{ asset($article->preview) }}" alt="Картинка">
                            <div class="desc text-center mt-2">
                                {{ $article->desc }}
                            </div>
                        </div>
                        <div class="col-8 text-center">
                            {!! $article->content !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 text-center">
                            @if($article->tags->count() > 0)
                                @foreach($article->tags AS $tag)
                                    <span class="badge badge-primary">{{ $tag->title }}</span>
                                @endforeach
                            @else
                                &nbsp;
                            @endif
                        </div>
                        <div class="col-8">
                            <div class="actions text-right mt-2">
                                @if(Auth::user()->can('article_edit'))
                                    <a href="{{ route('admin.article.edit', $article->id) }}" type="button"
                                       class="btn btn-primary">Редактировать</a>
                                @endif
                                @if(Auth::user()->can('article_delete'))
                                    <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.article.destroy', $article->id) }}" type="button"
                                           class="btn btn-danger">Удалить</a>
                                    </form>
                                @endif
                                @if(Auth::user()->can('article_access'))
                                    <a href="{{ route('admin.article.index') }}" type="button"
                                       class="btn btn-secondary">Вернутся</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-4">
                            <table class="table close-borders">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Комментарий</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($article->comments->count() > 0)
                                    @foreach($article->comments AS $comment)
                                        <tr>
                                            <td>{{ $comment->id }}</td>
                                            <td>{{ $comment->text }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">Пусто</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
