import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js', 
                'resources/js/validaCep.js',
                'resources/js/validaCnpj.js',
                'resources/js/validaCpf.js',
                'resources/js/fetchAddress.js',
                'resources/js/fetchSeller.js',
                'resources/js/vendaEdit.js',
                'resources/js/vendaNova.js',
            ],
            refresh: true,
        }),
    ],
    
});
