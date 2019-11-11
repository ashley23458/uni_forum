@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                </tr>
                </thead>
                <tbody>
                @foreach ($forums as $forum)
                    <tr>
                        <th scope="row"><a href="{{ route('forum_threads', ['id' => $forum->id]) }}">{{$forum->name}}</a></th>
                        <td>Threads<br></td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
