@if (Request::get('action') == 'create')
@can('create', new App\Models\Blog)
    <form method="POST" action="{{ route('blogs.store') }}" accept-charset="UTF-8">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="form-label">{{ __('blog.name') }} <span class="form-required">*</span></label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('blog.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="content" class="form-label">{{ __('blog.content') }}</label>
            <textarea id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }} mytextarea" name="content" rows="4">{{ old('content') }}</textarea>
            {!! $errors->first('content', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input type="submit" value="{{ __('blog.create') }}" class="btn btn-success">
        <a href="{{ route('blogs.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
    </form>
@endcan
@endif
@if (Request::get('action') == 'edit' && $editableBlog)
@can('update', $editableBlog)
    <form method="POST" action="{{ route('blogs.update', $editableBlog) }}" accept-charset="UTF-8">
        {{ csrf_field() }} {{ method_field('patch') }}
        <div class="form-group">
            <label for="name" class="form-label">{{ __('blog.name') }} <span class="form-required">*</span></label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $editableBlog->name) }}" required>
            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('blog.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $editableBlog->description) }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="content" class="form-label">{{ __('blog.content') }}</label>
            <textarea id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }} mytextarea" name="content" rows="4">{{ old('content', $editableBlog->content) }}</textarea>
            {!! $errors->first('content', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input name="page" value="{{ request('page') }}" type="hidden">
        <input name="q" value="{{ request('q') }}" type="hidden">
        <input type="submit" value="{{ __('blog.update') }}" class="btn btn-success">
        <a href="{{ route('blogs.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        @can('delete', $editableBlog)
            <a href="{{ route('blogs.index', ['action' => 'delete', 'id' => $editableBlog->id] + Request::only('page', 'q')) }}" id="del-blog-{{ $editableBlog->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
        @endcan
    </form>
@endcan
@endif
@if (Request::get('action') == 'delete' && $editableBlog)
@can('delete', $editableBlog)
    <div class="card">
        <div class="card-header">{{ __('blog.delete') }}</div>
        <div class="card-body">
            <label class="form-label text-primary">{{ __('blog.name') }}</label>
            <p>{{ $editableBlog->name }}</p>
            <label class="form-label text-primary">{{ __('blog.description') }}</label>
            <p>{{ $editableBlog->description }}</p>
            {!! $errors->first('blog_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <hr style="margin:0">
        <div class="card-body text-danger">{{ __('blog.delete_confirm') }}</div>
        <div class="card-footer">
            <form method="POST" action="{{ route('blogs.destroy', $editableBlog) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                {{ csrf_field() }} {{ method_field('delete') }}
                <input name="blog_id" type="hidden" value="{{ $editableBlog->id }}">
                <input name="page" value="{{ request('page') }}" type="hidden">
                <input name="q" value="{{ request('q') }}" type="hidden">
                <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
            </form>
            <a href="{{ route('blogs.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        </div>
    </div>
@endcan
@endif


