@extends('adminlte::page')

@section('title', __('schedule.list'))

@section('content')


<div class="my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('schedule.schedule') }}</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card card-gray-dark">
            <div class="card-header">
                <h3 class="card-title">Schedule Table</h3>
                <div class="card-tools">
                    <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input placeholder="Search" name="q" type="text" id="q" class="form-control float-right" value="{{ request('q') }}">
                            <div class="input-group-append">
                                <button type="submit" value="{{ __('schedule.search') }}" class="btn btn-default"><i class="fas fa-search"></i></button>
                                {{-- <a href="{{ route('schedule.index') }}" class="btn btn-link">{{ __('app.reset') }}</a> --}}
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('schedule.name') }}</th>
                        <th>{{ __('schedule.description') }}</th>
                        <th>{{ __('schedule.start_date') }}</th>
                        <th>{{ __('schedule.end_date') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $key => $schedule)
                    <tr>
                        <td class="text-center">{{ $schedules->firstItem() + $key }}</td>
                        <td>{{ $schedule->name }}</td>
                        <td>{{ $schedule->description }}</td>
                        <td>{{ $schedule->start_date }}</td>
                        <td>{{ $schedule->end_date }}</td>
                        <td class="text-center">
                            @can('update', $schedule)
                                <a href="{{ route('schedules.index', ['action' => 'edit', 'id' => $schedule->id] + Request::only('page', 'q')) }}" id="edit-schedule-{{ $schedule->id }}">{{ __('app.edit') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card-footer clearfix">
                @if ($schedules->total() < 10)
                    @can('create', new App\Models\Schedule)
                        <a href="{{ route('schedules.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('schedule.create') }}</a>
                    @endcan
                @endif
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $schedules->appends(Request::except('page'))->render() }}
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        @if(Request::has('action'))
        @include('admin.schedules.forms')
        @endif
    </div>
</div>
@endsection
