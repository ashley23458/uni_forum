@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <!--Bootstrap. (2019). Cards [Contains examples for cards.]. (4.3.1).
    Retrieved from https://getbootstrap.com/docs/4.3/components/card/-->
    <div class="card">
        <div class="card-header">
            <h2>Forums</h2>
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
                        <td>
                            <span class="badge badge-info">Number of Threads
                                <span class="badge badge-light">
                                    {{$forum->threads_count}}
                                </span>
                                <span class="sr-only">
                                    are inside the {{$forum->name}} forum
                                </span>
                            </span><br>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
