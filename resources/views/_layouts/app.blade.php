<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title }} | {{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/icofont.min.css') }}" />
        <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" />
        <style>
            html, body {
                height: 100%;
                margin: 0;
            }
        </style>
    </head>

    <body>
        @include('_layouts._partials.header')
        <div class="container py-4">
            @if(session('status'))
                <div class="alert alert-{{ session('status')['type'] }} alert-dismissible fade show" role="alert">
                    {{ session('status')['message'] }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Erros de validação! Verifique os campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </body>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')
</html>