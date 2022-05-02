@extends('adminlte::page')

@section('title', __('schedule.list'))

@section('content')
    <div class="my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"><span class="fa fa-home text-dark-color"></span> หน้าหลัก</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('schedule.list') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('schedule.list') }}</h3>
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
                <div class="card-body">
                    <div id="external-events">
                        @foreach ($schedules as $key => $schedule)
                            @can('update', $schedule)
                                <a href="{{ route('schedules.index', ['action' => 'edit', 'id' => $schedule->id] + Request::only('page', 'q')) }}" id="edit-schedule-{{ $schedule->id }}">
                                    {{-- <div class="btn btn-primary external-schedule w-100 text-left" style="position: relative;">{{ $schedule->name }}</div> --}}
                                    <div class="card  w-100" style="width: 18rem;">
                                        <div class="card-header bg-primary">
                                            {{ $schedule->name }}
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text text-dark">{{ $schedule->description }}</p>
                                            {{-- <p class="card-text text-dark">{{ date('d-m-Y', strtotime($schedule->start_date)) }} - {{ date('d-m-Y', strtotime($schedule->end_date)) }}</p> --}}
                                        </div>
                                    </div>

                                </a>
                            @endcan
                        @endforeach
                        @if ($schedules->total() < 10)
                            @can('create', new App\Models\Schedule())
                                <a href="{{ route('schedules.index', ['action' => 'create']) }}">
                                    <div class="btn btn-light w-100 my-1" style="position: relative;">{{ __('schedule.create') }}</div>
                                </a>
                            @endcan
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination pagination-sm justify-content-center m-0">
                            {{ $schedules->appends(Request::except('page'))->render() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if (Request::has('action'))
                @include('admin.schedules.forms')
            @endif
        </div>
    </div>

    <style>
        .external-schedule {
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
            border-radius: 0.25rem;
            font-weight: 700;
            margin-bottom: 4px;
            padding: 5px 10px;
        }

    </style>

@endsection
