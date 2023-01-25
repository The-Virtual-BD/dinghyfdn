const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    important: true,
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                'oswald': ['Oswald', 'ui-sans-serif'],
                'raleway': ['Raleway', 'ui-sans-serif'],
            },
            colors: {
                'adam': {
                  light: '#EDF2F4',
                  DEFAULT: '#003554',
                  trans: 'rgba(0, 53, 84, 0.4)',
                },
                'eve': '#E63946',
                'dark': {
                    light: '#6C757D',
                    DEFAULT: '#2B2D42',
                },
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};



