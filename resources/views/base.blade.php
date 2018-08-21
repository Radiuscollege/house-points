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
        <button id="btnHomeScreen">add to home screen</button>
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

// Installation must be done by a user gesture! Here, the button click
btnAdd.addEventListener('click', (e) => {
  // hide our user interface that shows our A2HS button
  btnAdd.style.display = 'none';
  // Show the prompt
  deferredPrompt.prompt();
  // Wait for the user to respond to the prompt
  deferredPrompt.userChoice
    .then((choiceResult) => {
      if (choiceResult.outcome === 'accepted') {
        console.log('User accepted the A2HS prompt');
      } else {
        console.log('User dismissed the A2HS prompt');
      }
      deferredPrompt = null;
    });
});


        </script>
    </body>
</html>
