<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.header')
    @yield('styles')
    <style>
        .form-control, .custom-select, .btn {
            outline: none;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
          }
    </style>
</head>
<body>
    <div id="app">
        @include('layouts.partials.navbar')

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        @include('layouts.partials.messages')
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>

    @include('layouts.partials.scripts')
    @yield('scripts')
</body>
</html>
