/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "!./resources/views/vendor/**/*.blade.php"],
    theme: {
        extend: {},
        colors: {
            "gray-50": "#EEEDEB",
            "gray-100": "#F5F7F8",
            "gray-10":"#9D9D9D",
            "dark-100": "#1E201E",
            "dark-50": "#3C3D37",
            "red-50": "#DD3E3E",
            "red-100": "#D71313",
            "white-100":"#ffffff"
        },
    },
    plugins: [],
};
