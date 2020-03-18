@extends('layouts.app')
@section('title', 'Log in')
@section('content')
        <div class="row justify-content-center  text-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5 panelGrey">
                <h2>Login</h2>
                <div class="required-fields">
                    <p>Log in with Email address and Password.</p>
                    <p>Fields marked with (<span class="text-danger">*</span>) are mandatory.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5 panelGrey">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="text" name="email" id="email" class="form-control form-control"
                               placeholder="Email" value="{{ old('email') }}" />
                        @if ($errors->has('email'))
                            <div class="alert alert-error alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" class="form-control form-control"
                               placeholder="Password" value=""  />
                        @if ($errors->has('password'))
                            <div class="alert alert-error alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <input type="submit" value="Log in" class="col-md-12 btn btn-secondary" />
                    </div>
                </form>
                <div class="row">
                    <strong class="mx-auto">OR</strong>
                </div>
                <div class="row">
                    <a href="{{ route('google_login') }}" class="col-md-12 btn btn-social btn-dark">
                        <span class="fab fa-google mr-2 pr-2 border-right"></span>Sign in with Google
                    </a>
                </div>
            </div>
        </div>
@endsection
