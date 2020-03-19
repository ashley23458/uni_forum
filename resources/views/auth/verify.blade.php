@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header panelGrey bg-white text-center"><h2>{{ __('Verify Your Email Address') }}</h2></div>
                <div class="card-body panelGrey">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p class="text-center">{{ __('Before proceeding, please check your email for a verification link.') }}</br>
                        {{ __('If you did not receive the email, please resend the email below:') }}
                    </p>
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-secondary btn-lg btn-block">{{ __('Resend Email') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
