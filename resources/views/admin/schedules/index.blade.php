@extends('adminlte::page')

@section('title', __('schedule.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Schedule)
            <a href="{{ route('schedules.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('schedule.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('schedule.list') }} <small>{{ __('app.total') }} : {{ $schedules->total() }} {{ __('schedule.schedule') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('schedule.search') }}</label>
                        <input placeholder="{{ __('schedule.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('schedule.search') }}" class="btn btn-secondary">
                    <a href="{{ route('schedules.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('schedule.name') }}</th>
                        <th>{{ __('schedule.description') }}</th>
                        <th>{{ __('schedule.plan_date_time') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $key => $schedule)
                    <tr>
                        <td class="text-center">{{ $schedules->firstItem() + $key }}</td>
                        <td>{{ $schedule->name }}</td>
                        <td>{{ $schedule->description }}</td>
                        <td>{{ $schedule->plan_date_time }}</td>
                        <td class="text-center">
                            @can('update', $schedule)
                                <a href="{{ route('schedules.index', ['action' => 'edit', 'id' => $schedule->id] + Request::only('page', 'q')) }}" id="edit-schedule-{{ $schedule->id }}">{{ __('app.edit') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $schedules->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
    <div class="col-md-4">
        @if(Request::has('action'))
        @include('schedules.forms')
        @endif
    </div>
</div>
@endsection
