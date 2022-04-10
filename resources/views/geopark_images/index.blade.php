@extends('layouts.app')

@section('title', __('geopark_image.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\GeoparkImage)
            <a href="{{ route('geopark_images.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('geopark_image.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('geopark_image.list') }} <small>{{ __('app.total') }} : {{ $geoparkImages->total() }} {{ __('geopark_image.geopark_image') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('geopark_image.search') }}</label>
                        <input placeholder="{{ __('geopark_image.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('geopark_image.search') }}" class="btn btn-secondary">
                    <a href="{{ route('geopark_images.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('geopark_image.name') }}</th>
                        <th>{{ __('geopark_image.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($geoparkImages as $key => $geoparkImage)
                    <tr>
                        <td class="text-center">{{ $geoparkImages->firstItem() + $key }}</td>
                        <td>{{ $geoparkImage->name }}</td>
                        <td>{{ $geoparkImage->description }}</td>
                        <td class="text-center">
                            @can('update', $geoparkImage)
                                <a href="{{ route('geopark_images.index', ['action' => 'edit', 'id' => $geoparkImage->id] + Request::only('page', 'q')) }}" id="edit-geopark_image-{{ $geoparkImage->id }}">{{ __('app.edit') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $geoparkImages->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
    <div class="col-md-4">
        @if(Request::has('action'))
        @include('geopark_images.forms')
        @endif
    </div>
</div>
@endsection
