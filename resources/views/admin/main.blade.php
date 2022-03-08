<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Фото гелерея (Админ панель)</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- For bootstrap select -->
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css') }}"/>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
@yield('nav')
@yield('content')
<footer class="main-footer">
    <strong>Copyright &copy; 2022 Фото гелерея.</strong> Все права защищены.
    <div class="float-right d-none d-sm-inline-block">
        <b>Версия</b> 1.0.0
    </div>
</footer>
<script src=" {{asset('plugins/jquery/jquery.min.js')}} "></script>
<script type="text/javascript" src="{{ asset('https://cdn.jsdelivr.net/momentjs/latest/moment.min.js') }}"></script>
<script src=" {{asset('plugins/daterangepicker/daterangepicker.js')}} "></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>


<!-- For bootstrap select -->
<script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js') }}"></script>

<script src="{{ asset('js/admin/scripts.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>
</html>
