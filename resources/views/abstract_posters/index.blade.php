@extends('layouts.app')

@section('title', __('abstract_poster.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\AbstractPoster)
            <a href="{{ route('abstract_posters.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('abstract_poster.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('abstract_poster.list') }} <small>{{ __('app.total') }} : {{ $abstractPosters->total() }} {{ __('abstract_poster.abstract_poster') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('abstract_poster.search') }}</label>
                        <input placeholder="{{ __('abstract_poster.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('abstract_poster.search') }}" class="btn btn-secondary">
                    <a href="{{ route('abstract_posters.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('abstract_poster.title') }}</th>
                        <th>{{ __('abstract_poster.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abstractPosters as $key => $abstractPoster)
                    <tr>
                        <td class="text-center">{{ $abstractPosters->firstItem() + $key }}</td>
                        <td>{{ $abstractPoster->title }}</td>
                        <td>{{ $abstractPoster->description }}</td>
                        <td class="text-center">
                            @can('update', $abstractPoster)
                                <a href="{{ route('abstract_posters.index', ['action' => 'edit', 'id' => $abstractPoster->id] + Request::only('page', 'q')) }}" id="edit-abstract_poster-{{ $abstractPoster->id }}">{{ __('app.edit') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $abstractPosters->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
    <div class="col-md-4">
        @if(Request::has('action'))
        @include('abstract_posters.forms')
        @endif
    </div>
</div>
@endsection
