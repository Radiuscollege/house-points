if ('serviceWorker' in navigator ) {
    window.addEventListener('load', function() {
      navigator.serviceWorker.register('../sw.js').then(function(registration) {
        // Registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
      }, function(err) {
        // registration failed :(
        console.log('ServiceWorker registration failed: ', err);
      });
    });
  }

window._ = require('lodash');
window.Popper = require('popper.js').default;

window.fn = {};

window.fn.open = function() {
  var menu = document.getElementById('menu');
  menu.open();
};

window.fn.close = function() {
  var menu = document.getElementById('menu');
  menu.close();
}

window.fn.load = function(page) {
  var content = document.getElementById('content');
  var menu = document.getElementById('menu');
  content.load(page)
    .then(menu.close.bind(menu));
};


/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');
    window.ons = require('onsenui');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });


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
