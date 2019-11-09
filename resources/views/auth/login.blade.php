@extends('layouts.app')
@section('title', 'Log in')
@section('content')
    <div id="form1">
        <div class="row justify-content-center  text-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5 panelGrey">
                <h2>Login</h2>
                <div class="required-fields">
                    <p>Log in with Username/Email address and Password.</p>
                    <p>Fields marked with (<span class="text-danger">*</span>) are mandatory.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5 panelGrey">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" id="username" class="form-control form-control"
                               placeholder="Username/ email" value="{{ old('username') }}" />
                        @if ($errors->has('username'))
                            <div class="alert alert-error alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ $errors->first('username') }}</strong>
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
                    <input type="submit" value="Log in" class="btn btn-secondary" />
                </form>
            </div>
        </div>
    </div>
@endsection
