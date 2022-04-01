@extends('adminlte::page')

@section('title', __('slide.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Slide)
            <a href="{{ route('slides.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('slide.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('slide.list') }} <small>{{ __('app.total') }} : {{ $slides->total() }} {{ __('slide.slide') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('slide.search') }}</label>
                        <input placeholder="{{ __('slide.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('slide.search') }}" class="btn btn-secondary">
                    <a href="{{ route('slides.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead class="text-nowrap">
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('slide.name') }}</th>
                        <th>{{ __('slide.link') }}</th>
                        <th>{{ __('slide.description') }}</th>
                        <th>{{ __('slide.order') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slides as $key => $slide)
                    <tr>
                        <td class="text-center">{{ $slides->firstItem() + $key }}</td>
                        <td>{{ $slide->name }}</td>
                        <td>{{ $slide->link }}</td>
                        <td>{{ $slide->description }}</td>
                        <td>{{ $slide->order }}</td>
                        <td class="text-center">
                            @can('update', $slide)
                                <a href="{{ route('slides.index', ['action' => 'edit', 'id' => $slide->id] + Request::only('page', 'q')) }}" id="edit-slide-{{ $slide->id }}">{{ __('app.edit') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $slides->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
    <div class="col-md-4">
        @if(Request::has('action'))
        @include('admin.slides.forms')
        @endif
    </div>
</div>
@endsection
