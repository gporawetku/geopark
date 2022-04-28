@extends('adminlte::page')

@section('title', __('abstract_poster.list'))

@section('content')



    <div class="my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"><span class="fa fa-home text-dark-color"></span> หน้าหลัก</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('blog.list') }}</li>
            </ol>
        </nav>
        @can('create', new App\Models\AbstractPoster())
            <a href="{{ route('abstract_posters.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('abstract_poster.create') }}</a>
        @endcan
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">สไลด์</h3>
                    <div class="card-tools">
                        <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input placeholder="ค้นหา" name="q" type="text" id="q" class="form-control float-right" value="{{ request('q') }}">
                                <div class="input-group-append">
                                    <button type="submit" value="{{ __('abstract_poster.search') }}" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    {{-- <a href="{{ route('abstract_poster.index') }}" class="btn btn-link">{{ __('app.reset') }}</a> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-sm table-responsive-sm table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('app.table_no') }}</th>
                            <th>{{ __('abstract_poster.name') }}</th>
                            <th>{{ __('abstract_poster.description') }}</th>
                            <th class="text-center">{{ __('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($abstractPosters as $key => $abstractPoster)
                            <tr>
                                <td class="text-center">{{ $abstractPosters->firstItem() + $key }}</td>
                                <td>{{ $abstractPoster->name }}</td>
                                <td>{{ $abstractPoster->description }}</td>
                                <td class="text-center">
                                    @can('update', $abstractPoster)
                                        <a href="{{ route('abstract_posters.index',['action' => 'edit', 'id' => $abstractPoster->id] + Request::only('page', 'q')) }}"
                                            id="edit-abstract_poster-{{ $abstractPoster->id }}">{{ __('app.edit') }}</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer">
                    <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination pagination-sm justify-content-center m-0">
                            {{ $abstractPosters->appends(Request::except('page'))->render() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if (Request::has('action'))
                @include('admin.abstract_posters.forms')
            @endif
        </div>
    </div>
@endsection
