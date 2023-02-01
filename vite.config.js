import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input:[
                    'resources/css/bootstrap.min.css',
                    'resources/css/font-awesome.min.css',
                    'resources/css/elegant-icons.css',
                    'resources/css/plyr.css',
                    'resources/css/nice-select.css',
                    'resources/css/owl.carousel.min.css',
                    'resources/css/slicknav.min.css',
                    'resources/css/style.css',

                    'resources/js/jquery-3.3.1.min.js',
                    'resources/js/bootstrap.min.js',
                    'resources/js/player.js',
                    'resources/js/jquery.nice-select.min.js',
                    'resources/js/mixitup.min.js',
                    'resources/js/jquery.slicknav.js',
                    'resources/js/owl.carousel.min.js',
                    'resources/js/main.js',


            ],
            refresh: true,
        }),
    ],
});
