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
                                {{$thread->user->username}}
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="font-weight-bold text-center font-italic text-muted">
                                Joined: <br>{{$thread->user->created_at->format('jS F Y')}}
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="badge badge-success">Likes <span class="badge badge-light">{{$statistics->sum('likes')}}</span></span>
                            <span class="badge badge-danger">Threads <span class="badge badge-light">{{$statistics->count()}}</span></span>
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
                    <p class="font-italic text-muted">Last updated {{ $thread->updated_at->format('jS F Y h:i A') }}</p>
                </div>
                <div class="card-footer text-muted">

                </div>
            </div>
        </div>
    </div>
@endsection
