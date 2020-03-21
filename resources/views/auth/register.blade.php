@extends('layouts.app')
@section('title',  __('messages.registration'))
@section('content')
    <div id="form1">
        <div class="row justify-content-center  text-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5 panelGrey">
                <h2>{{  __('messages.registration') }}</h2>
                <div class="required-fields">
                    <p>{{ __('messages.mandatory_fields') }} (<span class="text-danger">*</span>).</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5 panelGrey">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">{{ __('messages.name') }} <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control form-control"
                               placeholder="{{ __('messages.name') }}" value="{{ old('name') }}" />
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
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control form-control" placeholder="{{ __('messages.confirm_password') }}" value=""  />
                        @if ($errors->has('password'))
                            <div class="alert alert-error alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                    <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-secondary" />
                </form>
            </div>
        </div>
    </div>
@endsection
