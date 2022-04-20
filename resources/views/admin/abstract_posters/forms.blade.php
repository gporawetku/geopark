@if (Request::get('action') == 'create')
@can('create', new App\Models\AbstractPoster)
    <form method="POST" action="{{ route('abstract_posters.store') }}" accept-charset="UTF-8">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title" class="form-label">{{ __('abstract_poster.title') }} <span class="form-required">*</span></label>
            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
            {!! $errors->first('title', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('abstract_poster.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input type="submit" value="{{ __('app.create') }}" class="btn btn-success">
        <a href="{{ route('abstract_posters.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
    </form>
@endcan
@endif
@if (Request::get('action') == 'edit' && $editableAbstractPoster)
@can('update', $editableAbstractPoster)
    <form method="POST" action="{{ route('abstract_posters.update', $editableAbstractPoster) }}" accept-charset="UTF-8">
        {{ csrf_field() }} {{ method_field('patch') }}
        <div class="form-group">
            <label for="title" class="form-label">{{ __('abstract_poster.title') }} <span class="form-required">*</span></label>
            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $editableAbstractPoster->title) }}" required>
            {!! $errors->first('title', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('abstract_poster.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $editableAbstractPoster->description) }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input name="page" value="{{ request('page') }}" type="hidden">
        <input name="q" value="{{ request('q') }}" type="hidden">
        <input type="submit" value="{{ __('abstract_poster.update') }}" class="btn btn-success">
        <a href="{{ route('abstract_posters.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        @can('delete', $editableAbstractPoster)
            <a href="{{ route('abstract_posters.index', ['action' => 'delete', 'id' => $editableAbstractPoster->id] + Request::only('page', 'q')) }}" id="del-abstract_poster-{{ $editableAbstractPoster->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
        @endcan
    </form>
@endcan
@endif
@if (Request::get('action') == 'delete' && $editableAbstractPoster)
@can('delete', $editableAbstractPoster)
    <div class="card">
        <div class="card-header">{{ __('abstract_poster.delete') }}</div>
        <div class="card-body">
            <label class="form-label text-primary">{{ __('abstract_poster.title') }}</label>
            <p>{{ $editableAbstractPoster->title }}</p>
            <label class="form-label text-primary">{{ __('abstract_poster.description') }}</label>
            <p>{{ $editableAbstractPoster->description }}</p>
            {!! $errors->first('abstract_poster_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <hr style="margin:0">
        <div class="card-body text-danger">{{ __('abstract_poster.delete_confirm') }}</div>
        <div class="card-footer">
            <form method="POST" action="{{ route('abstract_posters.destroy', $editableAbstractPoster) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                {{ csrf_field() }} {{ method_field('delete') }}
                <input name="abstract_poster_id" type="hidden" value="{{ $editableAbstractPoster->id }}">
                <input name="page" value="{{ request('page') }}" type="hidden">
                <input name="q" value="{{ request('q') }}" type="hidden">
                <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
            </form>
            <a href="{{ route('abstract_posters.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        </div>
    </div>
@endcan
@endif
