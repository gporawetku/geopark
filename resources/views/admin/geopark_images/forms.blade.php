@if (Request::get('action') == 'create')
@can('create', new App\Models\GeoparkImage)
    <form method="POST" action="{{ route('geopark_images.store') }}" accept-charset="UTF-8">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="form-label">{{ __('geopark_image.name') }} <span class="form-required">*</span></label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('geopark_image.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input type="submit" value="{{ __('geopark_image.create') }}" class="btn btn-success">
        <a href="{{ route('geopark_images.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
    </form>
@endcan
@endif
@if (Request::get('action') == 'edit' && $editableGeoparkImage)
@can('update', $editableGeoparkImage)
    <form method="POST" action="{{ route('geopark_images.update', $editableGeoparkImage) }}" accept-charset="UTF-8">
        {{ csrf_field() }} {{ method_field('patch') }}
        <div class="form-group">
            <label for="name" class="form-label">{{ __('geopark_image.name') }} <span class="form-required">*</span></label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $editableGeoparkImage->name) }}" required>
            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('geopark_image.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $editableGeoparkImage->description) }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input name="page" value="{{ request('page') }}" type="hidden">
        <input name="q" value="{{ request('q') }}" type="hidden">
        <input type="submit" value="{{ __('geopark_image.update') }}" class="btn btn-success">
        <a href="{{ route('geopark_images.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        @can('delete', $editableGeoparkImage)
            <a href="{{ route('geopark_images.index', ['action' => 'delete', 'id' => $editableGeoparkImage->id] + Request::only('page', 'q')) }}" id="del-geopark_image-{{ $editableGeoparkImage->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
        @endcan
    </form>
@endcan
@endif
@if (Request::get('action') == 'delete' && $editableGeoparkImage)
@can('delete', $editableGeoparkImage)
    <div class="card">
        <div class="card-header">{{ __('geopark_image.delete') }}</div>
        <div class="card-body">
            <label class="form-label text-primary">{{ __('geopark_image.name') }}</label>
            <p>{{ $editableGeoparkImage->name }}</p>
            <label class="form-label text-primary">{{ __('geopark_image.description') }}</label>
            <p>{{ $editableGeoparkImage->description }}</p>
            {!! $errors->first('geopark_image_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <hr style="margin:0">
        <div class="card-body text-danger">{{ __('geopark_image.delete_confirm') }}</div>
        <div class="card-footer">
            <form method="POST" action="{{ route('geopark_images.destroy', $editableGeoparkImage) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                {{ csrf_field() }} {{ method_field('delete') }}
                <input name="geopark_image_id" type="hidden" value="{{ $editableGeoparkImage->id }}">
                <input name="page" value="{{ request('page') }}" type="hidden">
                <input name="q" value="{{ request('q') }}" type="hidden">
                <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
            </form>
            <a href="{{ route('geopark_images.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        </div>
    </div>
@endcan
@endif
