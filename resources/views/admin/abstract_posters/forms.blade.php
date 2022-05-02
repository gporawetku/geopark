@if (Request::get('action') == 'create')
    @can('create', new App\Models\AbstractPoster())
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('abstract_poster.title_create') }}</h3>
            </div>
            <form method="POST" action="{{ route('abstract_posters.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('abstract_poster.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('abstract_poster.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="1">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">{{ __('abstract_poster.image') }}</label>
                        <div class="custom-file">
                            <input id="fileImage" type="file" class="custom-file-input {{ $errors->has('fileImage') ? ' is-invalid' : '' }}" name="fileImage" value="{{ old('fileImage') }}"
                                required>
                            <label for="fileImage" class="custom-file-label">เลือกไฟล์</label>
                            {!! $errors->first('fileImage', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="link" class="form-label">{{ __('abstract_poster.link') }}</label>
                                <input id="link" type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ old('link') }}">
                                {!! $errors->first('link', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="author" class="form-label">{{ __('abstract_poster.author') }}</label>
                                <input id="author" type="text" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" name="author" value="{{ old('author') }}" required>
                                {!! $errors->first('author', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="{{ __('abstract_poster.create') }}" class="btn btn-primary">
                    <a href="{{ route('abstract_posters.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    @endcan
@endif
@if (Request::get('action') == 'edit' && $editableAbstractPoster)
    @can('update', $editableAbstractPoster)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('abstract_poster.update') }}</h3>
            </div>
            <form method="POST" action="{{ route('abstract_posters.update', $editableAbstractPoster) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                <div class="card-body">
                    {{ csrf_field() }} {{ method_field('patch') }}
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('abstract_poster.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $editableAbstractPoster->name) }}"
                            required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('abstract_poster.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"
                            rows="1">{{ old('description', $editableAbstractPoster->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="order" class="form-label">{{ __('abstract_poster.image') }}</label>
                        <input id="oldFileImage" type="hidden" name="oldFileImage" value="{{ old('fileImage' , $editableAbstractPoster->image) }}">
                        <div class="custom-file">
                            <input id="fileImage" type="file" class="custom-file-input {{ $errors->has('fileImage') ? ' is-invalid' : '' }}" name="fileImage" value="{{ old('fileImage' , $editableAbstractPoster->image) }}">
                            <label for="fileImage" class="custom-file-label">{{ old('fileImage' , $editableAbstractPoster->image) }}</label>
                            {!! $errors->first('fileImage', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="link" class="form-label">{{ __('abstract_poster.link') }}</label>
                                <input id="link" type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ old('link', $editableAbstractPoster->link) }}">
                                {!! $errors->first('link', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="author" class="form-label">{{ __('abstract_poster.author') }}</label>
                                <input id="author" type="text" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" name="author" value="{{ old('author', $editableAbstractPoster->author) }}" required>
                                {!! $errors->first('author', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                    </div>

                    <input name="page" value="{{ request('page') }}" type="hidden">
                    <input name="q" value="{{ request('q') }}" type="hidden">
                    <input type="submit" value="{{ __('abstract_poster.update') }}" class="btn btn-primary">
                    <a href="{{ route('abstract_posters.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $editableAbstractPoster)
                        <a href="{{ route('abstract_posters.index',['action' => 'delete', 'id' => $editableAbstractPoster->id] + Request::only('page', 'q')) }}"
                            id="del-abstract_poster-{{ $editableAbstractPoster->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    @endcan
@endif
@if (Request::get('action') == 'delete' && $editableAbstractPoster)
    @can('delete', $editableAbstractPoster)
        <div class="card">
            <div class="card-header">{{ __('abstract_poster.delete') }}</div>
            <div class="card-body">
                <label class="form-label text-primary">{{ __('abstract_poster.name') }}</label>
                <p>{{ $editableAbstractPoster->name }}</p>
                <label class="form-label text-primary">{{ __('abstract_poster.description') }}</label>
                <p>{{ $editableAbstractPoster->description }}</p>
                {!! $errors->first('abstract_poster_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
            </div>
            <hr style="margin:0">
            <div class="card-body text-danger">{{ __('abstract_poster.delete_confirm') }}</div>
            <div class="card-footer">
                <form method="POST" action="{{ route('abstract_posters.destroy', $editableAbstractPoster) }}" accept-charset="UTF-8"
                    onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
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
