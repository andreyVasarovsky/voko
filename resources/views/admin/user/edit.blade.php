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
                        <div class="col-sm-6">
                            <h1 class="m-0">Редактировать пользователя</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Имя" value="{{ (empty(old('name'))) ? $user->name : old('name') }}">
                                    @error('name')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Обновить</button>
                                    <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-danger">К списку</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
