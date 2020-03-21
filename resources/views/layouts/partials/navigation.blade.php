<nav class="navbar navbar-expand-lg navbar-dark bg-navblue">
    <a class="navbar-brand" href="{{route('home')}}"><h1>University Forum</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @if(\Auth::user())
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('home')}}">{{ __('messages.home') }} <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('thread/create') ? 'active' : '' }}" href="{{route('thread.create')}}">
                        {{ __('messages.create_thread') }}
                        <span class="sr-only">{{ __('messages.create_thread') }}</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('search') }}">
                {{ csrf_field() }}
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="{{ __('messages.search_threads') }}" aria-label="{{ __('messages.search_threads') }}">
                <div class="input-group">
                    <select class="my-2 my-sm-0" id="filter" name="filter">
                        <option selected>{{ __('messages.apply_filter') }} </option>
                        <option value="name">{{ __('messages.name') }}</option>
                        <option value="Thread title">{{ __('messages.thread_title') }}</option>
                        <option value="Forum title">{{ __('messages.forum_title') }}</option>
                    </select>
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">{{ __('messages.search') }}</button>
                </div>
            </form>
        @endif
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    @if(\Auth::user())
                        {{Auth::user()->name}}
                    @else
                        {{ __('messages.login_register') }}
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if(\Auth::user())
                            <a class="dropdown-item" href="{{route('logout')}}">{{ __('messages.logout') }}</a>
                        @else
                            <a class="dropdown-item" href="{{route('register')}}">{{ __('messages.registration') }}</a>
                            <a class="dropdown-item" href="{{route('login')}}">{{ __('messages.login') }}</a>
                    @endif
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"> {{ __('messages.language') }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('language', 'en')}}">{{ __('messages.english') }}</a>
                    <a class="dropdown-item" href="{{route('language', 'de')}}">{{ __('messages.germany') }}</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
