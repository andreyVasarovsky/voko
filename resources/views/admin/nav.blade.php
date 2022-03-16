@section('nav')
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.index') }}" class="nav-link">Админ панель</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('public.index') }}" class="nav-link">Главная</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" role="button"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('admin.user.edit', Auth::user()->id) }}" class="d-block"
                       style="line-height: 14px;">
                        {{ Auth::user()->name }} <br>
                        <span style="font-size: 12px;"> {{ Auth::user()->email }} </span>
                    </a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    @if(Auth::user()->can('article_access'))
                        <li class="nav-item">
                            <a href="{{ route('admin.article.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-align-justify"></i>
                                <p>Статьи</p>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->can('tag_access'))
                        <li class="nav-item">
                            <a href="{{ route('admin.tag.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Тэги</p>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->can('category_access'))
                        <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Категории</p>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->can('user_access'))
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Пользователи</p>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->can('comment_access'))
                        <li class="nav-item">
                            <a href="{{ route('admin.comment.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-comment"></i>
                                <p>Комментарии</p>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
@endsection
