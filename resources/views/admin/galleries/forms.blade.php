@if (Request::get('action') == 'create')
    @can('create', new App\Models\Gallery())
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('gallery.title_create') }}</h3>
            </div>
            <form method="POST" action="{{ route('galleries.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('gallery.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('gallery.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="1">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group" id="input-image">
                        <label for="link_image" class="form-label">{{ __('gallery.link_image') }}</label>
                        <div class="custom-file">
                            <input id="link_image" type="file" class="custom-file-input {{ $errors->has('link_image') ? ' is-invalid' : '' }}" name="link_image" value="{{ old('link_image') }}">
                            <label for="link_image" class="custom-file-label">Choose file</label>
                            {!! $errors->first('link_image', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group" id="input-video">
                        <label for="link_video" class="form-label">{{ __('gallery.link_video') }}</label>
                        <div class="d-flex align-items-center">
                            https://youtu.be/
                            <input id="link_video" type="text" class="form-control {{ $errors->has('link_video') ? ' is-invalid' : '' }}" name="link_video" value="{{ old('link_video') }}">
                        </div>
                        {!! $errors->first('link_video', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group selected-gallery">
                        <label for="type" class="form-label">{{ __('gallery.type') }}</label>
                        <select id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" required>
                                <option value="1">รูปภาพจากงาน</option>
                                <option value="2">รูปภาพประกวด</option>
                                <option value="3">วิดีโอ</option>
                        </select>
                        {!! $errors->first('type', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <input type="submit" value="{{ __('gallery.create') }}" class="btn btn-primary">
                    <a href="{{ route('galleries.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    @endcan
@endif
@if (Request::get('action') == 'edit' && $editableGallery)
    @can('update', $editableGallery)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('gallery.edit') }}</h3>
            </div>
            <form method="POST" action="{{ route('galleries.update', $editableGallery) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">

                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('gallery.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $editableGallery->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('gallery.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"
                            rows="1">{{ old('description', $editableGallery->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group" id="input-image">
                        <label for="link_image" class="form-label">{{ __('gallery.link_image') }}</label>
                        <div class="custom-file">
                            <input id="link_image" type="file" class="custom-file-input {{ $errors->has('link_image') ? ' is-invalid' : '' }}" name="link_image" value="{{ old('link_image', $editableGallery->link) }}">
                            <label for="link_image" class="custom-file-label">{{ old('link_image', $editableGallery->link) }}</label>
                            {!! $errors->first('link_image', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group" id="input-video">
                        <label for="link_video" class="form-label">{{ __('gallery.link_video') }}</label>
                        <div class="d-flex align-items-center">
                            https://youtu.be/
                            <input id="link_video" type="text" class="form-control {{ $errors->has('link_video') ? ' is-invalid' : '' }}" name="link_video" value="{{ old('link_video', $editableGallery->link) }}">
                        </div>
                        {!! $errors->first('link_video', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group selected-gallery">
                        <label for="type" class="form-label">{{ __('gallery.type') }}</label>
                        <select id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" required>
                                <option value="1" {{ old('type', $editableGallery->type) == 1 ? 'selected':''  }}>รูปภาพจากงาน</option>
                                <option value="2" {{ old('type', $editableGallery->type) == 2 ? 'selected':''  }}>รูปภาพประกวด</option>
                                <option value="3" {{ old('type', $editableGallery->type) == 3 ? 'selected':''  }}>วิดีโอ</option>
                        </select>
                        {!! $errors->first('type', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <input name="page" value="{{ request('page') }}" type="hidden">
                    <input name="q" value="{{ request('q') }}" type="hidden">
                    <input type="submit" value="{{ __('gallery.update') }}" class="btn btn-primary">
                    <a href="{{ route('galleries.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $editableGallery)
                        <a href="{{ route('galleries.index', ['action' => 'delete', 'id' => $editableGallery->id] + Request::only('page', 'q')) }}" id="del-gallery-{{ $editableGallery->id }}"
                            class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    @endcan
@endif
@if (Request::get('action') == 'delete' && $editableGallery)
    @can('delete', $editableGallery)
        <div class="card">
            <div class="card-header">{{ __('gallery.delete') }}</div>
            <div class="card-body">
                <label class="form-label text-primary">{{ __('gallery.name') }}</label>
                <p>{{ $editableGallery->name }}</p>
                <label class="form-label text-primary">{{ __('gallery.description') }}</label>
                <p>{{ $editableGallery->description }}</p>
                {!! $errors->first('gallery_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
            </div>
            <hr style="margin:0">
            <div class="card-body text-danger">{{ __('gallery.delete_confirm') }}</div>
            <div class="card-footer">
                <form method="POST" action="{{ route('galleries.destroy', $editableGallery) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)"
                    class="del-form float-right" style="display: inline;">
                    {{ csrf_field() }} {{ method_field('delete') }}
                    <input name="gallery_id" type="hidden" value="{{ $editableGallery->id }}">
                    <input name="page" value="{{ request('page') }}" type="hidden">
                    <input name="q" value="{{ request('q') }}" type="hidden">
                    <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                </form>
                <a href="{{ route('galleries.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
            </div>
        </div>
    @endcan
@endif
@section('js')
    <script>
        let optionValue = $('#type').val();
        $("#input-image").show();

        $("#input-video").hide();
        $("#type").change(function() {
            let optionValue = $('#type').val();
            if (optionValue == 3) {
                $("#input-image").hide();
                $("#input-video").show();
            } else {
                $("#input-image").show();
                $("#input-video").hide();
            }
        })
    </script>
@stop
