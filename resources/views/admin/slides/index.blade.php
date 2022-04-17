@extends('adminlte::page')

@section('title', __('slide.list'))

@section('content')


    <div class="my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('slide.list') }}</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Slide Table</h3>
                    <div class="card-tools">
                        <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input placeholder="Search" name="q" type="text" id="q" class="form-control float-right" value="{{ request('q') }}">
                                <div class="input-group-append">
                                    <button type="submit" value="{{ __('slide.search') }}" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    {{-- <a href="{{ route('slides.index') }}" class="btn btn-link">{{ __('app.reset') }}</a> --}}
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <table class="table table-sm table-responsive-sm table-hover">
                    <thead class="text-nowrap">
                        <tr>
                            <th class="text-center">{{ __('app.table_no') }}</th>
                            <th>{{ __('slide.image') }}</th>
                            <th>{{ __('slide.name') }}</th>
                            <th>{{ __('slide.order') }}</th>
                            <th class="text-center">{{ __('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slides as $key => $slide)
                            <tr>
                                <td class="text-center">{{ $slides->firstItem() + $key }}</td>
                                <td width="10%">
                                    <img class="w-100" src="{{ asset($slide->image) }}" />
                                </td>
                                <td>{{ $slide->name }}</td>
                                <td>
                                    <span class="badge badge-success">{{ $slide->order }}</span>
                                </td>

                                <td class="text-center">
                                    @can('update', $slide)
                                        <a href="{{ route('slides.index', ['action' => 'edit', 'id' => $slide->id] + Request::only('page', 'q')) }}"
                                            id="edit-slide-{{ $slide->id }}" class="btn btn-default  btn-sm w-50"><i class="fas fa-edit"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer clearfix">
                    @if ($slides->total() < 10)
                        @can('create', new App\Models\Slide())
                            <a href="{{ route('slides.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('slide.create') }}</a>
                        @endcan
                    @endif
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $slides->appends(Request::except('page'))->render() }}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if (Request::has('action'))
                @include('admin.slides.forms')
            @endif
        </div>
    </div>
@endsection
