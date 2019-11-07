<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    @include('layouts.partials.head')
</head>
<body>
@include('layouts.partials.header')
@include('layouts.partials.navigation')
<div id="main">
    <div class="container">
        @yield('content')
    </div>
</div>
@include('layouts.partials.footer')
</body>
</html>
