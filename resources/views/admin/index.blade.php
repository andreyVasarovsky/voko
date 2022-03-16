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
                        @if(Auth::user()->can('article_access'))
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3> {{ $articles->count() }} </h3>
                                        <p>Статьи</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ico fas fa-align-justify"></i>
                                    </div>
                                    <a href="{{ route('admin.article.index') }}" class="small-box-footer">Смотреть <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endif
                        @if(Auth::user()->can('tag_access'))
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3> {{ $tags->count() }} </h3>
                                        <p>Тэги</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ico fas fa-tags"></i>
                                    </div>
                                    <a href="{{ route('admin.tag.index') }}" class="small-box-footer">Смотреть <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endif
                        @if(Auth::user()->can('category_access'))
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3> {{ $categories->count() }} </h3>
                                        <p>Категории</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ico fas fa-list"></i>
                                    </div>
                                    <a href="{{ route('admin.category.index') }}" class="small-box-footer">Смотреть <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endif
                        @if(Auth::user()->can('user_access'))
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3> {{ $users->count() }} </h3>
                                        <p>Пользователи</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ico fas fa-user"></i>
                                    </div>
                                    <a href="{{ route('admin.user.index') }}" class="small-box-footer">Смотреть <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endif
                        @if(Auth::user()->can('comment_access'))
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3> {{ $comments->count() }} </h3>
                                        <p>Комментарии</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ico fas fa-comment"></i>
                                    </div>
                                    <a href="{{ route('admin.comment.index') }}" class="small-box-footer">Смотреть <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
