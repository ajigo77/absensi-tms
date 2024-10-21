/** @type {import('tailwindcss').Config} */

export default {
    content: [
        "./resources/views//*.blade.php", // Memasukkan semua file Blade di resources/views
        "!./resources/views/vendor//*.blade.php", // Mengecualikan folder vendor
    ],
    theme: {
        extend: {},
        colors: {
            gray: {
                50: "#EEEDEB",
                100: "#F5F7F8",
                200: "#dedede",
                10: "#9D9D9D",
                400: "#9D9D9D",
                500: "#9D9D9D",
            },
            dark: {
                100: "#1E201E",
                50: "#3C3D37",
                10: "#303841",
            },
            red: {
                50: "#DD3E3E",
                100: "#D71313",
                10: "#FF9280",
            },
            white: {
                100: "#ffffff",
            },
            blue: {
                50: "#006BFF",
                100: "#024CAA",
            },
        },
        fontFamily: {
            sans: ["Graphik", "sans-serif"],
            serif: ["Merriweather", "serif"],
        },
    },
    plugins: [],
};