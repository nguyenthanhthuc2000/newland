
window._ = require('lodash');
import swal from 'sweetalert2';
window.ClassicEditor = require('@ckeditor/ckeditor5-build-classic');
window.Swal = swal;
////window.$ = require('jquery');
window.slick = require('slick-carousel');
//
import "bootstrap";
try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('@popperjs/core');
    window.bootstrap = require('bootstrap');
} catch (e) {
    console.error(e);
}

//window._ = require('lodash');
//import Popper from 'popper.js/dist/umd/popper.js'; ///<------ add this line
//
//try {
//    window.Popper = Popper; //<------ add this line
//    window.$ = window.jQuery = require('jquery');
//
//    require('bootstrap');
//} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
