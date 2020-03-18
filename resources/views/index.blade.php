@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="col-sm-4">
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div id="chart-div"></div>
                    {!! $lava->render('PieChart', 'Forum', 'chart-div') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
