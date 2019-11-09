<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    @include('layouts.partials.head')
</head>
<body>
@include('layouts.partials.header')
@include('layouts.partials.navigation')

<div class="container">
    @if(session('info'))
        <div class="alert alert-success " role="alert">
            {{session('info')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @yield('content')
</div>
@include('layouts.partials.footer')
</body>
</html>
