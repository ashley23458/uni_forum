@extends('layouts.app')
@section('title', __('messages.edit_thread_title'))
@section('content')
    @push('stylesheets')
        @trixassets
    @endpush

        <div class="col-md-12">
            <h2>{{ __('messages.edit_thread_title') }}</h2>
            <div class="required-fields">
                <p>{{ __('messages.mandatory_fields') }} (<span class="text-danger">*</span>).</p>
            </div>
            <form method="POST" action="{{ route('thread.update', $thread->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="forum">{{ __('messages.select_forum') }} <span class="text-danger">*</span></label>
                    <select name="forum_id" class="form-control" id="forum">
                        <option>{{ __('messages.please_select') }}</option>
                        @foreach ($forums as $forum)
                            <option value="{{$forum->id}}"
                                {{ (old('forum_id', $thread->forum_id) == $forum->id ? "selected":"") }}>
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
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{old('title', $thread->title)}}"  placeholder="{{ __('messages.enter_thread_title') }}">
                    @if ($errors->has('title'))
                        <div class="alert alert-error alert-dismissable">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="body">{{ __('messages.message') }} <span class="text-danger">*</span></label>
                    {{-- <textarea name="body" id="body" cols="30" rows="10">{{ $thread->body }}</textarea> --}}
                    @trix($thread, 'body')
                    {{-- @trix($thread, 'body', [ 'hideTools' => ['text-tools'] ]) --}}
                    @if ($errors->has('body'))
                        <div class="alert alert-error alert-dismissable">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-secondary">{{ __('messages.submit') }}</button>
            </form>
        </div>
@endsection
