import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'
import path from 'path'

export default defineConfig({
    build: {
        outDir: 'src/resources/dist',
        emptyOutDir: true,
        manifest: false,

        rollupOptions: {
            output: {
                entryFileNames: '[name].js',
                assetFileNames: '[name][extname]',
            },
        },
    },

    plugins: [
        laravel({
            input: [
                'src/resources/css/specify.css',
                'src/resources/js/specify.js',
            ],
            refresh: false,
        }),
        tailwindcss(),
    ],

    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
})
