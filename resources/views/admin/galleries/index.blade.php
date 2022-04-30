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
    @if (!Request::has('action'))
        <div class="my-3">
            @can('create', new App\Models\Gallery())
                <a href="{{ route('galleries.index', ['action' => 'create']) }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> {{ __('gallery.title_create') }}</a>
            @endcan
        </div>
    @endif
    <div class="row d-flex justify-content-center">
        @if (!Request::has('action'))
            <div class="col-md-12">
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

                    <table class="table table-sm table-responsive-sm table-hover projects">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('app.table_no') }}</th>
                                <th>{{ __('gallery.image') }}</th>
                                <th>{{ __('gallery.name') }}</th>
                                <th>{{ __('gallery.link') }}</th>
                                <th>{{ __('gallery.type') }}</th>
                                <th class="text-center">{{ __('app.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $key => $gallery)
                                <tr>
                                    <td class="text-center">{{ $galleries->firstItem() + $key }}</td>
                                    <td>
                                        @if ($gallery->type == 1)
                                            <img src="{{ 'images/galleries/activity/' . $gallery->link }}" alt="" style="height: 5rem">
                                        @elseif ($gallery->type == 2)
                                            <img src="{{ 'images/galleries/contest/' . $gallery->link }}" alt="" style="height: 5rem">
                                        @elseif ($gallery->type == 3)
                                            <img src="{{ 'http://img.youtube.com/vi/' . $gallery->link . '/0.jpg' }}" style="height: 5rem">
                                        @endif
                                    </td>
                                    <td>{{ $gallery->name }}</td>
                                    <td>{{ $gallery->type == 3 ? 'https://youtu.be/' . $gallery->link : $gallery->link }}</td>
                                    <td>
                                        <span class="badge bg-success">
                                            {{ $gallery->type == 1 ? 'รูปภาพจากงาน' : '' }}
                                            {{ $gallery->type == 2 ? 'รูปภาพประกวด' : '' }}
                                            {{ $gallery->type == 3 ? 'วิดีโอ' : '' }}
                                        </span>
                                    </td>
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
        @endif
        <div class="col-md-4">
            @if (Request::has('action'))
                @include('admin.galleries.forms')
            @endif
        </div>
    </div>


@endsection
