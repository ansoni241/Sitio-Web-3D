import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/app.scss',
                'resources/css/normalize.css',
                'resources/css/show.scss',
                'resources/css/adminlte.min.css',
                'resources/js/show.js',
                'resources/css/login.css',
                'resources/js/contactvalidate.js',
                'resources/js/adminlte.min.js',
                'resources/css/title.css',
            ],
            refresh: true,
        }),
    ],
});