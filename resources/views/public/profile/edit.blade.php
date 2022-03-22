@extends('layouts.app')

@section('content')
    <div class="container mb-2">
        <div class="row">
            <div class="col-12 mb-2">
                <h1 class="mb-2">Мой профиль</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-6">
                <form action="{{ route('public.profile.update', $user->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name"><strong>Имя</strong></label>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="Имя"
                               value="{{ (empty(old('name'))) ? $user->name : old('name') }}">
                        @error('name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="old_password"><strong>Старый пароль</strong></label>
                        <input type="password" name="old_password" class="form-control" id="old_password"
                               placeholder="************">
                        @error('old_password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="password"><strong>Новый пароль</strong></label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               autocomplete="new-password" placeholder="************">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="password-confirm"><strong>Подтвердите пароль</strong></label>
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" autocomplete="new-password" placeholder="************">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
