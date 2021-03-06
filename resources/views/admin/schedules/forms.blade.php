@if (Request::get('action') == 'create')
    @can('create', new App\Models\Schedule())
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('schedule.edit') }}</h3>
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
                        <label>{{ __('schedule.se_date') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right {{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="daterange" />
                            <input type="hidden" class="form-control float-right" name="start_date" />
                            <input type="hidden" class="form-control float-right" name="end_date" />
                        </div>
                        {!! $errors->first('start_date', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('schedule.edit') }}</h3>
            </div>
            <form method="POST" action="{{ route('schedules.update', $editableSchedule) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('schedule.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $editableSchedule->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('schedule.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"
                            rows="1">{{ old('description', $editableSchedule->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('schedule.se_date') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right {{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="daterange" />
                            <input type="hidden" class="form-control float-right" name="start_date" value="{{ old('name', $editableSchedule->start_date) }}" />
                            <input type="hidden" class="form-control float-right" name="end_date" value="{{ old('name', $editableSchedule->end_date) }}" />
                        </div>
                        {!! $errors->first('start_date', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <input name="page" value="{{ request('page') }}" type="hidden">
                    <input name="q" value="{{ request('q') }}" type="hidden">
                    <input type="submit" value="{{ __('schedule.update') }}" class="btn btn-primary">
                    <a href="{{ route('schedules.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $editableSchedule)
                        <a href="{{ route('schedules.index', ['action' => 'delete', 'id' => $editableSchedule->id] + Request::only('page', 'q')) }}" id="del-schedule-{{ $editableSchedule->id }}"
                            class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
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
@section('js')
    <script>
        $(function() {
            var today = moment().format('DD-MM-YYYY');
            var endDate = moment().add(1, 'months').format('DD-MM-YYYY');

            var start_date = $('input[name="start_date"]').val();
            var end_date = $('input[name="end_date"]').val();
            if(start_date || end_date){
                var today = moment(start_date).format('DD-MM-YYYY');
                var endDate = moment(end_date).format('DD-MM-YYYY');
            }

            $('input[name="daterange"]').daterangepicker({
                startDate: today, // after open picker you'll see this dates as picked
                endDate: endDate,
                opens: 'left',
                locale: {
                    format: 'DD-MM-YYYY'
                }
            }, function(start, end, label) {
                $('input[name="start_date"]').val(start.format('YYYY-MM-DD HH:MM'));
                $('input[name="end_date"]').val(end.format('YYYY-MM-DD HH:MM'));
            })
            .val(today + " - " + endDate)
            ;
        });
    </script>
@stop
