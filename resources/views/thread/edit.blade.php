@extends('layouts.app')
@section('title', 'Edit thread')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Edit thread</h2>
            <div class="required-fields">
                <p>Fields marked with (<span class="text-danger">*</span>) are mandatory.</p>
            </div>
            <form method="POST" action="{{ route('thread.update', $thread->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="forum">Please select a forum <span class="text-danger">*</span></label>
                    <select name="forum_id" class="form-control" id="forum">
                        <option>Please select...</option>
                        @foreach ($forums as $forum)
                            <option value="{{$forum->id}}"
                                {{ (old('forum_id', $thread->forum_id) == $forum->id ? "selected":"") }}>
                                {{$forum->name}}
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
                    <label for="title">Thread Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{old('title', $thread->title)}}"  placeholder="Enter thread title">
                    @if ($errors->has('title'))
                        <div class="alert alert-error alert-dismissable">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="body">Message <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="body" name="body" rows="6">{{old('body', $thread->body)}}
                    </textarea>
                    @if ($errors->has('body'))
                        <div class="alert alert-error alert-dismissable">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
        </div>
    </div>
@endsection
