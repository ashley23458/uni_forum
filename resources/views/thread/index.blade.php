@extends('layouts.app')
@section('title', __('messages.threads'))
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{__('messages.threads')}}</h2>
        </div>
        <div class="card-body">
            @if (count ($threads) > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                        @foreach ($threads as $thread)
                            <tr>
                                <th scope="row"><a href="{{route('thread.show', $thread->id)}}">{{$thread->title}}</a></th>
                                <td>
                                    <div class="text-right">{{ __('messages.published_by') }}
                                        <span class="badge badge-primary">
                                            {{$thread->user->name}}
                                        </span>
                                        <br>{{ $thread->created_at->format('jS F Y h:i A') }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$threads->links()}}
            @endif
        </div>
    </div>

@endsection
