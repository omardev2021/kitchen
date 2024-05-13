/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                main: '#DBFF00',
                bg_home: '#FFFEF5'

            },
            fontFamily:{
                "poppins":["Poppins","sans-serif"],
                "arabic":["El Messiri","sans-serif"],
            }
        },
    },
    plugins: [],
}
