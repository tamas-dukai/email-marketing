@extends('layouts.frontend.public-app')

@push('css')
    <link href="{{ asset('public/assets/frontend/css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="auth-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="auth-form-wrapper">
                    <div class="auth-form-header">
                        <div class="auth-form-header-icon d-flex justify-content-center">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="auth-form-header-text">
                            <h1>{{ __('auth.member_login') }}</h1>
                        </div>
                    </div>

                    <div class="auth-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('auth.email_address') }}</label>
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" placeholder="{{ __('auth.email_placeholder') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="password" class="form-label">{{ __('auth.password') }}</label>
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth.password_placeholder') }}" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="submit-btn mb-3">
                                <button type="submit" id="submit" class="btn col-12">{{ __('auth.sign_in') }}</button>
                            </div>

                            <div class="bottom-options d-flex justify-content-between mb-5">
                                <div class="remember_me">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('auth.remember_me') }}
                                    </label>
                                </div>
                                <div class="forgot_password">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('auth.forgot_pass') }}
                                    </a>
                                @endif
                                </div>
                            </div>

                            <hr>

                            <div class="not-member">
                                <p>{{ __('auth.not_member_yet') }} <a href="{{ route('register') }}">{{ __('auth.create_account') }}</a></p>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

@push('js')
    
@endpush
