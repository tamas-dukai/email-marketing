<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $meta_title ?? '' }} - {{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ $meta_description ?? '' }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- CSS Styles -->
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/backend/vendors/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/style.css') }}">

    @stack('css')

</head>
<body>
