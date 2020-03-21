@extends('layouts.app')
@section('title', __('messages.login'))
@section('content')
        <div class="row justify-content-center  text-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5 panelGrey">
                <h2>{{  __('messages.login') }}</h2>
                <div class="required-fields">
                    <p>{{  __('messages.login_message') }}</p>
                    <p>{{ __('messages.mandatory_fields') }} (<span class="text-danger">*</span>).</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5 panelGrey">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">{{ __('messages.email') }} <span class="text-danger">*</span></label>
                        <input type="text" name="email" id="email" class="form-control form-control"
                               placeholder="{{ __('messages.email') }}" value="{{ old('email') }}" />
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
                        <label for="password">{{ __('messages.password') }} <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" class="form-control form-control"
                               placeholder="{{ __('messages.password') }}" value=""  />
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
                        <input type="submit" value="{{ __('messages.login') }}" class="col-md-12 btn btn-secondary" />
                    </div>
                </form>
                <div class="row">
                    <strong class="mx-auto">{{ __('messages.or') }}</strong>
                </div>
                <div class="row">
                    <a href="{{ route('google_login') }}" class="col-md-12 btn btn-social btn-dark">
                        <span class="fab fa-google mr-2 pr-2 border-right"></span>{{ __('messages.login_google') }}
                    </a>
                </div>
            </div>
        </div>
@endsection
