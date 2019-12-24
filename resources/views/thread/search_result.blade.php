@extends('layouts.app')
@section('title', 'Threads')
@section('content')
    <!--Bootstrap. (2019). Cards [Contains examples for cards.]. (4.3.1).
        Retrieved from https://getbootstrap.com/docs/4.3/components/card/-->
    <div class="card">
        <div class="card-header">
            <h2>Threads</h2>
        </div>
        <div class="card-body">
            @if (count($threads) > 0)
            <p>Found {{count($threads)}} search result(s) for "{{ $searchTerm }}". </p>
            <!--Bootstrap. (2019). Tables [Contains examples for a responsive table.]. (4.3.1).
            Retrieved from https://getbootstrap.com/docs/4.3/content/tables/#responsive-tables-->
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
                                    <div class="text-right">Published by
                                        <span class="badge badge-primary">
                                            {{$thread->user->username}}
                                        </span>
                                        <br>{{ $thread->created_at->format('jS F Y h:i A') }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p>Found 0 results for "{{$searchTerm}}"</p>
            @endif
        </div>
    </div>

@endsection
