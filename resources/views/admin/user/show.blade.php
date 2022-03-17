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
                            <h1 class="m-0 d-inline">Просмотр позльзователя</h1>
                            @if(Auth::user()->can('user_edit'))
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="link-icon">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endif
                            @if(Auth::user()->can('user_delete'))
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="fas fa-trash-alt link-icon text-danger" role="button"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                        @if($errors->any())
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <table class="table close-borders">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Имя</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Роль</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if($user->roles->count() > 0)
                                        <td>
                                            @foreach($user->roles AS $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-danger">Вернутся</a>
                        </div>
                        <div class="col-6">
                            <table class="table close-borders">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Статья</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($user->articles->count() > 0)
                                    @foreach($user->articles AS $article)
                                        <tr>
                                            <td>{{ $article->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.article.show', $article->id) }}">{{ $article->title }}</a>
                                            </td>
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
                        <div class="offset-6 col-6">
                            <table class="table close-borders">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Комментарий</th>
                                    <th scope="col">Статья</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($user->comments->count() > 0)
                                    @foreach($user->comments AS $comment)
                                        <tr>
                                            <td>{{ $comment->id }}</td>
                                            <td>{{ $comment->text }}</td>
                                            <td>
                                                <a href="{{ route('admin.article.show', $comment->article->id) }}">{{ $comment->article->title }}</a>
                                            </td>
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
