@if (Request::get('action') == 'create')
@can('create', new App\Models\Banner)
    <form method="POST" action="{{ route('banners.store') }}" accept-charset="UTF-8">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="form-label">{{ __('banner.name') }} <span class="form-required">*</span></label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('banner.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input type="submit" value="{{ __('banner.create') }}" class="btn btn-success">
        <a href="{{ route('banners.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
    </form>
@endcan
@endif
@if (Request::get('action') == 'edit' && $editableBanner)
@can('update', $editableBanner)
    <form method="POST" action="{{ route('banners.update', $editableBanner) }}" accept-charset="UTF-8">
        {{ csrf_field() }} {{ method_field('patch') }}
        <div class="form-group">
            <label for="name" class="form-label">{{ __('banner.name') }} <span class="form-required">*</span></label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $editableBanner->name) }}" required>
            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('banner.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $editableBanner->description) }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input name="page" value="{{ request('page') }}" type="hidden">
        <input name="q" value="{{ request('q') }}" type="hidden">
        <input type="submit" value="{{ __('banner.update') }}" class="btn btn-success">
        <a href="{{ route('banners.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        @can('delete', $editableBanner)
            <a href="{{ route('banners.index', ['action' => 'delete', 'id' => $editableBanner->id] + Request::only('page', 'q')) }}" id="del-banner-{{ $editableBanner->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
        @endcan
    </form>
@endcan
@endif
@if (Request::get('action') == 'delete' && $editableBanner)
@can('delete', $editableBanner)
    <div class="card">
        <div class="card-header">{{ __('banner.delete') }}</div>
        <div class="card-body">
            <label class="form-label text-primary">{{ __('banner.name') }}</label>
            <p>{{ $editableBanner->name }}</p>
            <label class="form-label text-primary">{{ __('banner.description') }}</label>
            <p>{{ $editableBanner->description }}</p>
            {!! $errors->first('banner_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <hr style="margin:0">
        <div class="card-body text-danger">{{ __('banner.delete_confirm') }}</div>
        <div class="card-footer">
            <form method="POST" action="{{ route('banners.destroy', $editableBanner) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                {{ csrf_field() }} {{ method_field('delete') }}
                <input name="banner_id" type="hidden" value="{{ $editableBanner->id }}">
                <input name="page" value="{{ request('page') }}" type="hidden">
                <input name="q" value="{{ request('q') }}" type="hidden">
                <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
            </form>
            <a href="{{ route('banners.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        </div>
    </div>
@endcan
@endif
