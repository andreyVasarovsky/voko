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
                            <h1 class="m-0 d-inline align-middle">Категории</h1>
                        </div>
                        <div class="col-12 mb-2">
                            <a href="{{ route('admin.category.create') }}" type="button"
                               class="btn btn-sm btn-success d-inline">Добавить</a>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            @if($categories->count() > 0)
                                <table class="table table-hover hover-table-actions close-borders">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories AS $category)
                                        <tr>
                                            <th scope="row">{{ $category->id }}</th>
                                            <td>{{ $category->title }}</td>
                                            <td class="actions" style="font-size: 14px;">
                                                <a href="{{ route('admin.category.show', $category->id) }}" class="action">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.category.edit', $category->id) }}" class="action">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" class="action">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent p-0">
                                                        <i class="fas fa-trash-alt text-danger" role="button"></i>
                                                    </button>
                                                </form>
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
