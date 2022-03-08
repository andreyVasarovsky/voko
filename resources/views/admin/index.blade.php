@extends('admin.main')
@extends('admin.nav')
@section('content')
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/admin_logo.png')}}" alt="ADMIN" height="60" width="60">
    </div>
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Админ панель</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3> {{ $articles->count() }} </h3>
                                    <p>Статьи</p>
                                </div>
                                <div class="icon">
                                    <i class="ico fas fa-align-justify"></i>
                                </div>
                                <a href="{{ route('admin.article.index') }}" class="small-box-footer">Смотреть <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
