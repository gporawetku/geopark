@extends('layouts.app')

@section('title', __('information.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Information)
            <a href="{{ route('information.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('information.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('information.list') }} <small>{{ __('app.total') }} : {{ $information->total() }} {{ __('information.information') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('information.search') }}</label>
                        <input placeholder="{{ __('information.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('information.search') }}" class="btn btn-secondary">
                    <a href="{{ route('information.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('information.name') }}</th>
                        <th>{{ __('information.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($information as $key => $information)
                    <tr>
                        <td class="text-center">{{ $information->firstItem() + $key }}</td>
                        <td>{{ $information->name }}</td>
                        <td>{{ $information->description }}</td>
                        <td class="text-center">
                            @can('update', $information)
                                <a href="{{ route('information.index', ['action' => 'edit', 'id' => $information->id] + Request::only('page', 'q')) }}" id="edit-information-{{ $information->id }}">{{ __('app.edit') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $information->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
    <div class="col-md-4">
        @if(Request::has('action'))
        @include('information.forms')
        @endif
    </div>
</div>
@endsection
