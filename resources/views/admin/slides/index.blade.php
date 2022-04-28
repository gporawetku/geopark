@extends('adminlte::page')

@section('title', __('slide.list'))
@section('content')
    <div class="my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"><span class="fa fa-home text-dark-color"></span> หน้าหลัก</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('slide.list') }}</li>
            </ol>
        </nav>
    </div>

    <div class="row d-flex justify-content-center">
        @if (!Request::has('action'))
            <div class="col-md-12">
                <div class="card card-solid">
                    <div class="card-header">
                        <h3 class="card-title">สไลด์</h3>
                        <div class="card-tools">
                            <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input placeholder="ค้นหา" name="q" type="text" id="q" class="form-control float-right" value="{{ request('q') }}">
                                    <div class="input-group-append">
                                        <button type="submit" value="{{ __('slide.search') }}" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        {{-- <a href="{{ route('slides.index') }}" class="btn btn-link">{{ __('app.reset') }}</a> --}}
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row">
                            @foreach ($slides as $key => $slide)
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-2">
                                    @can('update', $slide)
                                        <a class="text-white " href="{{ route('slides.index', ['action' => 'edit', 'id' => $slide->id] + Request::only('page', 'q')) }}"
                                            id="edit-slide-{{ $slide->id }}">
                                            <div class="position-relative">
                                                <img src="{{ asset($slide->image) }}" alt="Photo 2" class="img-fluid">
                                                <div class="ribbon-wrapper w-100 h-100 d-flex flex-column justify-content-center align-items-center bg-gradiant ">
                                                    <b>{{ $slide->order }}</b>
                                                    <small>{{ $slide->name }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    @endcan
                                </div>
                            @endforeach
                            <div class="col-12 col-sm-12 col-md-12 mb-2">
                                @if ($slides->total() < 10)
                                    @can('create', new App\Models\Slide())
                                        <a class="navbar navbar-light bg-light d-flex align-items-center justify-content-center"
                                            href="{{ route('slides.index', ['action' => 'create']) }}">{{ __('slide.create') }}</a>
                                    @endcan
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <nav aria-label="Contacts Page Navigation">
                            <ul class="pagination pagination-sm justify-content-center m-0">
                                {{ $slides->appends(Request::except('page'))->render() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        @endif
        @if (Request::has('action'))
            <div class="col-md-4">
                @include('admin.slides.forms')
            </div>
        @endif
    </div>

    <style>
        .img-fluid{
            width: 33rem!important;
            height: 12rem!important;
        }
        .bg-gradiant {
            background-color: rgba(0, 0, 0, 0.4);
            right: 0px !important;
            top: 0px !important;
        }
        .photo-wh-default{
            height: 5rem
        }

    </style>
@endsection
