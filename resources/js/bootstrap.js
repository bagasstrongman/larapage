/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
import 'bootstrap'
import Clipboard from 'clipboard'
import jquery from 'jquery'
import Echo from 'laravel-echo'
import PopperJs from 'popper.js'
import 'pusher-js'
import * as Turbo from '@hotwired/turbo'

Turbo.session.drive = false

window.$ = window.jQuery = jquery
window.PopperJs = PopperJs.default

new Clipboard('[data-clipboard-target]')

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: process.env.MIX_PUSHER_APP_KEY,
  cluster: process.env.MIX_PUSHER_APP_CLUSTER,
  encrypted: true
})
