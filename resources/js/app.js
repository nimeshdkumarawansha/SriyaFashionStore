import './bootstrap';
import '../css/app.css';
import 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js';
import '../src/assets/js/jquery.min.js';
import '../src/assets/js/bootstrap.bundle.min.js';
import '../src/assets/js/jquery.hoverIntent.min.js';
import '../src/assets/js/jquery.waypoints.min.js';
import '../src/assets/js/superfish.min.js';
import '../src/assets/js/owl.carousel.min.js';
import '../src/assets/js/jquery.magnific-popup.min.js';
import '../src/assets/js/main.js';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
