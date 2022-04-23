@if (Request::get('action') == 'create')
    @can('create', new App\Models\Schedule())
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Schedule</h3>
            </div>
            <form method="POST" action="{{ route('schedules.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('schedule.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('schedule.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="1">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Date range</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" name="daterange" value="01/01/2022 - 01/31/2022" />
                        </div>
                    </div>
                    <input type="submit" value="{{ __('schedule.create') }}" class="btn btn-primary">
                    <a href="{{ route('schedules.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    @endcan
@endif
@if (Request::get('action') == 'edit' && $editableSchedule)
    @can('update', $editableSchedule)
        <form method="POST" action="{{ route('schedules.update', $editableSchedule) }}" accept-charset="UTF-8">
            {{ csrf_field() }} {{ method_field('patch') }}
            <div class="form-group">
                <label for="name" class="form-label">{{ __('schedule.name') }} <span class="form-required">*</span></label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $editableSchedule->name) }}" required>
                {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="description" class="form-label">{{ __('schedule.description') }}</label>
                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"
                    rows="4">{{ old('description', $editableSchedule->description) }}</textarea>
                {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
            </div>
            <input name="page" value="{{ request('page') }}" type="hidden">
            <input name="q" value="{{ request('q') }}" type="hidden">
            <input type="submit" value="{{ __('schedule.update') }}" class="btn btn-success">
            <a href="{{ route('schedules.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
            @can('delete', $editableSchedule)
                <a href="{{ route('schedules.index', ['action' => 'delete', 'id' => $editableSchedule->id] + Request::only('page', 'q')) }}" id="del-schedule-{{ $editableSchedule->id }}"
                    class="btn btn-danger float-right">{{ __('app.delete') }}</a>
            @endcan
        </form>
    @endcan
@endif
@if (Request::get('action') == 'delete' && $editableSchedule)
    @can('delete', $editableSchedule)
        <div class="card">
            <div class="card-header">{{ __('schedule.delete') }}</div>
            <div class="card-body">
                <label class="form-label text-primary">{{ __('schedule.name') }}</label>
                <p>{{ $editableSchedule->name }}</p>
                <label class="form-label text-primary">{{ __('schedule.description') }}</label>
                <p>{{ $editableSchedule->description }}</p>
                {!! $errors->first('schedule_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
            </div>
            <hr style="margin:0">
            <div class="card-body text-danger">{{ __('schedule.delete_confirm') }}</div>
            <div class="card-footer">
                <form method="POST" action="{{ route('schedules.destroy', $editableSchedule) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)"
                    class="del-form float-right" style="display: inline;">
                    {{ csrf_field() }} {{ method_field('delete') }}
                    <input name="schedule_id" type="hidden" value="{{ $editableSchedule->id }}">
                    <input name="page" value="{{ request('page') }}" type="hidden">
                    <input name="q" value="{{ request('q') }}" type="hidden">
                    <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                </form>
                <a href="{{ route('schedules.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
            </div>
        </div>
    @endcan
@endif
