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
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="auth-form-header-text">
                            <h1>{{ __('auth.reg_new_acc') }}</h1>
                        </div>
                    </div>

                    <div class="auth-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('auth.your_name') }}</label>
                                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" placeholder="{{ __('auth.name_placeholder') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('auth.email_address') }}</label>
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" placeholder="{{ __('auth.email_placeholder') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('auth.password') }}</label>
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth.password_placeholder') }}" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="password-confirm" class="form-label">{{ __('auth.password_confirm') }}</label>
                                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="{{ __('auth.password_confirm_placeholder') }}" required autocomplete="new-password">

                            </div>

                            @if($showSubscribe)
                            <div class="form-group mb-1">
                                <div class="col-md-12">
                                    <div class="icheck-info">
                                        <input type="checkbox" name="subscribe_newsletter" id="subscribe_newsletter_box" value="subscribe_me" @if($tickSubscribe) checked="checked" @endif />
                                        <label for="subscribe_newsletter_box">{{ __('auth.subscribe_newsletter') }}</label>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="submit-btn mb-5">
                                <button type="submit" id="submit" class="btn col-12">{{ __('auth.register') }}</button>
                            </div>


                            <hr>

                            <div class="not-member">
                                <p>{{ __('auth.already_member') }} <a href="{{ route('login') }}">{{ __('auth.login') }}</a></p>
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
