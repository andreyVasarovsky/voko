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
                            <h1 class="m-0 d-inline align-middle">Пользователи</h1>
                        </div>
                        <div class="col-12 mb-2">
                            <a href="{{ route('admin.user.create') }}" type="button"
                               class="btn btn-sm btn-success d-inline">Добавить</a>
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
            @include('admin.user.filter')
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            @if($users->count() > 0)
                                <table class="table table-hover hover-table-actions close-borders">
                                    <thead>
                                    <tr>
                                        <th scope="col">@sortablelink('id', 'ID')</th>
                                        <th scope="col">@sortablelink('name', 'Имя')</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Роль</th>
                                        <th scope="col">@sortablelink('articles_count', 'Кол-во статей')</th>
                                        <th scope="col">@sortablelink('comments_count', 'Кол-во комментариев')</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users AS $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td class="{{ ($user->banned ? 'text-danger' : 'text-success') }}">{{ $user->name }}</td>
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
                                            <td>{{ $user->articles->count() }}</td>
                                            <td>{{ $user->comments->count() }}</td>
                                            <td class="actions" style="font-size: 14px;">
                                                @if(Auth::user()->can('user_show'))
                                                    <a href="{{ route('admin.user.show', $user->id) }}" class="action">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                @endif
                                                @if(Auth::user()->can('user_edit'))
                                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="action">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endif
                                                @if(Auth::user()->can('user_delete'))
                                                    <form action="{{ route('admin.user.destroy', $user->id) }}"
                                                          method="POST" class="action">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="border-0 bg-transparent p-0">
                                                            <i class="fas fa-trash-alt text-danger" role="button"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                @if(Auth::user()->can('reader_ban_access'))
                                                    @if($user->banned)
                                                        <form action="{{ route('admin.user.ban.remove', $user->id) }}"
                                                              method="POST" class="action">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="border-0 bg-transparent p-0">
                                                                <i class="fas fa-lock-open text-success"
                                                                   role="button"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.user.ban.add', $user->id) }}"
                                                              method="POST" class="action">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="border-0 bg-transparent p-0">
                                                                <i class="fas fa-lock text-danger"
                                                                   role="button"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-dark" role="alert">
                                    Записей нет!
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
