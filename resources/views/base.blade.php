<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#db5945">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="manifest" href="manifest.json">
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body style="overflow-x: hidden !important">

        <div id="app">
            @yield('content')
        </div>

        <noscript>Javascript is required to view this application</noscript>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>

        let deferredPrompt;
        let btnAdd = document.getElementById('btnHomeScreen');
            window.addEventListener('beforeinstallprompt', function(event) {
            // Prevent Chrome 67 and earlier from automatically showing the prompt
            e.preventDefault();
            // Stash the event so it can be triggered later.
            deferredPrompt = e;
        });

        </script>
    </body>
</html>
