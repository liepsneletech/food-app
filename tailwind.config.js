const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    darkMode: "class",

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
    ],

    theme: {
        container: {
            center: true,
        },

        extend: {
            fontFamily: {
                sans: ["Josefin Sans", ...defaultTheme.fontFamily.sans],
            },

            screens: {
                xs: "400px",
                sm: "500px",
                md: "668px",
                lg: "992px",
                xl: "1200px",
                "2xl": "1440px",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
