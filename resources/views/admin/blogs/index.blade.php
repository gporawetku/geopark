@extends('adminlte::page')

@section('title', __('blog.list'))

@section('content_header')
    <div class="mb-3">
        <div class="float-right">
            @can('create', new App\Models\Blog())
                <a href="{{ route('blogs.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('blog.create') }}</a>
            @endcan
        </div>
        <h1 class="page-title">{{ __('blog.list') }} <small>{{ __('app.total') }} : {{ $blogs->total() }} {{ __('blog.blog') }}</small></h1>
</div>@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                        <div class="form-group">
                            <label for="q" class="form-label">{{ __('blog.search') }}</label>
                            <input placeholder="{{ __('blog.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                        </div>
                        <input type="submit" value="{{ __('blog.search') }}" class="btn btn-secondary">
                        <a href="{{ route('blogs.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                    </form>
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
                <div class="card-body">
                    {{ $blogs->appends(Request::except('page'))->render() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if (Request::has('action'))
                @include('admin.blogs.forms')
            @endif
        </div>
    </div>
@endsection
