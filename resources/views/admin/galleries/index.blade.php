@extends('adminlte::page')

@section('title', __('gallery.list'))

@section('content')
    <div class="my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"><span class="fa fa-home text-dark-color"></span> หน้าหลัก</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('slide.list') }}</li>
            </ol>
        </nav>
    </div>

    <div class="mb-3">
        <div class="float-right">
            @can('create', new App\Models\Gallery())
                <a href="{{ route('galleries.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('gallery.create') }}</a>
            @endcan
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('gallery.list') }}</h3>
                    <div class="card-tools">
                        <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input placeholder="ค้นหา" name="q" type="text" id="q" class="form-control float-right" value="{{ request('q') }}">
                                <div class="input-group-append">
                                    <button type="submit" value="{{ __('gallery.search') }}" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    {{-- <a href="{{ route('gallery.index') }}" class="btn btn-link">{{ __('app.reset') }}</a> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table table-sm table-responsive-sm table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('app.table_no') }}</th>
                            <th>{{ __('gallery.name') }}</th>
                            <th>{{ __('gallery.description') }}</th>
                            <th class="text-center">{{ __('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $key => $gallery)
                            <tr>
                                <td class="text-center">{{ $galleries->firstItem() + $key }}</td>
                                <td>{{ $gallery->name }}</td>
                                <td>{{ $gallery->description }}</td>
                                <td class="text-center">
                                    @can('update', $gallery)
                                        <a href="{{ route('galleries.index', ['action' => 'edit', 'id' => $gallery->id] + Request::only('page', 'q')) }}"
                                            id="edit-gallery-{{ $gallery->id }}">{{ __('app.edit') }}</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer">
                    <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination pagination-sm justify-content-center m-0">
                            {{ $galleries->appends(Request::except('page'))->render() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if (Request::has('action'))
                @include('admin.galleries.forms')
            @endif
        </div>
    </div>
@endsection
