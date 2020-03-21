@extends('layouts.app')
@section('title', $thread->title)
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-light">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <img src="{{asset('images/avatar.png')}} " class="rounded-circle img-thumbnail" alt="avatar">
                        </li>
                        <li class="list-group-item">
                            <div class="font-weight-bold text-center">
                                {{$thread->user->name}}
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="font-weight-bold text-center font-italic text-muted">
                                {{ __('messages.joined') }}: <br>{{$thread->user->created_at->format('jS F Y')}}
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="badge badge-success">{{ __('messages.likes') }}
                                <span class="badge badge-light">
                                    {{$statistics->sum('likes')}}
                                </span>
                            </span>
                            <span class="badge badge-danger">{{ __('messages.threads') }}
                                <span class="badge badge-light">
                                    {{$statistics->count()}}
                                </span>
                            </span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header font-weight-bold">
                    <h2 class="card-title">{{$thread->title}}</h2>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$thread->body}}</p>
                    <p class="font-italic text-muted">{{ __('messages.last_updated') }} {{ $thread->updated_at->format('jS F Y h:i A') }}</p>
                </div>
                <div class="card-footer text-muted">
                    @can('access', $thread)
                        <form id="formDelete" method="post" class="float-right" action="{{ route('thread.destroy', $thread->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit">
                                <ion-icon name="trash"></ion-icon> {{ __('messages.delete') }}
                            </button>
                        </form>
                        <a href="{{route('thread.edit', $thread->id)}}" role="button" class="btn btn-secondary float-right">
                            <ion-icon name="paper"></ion-icon> {{ __('messages.edit') }}
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
