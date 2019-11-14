<nav class="navbar navbar-expand-lg navbar-dark bg-navblue">
    <a class="navbar-brand" href="{{route('home')}}"><h1>University Forum</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            @if(\Auth::user())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('thread.create')}}">
                        Create new thread <span class="sr-only">(Create new thread)</span></a>
                </li>
            @endif
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    @if(\Auth::user())
                        {{Auth::user()->username}}
                    @else
                        Register / log in
                    @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(\Auth::user())
                            <a class="dropdown-item" href="{{route('logout')}}">Log out</a>
                        @else
                            <a class="dropdown-item" href="{{route('register')}}">Register</a>
                            <a class="dropdown-item" href="{{route('login')}}">Log in</a>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>
