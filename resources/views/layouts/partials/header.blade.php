
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

{{-- CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

{{-- Fonts --}}
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

{{-- Styles --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{--  font awesome  --}}
<script src="https://kit.fontawesome.com/c7ffa0052f.js" crossorigin="anonymous"></script>