@extends('adminlte::page')

@section('title', __('banner.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Banner)
            <a href="{{ route('banners.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('banner.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('banner.list') }} <small>{{ __('app.total') }} : {{ $banners->total() }} {{ __('banner.banner') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('banner.search') }}</label>
                        <input placeholder="{{ __('banner.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('banner.search') }}" class="btn btn-secondary">
                    <a href="{{ route('banners.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('banner.name') }}</th>
                        <th>{{ __('banner.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $key => $banner)
                    <tr>
                        <td class="text-center">{{ $banners->firstItem() + $key }}</td>
                        <td>{{ $banner->name }}</td>
                        <td>{{ $banner->description }}</td>
                        <td class="text-center">
                            @can('update', $banner)
                                <a href="{{ route('banners.index', ['action' => 'edit', 'id' => $banner->id] + Request::only('page', 'q')) }}" id="edit-banner-{{ $banner->id }}">{{ __('app.edit') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $banners->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
    <div class="col-md-4">
        @if(Request::has('action'))
        @include('banners.forms')
        @endif
    </div>
</div>
@endsection
