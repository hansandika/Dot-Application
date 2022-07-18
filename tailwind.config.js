/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                black: {
                    50: "#F7F7F8",
                    100: "#DDDDDF",
                    200: "#A9A9AD",
                    300: "#8E8E93",
                    400: "#636366",
                    500: "#48484A",
                    600: "#3A3A3C",
                    700: "#2C2C2E",
                    800: "#1A1C1E",
                },
            },
        },
    },
};
