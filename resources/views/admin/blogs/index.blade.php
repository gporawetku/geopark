@extends('adminlte::page')

@section('title', __('blog.list'))

@section('content_header')

@stop

@section('content')
    <div class="my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"><span class="fa fa-home text-dark-color"></span> หน้าหลัก</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('blog.list') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('blog.list') }}</h3>
                    <div class="card-tools">
                        <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input placeholder="Search" name="q" type="text" id="q" class="form-control float-right" value="{{ request('q') }}">
                                <div class="input-group-append">
                                    <button type="submit" value="{{ __('blog.search') }}" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    {{-- <a href="{{ route('blog.index') }}" class="btn btn-link">{{ __('app.reset') }}</a> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-sm table-responsive-sm table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('app.table_no') }}</th>
                            <th>{{ __('blog.name') }}</th>
                            <th>{{ __('blog.description') }}</th>
                            <th class="text-center">{{ __('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $key => $blog)
                            <tr>
                                <td class="text-center">{{ $blogs->firstItem() + $key }}</td>
                                <td>{{ $blog->name }}</td>
                                <td>{{ $blog->description }}</td>
                                <td class="text-center">
                                    @can('update', $blog)
                                        <a href="{{ route('blogs.index', ['action' => 'edit', 'id' => $blog->id] + Request::only('page', 'q')) }}"
                                            id="edit-blog-{{ $blog->id }}">{{ __('app.edit') }}</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer">
                    <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination pagination-sm justify-content-center m-0">
                            {{ $blogs->appends(Request::except('page'))->render() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="float-right">
                @can('create', new App\Models\Blog())
                    <a href="{{ route('blogs.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('blog.create') }}</a>
                @endcan
            </div>
        </div>
        <div class="col-md-4">
            @if (Request::has('action'))
                @include('admin.blogs.forms')
            @endif
        </div>
    </div>
@endsection
