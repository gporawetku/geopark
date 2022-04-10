@if (Request::get('action') == 'create')
@can('create', new App\Models\Geopark)
    <form method="POST" action="{{ route('geoparks.store') }}" accept-charset="UTF-8">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="form-label">{{ __('geopark.name') }} <span class="form-required">*</span></label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('geopark.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input type="submit" value="{{ __('geopark.create') }}" class="btn btn-success">
        <a href="{{ route('geoparks.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
    </form>
@endcan
@endif
@if (Request::get('action') == 'edit' && $editableGeopark)
@can('update', $editableGeopark)
    <form method="POST" action="{{ route('geoparks.update', $editableGeopark) }}" accept-charset="UTF-8">
        {{ csrf_field() }} {{ method_field('patch') }}
        <div class="form-group">
            <label for="name" class="form-label">{{ __('geopark.name') }} <span class="form-required">*</span></label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $editableGeopark->name) }}" required>
            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('geopark.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $editableGeopark->description) }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input name="page" value="{{ request('page') }}" type="hidden">
        <input name="q" value="{{ request('q') }}" type="hidden">
        <input type="submit" value="{{ __('geopark.update') }}" class="btn btn-success">
        <a href="{{ route('geoparks.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        @can('delete', $editableGeopark)
            <a href="{{ route('geoparks.index', ['action' => 'delete', 'id' => $editableGeopark->id] + Request::only('page', 'q')) }}" id="del-geopark-{{ $editableGeopark->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
        @endcan
    </form>
@endcan
@endif
@if (Request::get('action') == 'delete' && $editableGeopark)
@can('delete', $editableGeopark)
    <div class="card">
        <div class="card-header">{{ __('geopark.delete') }}</div>
        <div class="card-body">
            <label class="form-label text-primary">{{ __('geopark.name') }}</label>
            <p>{{ $editableGeopark->name }}</p>
            <label class="form-label text-primary">{{ __('geopark.description') }}</label>
            <p>{{ $editableGeopark->description }}</p>
            {!! $errors->first('geopark_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <hr style="margin:0">
        <div class="card-body text-danger">{{ __('geopark.delete_confirm') }}</div>
        <div class="card-footer">
            <form method="POST" action="{{ route('geoparks.destroy', $editableGeopark) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                {{ csrf_field() }} {{ method_field('delete') }}
                <input name="geopark_id" type="hidden" value="{{ $editableGeopark->id }}">
                <input name="page" value="{{ request('page') }}" type="hidden">
                <input name="q" value="{{ request('q') }}" type="hidden">
                <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
            </form>
            <a href="{{ route('geoparks.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        </div>
    </div>
@endcan
@endif
