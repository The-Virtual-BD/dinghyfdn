<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script>
        let BASE_URL = {!! json_encode(url('/')) !!} + "/";
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2TS1MZE309"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-2TS1MZE309');
    </script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Page Style -->
    @if (isset($headstyle))
        {{ $headstyle }}
    @endif


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="font-raleway text-dark antialiased relative">
    {{-- Donate popup --}}
    @include('layouts.donatepopup')
    @include('layouts.videopopup')

    @include('layouts.gnavigation')

    <main class="">
        {{ $slot }}
    </main>


    @include('layouts.gfooter')

    {{-- All Script goes bellow this line --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js"
        integrity="sha512-lYMiwcB608+RcqJmP93CMe7b4i9G9QK1RbixsNu4PzMRJMsqr/bUrkXUuFzCNsRUo3IXNUr5hz98lINURv5CNA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/custom.js')}}"></script>

    <!-- Page Script -->
    @if (isset($script))
        {{ $script }}
    @endif
</body>

</html>
