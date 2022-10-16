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
                            <i class="fas fa-unlock-alt"></i>
                        </div>
                        <div class="auth-form-header-text">
                            <h1>{{ __('auth.reset_pass') }}</h1>
                            <p>{{ __('auth.reset_pass_desc') }}</p>
                        </div>
                    </div>

                    <div class="auth-form">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-3">
                                
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" placeholder="{{ __('auth.email_placeholder') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            

                            <div class="submit-btn mb-5">
                                <button type="submit" id="submit" class="btn col-12">{{ __('auth.send_password_reset_link') }}</button>
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
