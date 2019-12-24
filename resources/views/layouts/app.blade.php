<!-- Jigsaw. (2019). Blade Templates & Partials [Contains examples for structuring the blade template.].
Retrieved from https://jigsaw.tighten.co/docs/content-blade/ -->
<!--Bootstrap. (2019). Introduction [Contains an introduction template for setting up the css file and scripts].
(4.3.1). Retrieved from https://getbootstrap.com/docs/4.3/getting-started/introduction/-->
<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    @include('layouts.partials.head')
</head>
<body class="d-flex flex-column">
@include('layouts.partials.header')
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
