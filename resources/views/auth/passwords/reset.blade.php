@extends('layouts.frontend.auth-app')

@php
    $meta_title = "Password Reset";
    $meta_description = "Did you forget your password? Set a new one here.";
@endphp

@push('css')
    <link href="{{ asset('public/assets/frontend/css/auth/login.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid login-page">
<div class="container">
<div class="row login-logo">
            <div class="col-md-12">
                <img src="{{ asset('public/assets/frontend/images/logo.png') }}" alt="">
            </div>
        </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <h3 class="form-header">Reset your password</h3>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('admin.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="Confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn default-btn">
                                    {{ __('front.reset_password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
