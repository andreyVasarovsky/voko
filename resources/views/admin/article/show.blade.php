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
                            <h1 class="m-0 d-inline">Просмотр статьи</h1>
                            <a href="{{ route('admin.article.edit', $article->id) }}" class="link-icon">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fas fa-trash-alt link-icon text-danger" role="button"></i>
                                </button>
                            </form>
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
                        <div class="col-12">
                            <table class="table close-borders">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Описание</th>
                                    <th scope="col">Контент</th>
                                    <th scope="col">Превью</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">{{ $article->id }}</th>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->desc }}</td>
                                    <td>{{ $article->content }}</td>
                                    <td>{{ $article->preview }}</td>
                                </tr>
                                </tbody>
                            </table>

                            <a href="{{ route('admin.article.index') }}" type="button" class="btn btn-danger">Вернутся</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
