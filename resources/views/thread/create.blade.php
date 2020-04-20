@extends('layouts.app')
@section('title',  __('messages.create_thread'))
@section('content')
@push('stylesheets')
    @trixassets
@endpush
    <div class="row">
        <div class="col-md-12">
            <h2>{{ __('messages.create_thread') }}</h2>
            <div class="required-fields">
                <p>{{ __('messages.mandatory_fields') }} (<span class="text-danger">*</span>)</p>
            </div>
            <form method="POST" action="{{ route('thread.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="forum">{{ __('messages.select_forum') }} <span class="text-danger">*</span></label>
                    <select name="forum_id" class="form-control" id="forum">
                        <option>{{ __('messages.please_select') }}</option>
                        @foreach ($forums as $forum)
                            <option value="{{$forum->id}}" {{ (old('forum_id') == $forum->id ? "selected":"") }}>
                                {{ __('messages.'.$forum->name) }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('forum_id'))
                        <div class="alert alert-error alert-dismissable">
                            {{ $errors->first('forum_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">{{ __('messages.thread_title') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"
                           placeholder="{{ __('messages.enter_thread_title') }}">
                    @if ($errors->has('title'))
                        <div class="alert alert-error alert-dismissable">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                @trix(\App\Thread::class, 'body')
                @if ($errors->has('thread-trixFields.*'))
                    <div class="alert alert-error alert-dismissable">
                        {{ $errors->first('thread-trixFields.*') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-secondary">{{ __('messages.submit') }}</button>
            </form>
        </div>
    </div>
@endsection
