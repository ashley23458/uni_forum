@extends('layouts.app')
@section('title', 'Sign up')
@section('content')
    <div id="form1">
        <div class="row justify-content-center  text-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5 panelGrey">
                <h2>Registration</h2>
                <div class="required-fields">
                    <p>Fields marked with (<span class="text-danger">*</span>) are mandatory.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5 panelGrey">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">First and last name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control form-control"
                               placeholder="Name" value="{{ old('name') }}" />
                        @if ($errors->has('name'))
                            <div class="alert alert-error alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email address <span class="text-danger">*</span></label>
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
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" id="username" class="form-control form-control"
                               placeholder="Username" value="{{ old('username') }}" />
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
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control form-control" placeholder="Confirm Password" value=""  />
                        @if ($errors->has('password'))
                            <div class="alert alert-error alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                    <input type="submit" value="Register account" class="btn btn-secondary" />
                </form>
            </div>
        </div>
    </div>
@endsection
