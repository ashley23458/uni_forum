<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    @include('layouts.partials.head')
</head>
<body class="d-flex flex-column">
@include('layouts.partials.navigation')
<div id="main">
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
</div>
@include('layouts.partials.footer')
</body>
</html>
