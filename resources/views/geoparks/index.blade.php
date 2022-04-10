@extends('layouts.app')

@section('title', __('geopark.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Geopark)
            <a href="{{ route('geoparks.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('geopark.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('geopark.list') }} <small>{{ __('app.total') }} : {{ $geoparks->total() }} {{ __('geopark.geopark') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('geopark.search') }}</label>
                        <input placeholder="{{ __('geopark.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('geopark.search') }}" class="btn btn-secondary">
                    <a href="{{ route('geoparks.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('geopark.name') }}</th>
                        <th>{{ __('geopark.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($geoparks as $key => $geopark)
                    <tr>
                        <td class="text-center">{{ $geoparks->firstItem() + $key }}</td>
                        <td>{{ $geopark->name }}</td>
                        <td>{{ $geopark->description }}</td>
                        <td class="text-center">
                            @can('update', $geopark)
                                <a href="{{ route('geoparks.index', ['action' => 'edit', 'id' => $geopark->id] + Request::only('page', 'q')) }}" id="edit-geopark-{{ $geopark->id }}">{{ __('app.edit') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $geoparks->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
    <div class="col-md-4">
        @if(Request::has('action'))
        @include('geoparks.forms')
        @endif
    </div>
</div>
@endsection
