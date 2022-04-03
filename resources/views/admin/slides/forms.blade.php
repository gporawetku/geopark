@if (Request::get('action') == 'create')
@can('create', new App\Models\Slide)
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('slides.store') }}" accept-charset="UTF-8">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="form-label">{{ __('slide.name') }} <span class="form-required">*</span></label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="description" class="form-label">{{ __('slide.description') }}</label>
                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
                {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="link" class="form-label">{{ __('slide.link') }}</label>
                <input id="link" type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ old('link') }}" required>
                {!! $errors->first('link', '<span class="invalid-feedback" role="alert">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="order" class="form-label">{{ __('slide.order') }}</label>
                <select id="order" class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order" required>
                    @for ($i = 0; $i < 10; $i++)
                    <option>{{ $i + 1 }}</option>
                    @endfor
                </select>
                {!! $errors->first('order', '<span class="invalid-feedback" role="alert">:message</span>') !!}
            </div>
            <input type="submit" value="{{ __('slide.create') }}" class="btn btn-success">
            <a href="{{ route('slides.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        </form>
    </div>
</div>
@endcan
@endif
@if (Request::get('action') == 'edit' && $editableSlide)
@can('update', $editableSlide)
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('slides.update', $editableSlide) }}" accept-charset="UTF-8">
            {{ csrf_field() }} {{ method_field('patch') }}
            <div class="form-group">
                <label for="name" class="form-label">{{ __('slide.name') }} <span class="form-required">*</span></label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $editableSlide->name) }}" required>
                {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="description" class="form-label">{{ __('slide.description') }}</label>
                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $editableSlide->description) }}</textarea>
                {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
            </div>
            <input name="page" value="{{ request('page') }}" type="hidden">
            <input name="q" value="{{ request('q') }}" type="hidden">
            <input type="submit" value="{{ __('slide.update') }}" class="btn btn-success">
            <a href="{{ route('slides.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
            @can('delete', $editableSlide)
                <a href="{{ route('slides.index', ['action' => 'delete', 'id' => $editableSlide->id] + Request::only('page', 'q')) }}" id="del-slide-{{ $editableSlide->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
            @endcan
        </form>
    </div>
</div>
@endcan
@endif
@if (Request::get('action') == 'delete' && $editableSlide)
@can('delete', $editableSlide)
    <div class="card">
        <div class="card-header">{{ __('slide.delete') }}</div>
        <div class="card-body">
            <label class="form-label text-primary">{{ __('slide.name') }}</label>
            <p>{{ $editableSlide->name }}</p>
            <label class="form-label text-primary">{{ __('slide.description') }}</label>
            <p>{{ $editableSlide->description }}</p>
            {!! $errors->first('slide_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <hr style="margin:0">
        <div class="card-body text-danger">{{ __('slide.delete_confirm') }}</div>
        <div class="card-footer">
            <form method="POST" action="{{ route('slides.destroy', $editableSlide) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                {{ csrf_field() }} {{ method_field('delete') }}
                <input name="slide_id" type="hidden" value="{{ $editableSlide->id }}">
                <input name="page" value="{{ request('page') }}" type="hidden">
                <input name="q" value="{{ request('q') }}" type="hidden">
                <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
            </form>
            <a href="{{ route('slides.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        </div>
    </div>
@endcan
@endif
