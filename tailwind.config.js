import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                mont: "'Montserrat', sans-serif",
                pop: "'poppins', Poppins",
            },
            colors: {
                hover_bg: "#5F9BFF",
                primary_bg: "#121212",
                secondary_bg: "#1A1A1A",
                dark: {
                    primary: "#121212",
                    secondary: "#1A1A1A",
                    tertiary: "#333333",
                    border: "#3A3A3A",
                    brand: "#C48AFF",
                    accent: "#772DC3",
                    text: {
                        primary: "#F9F9F9",
                        secondary: "#9C9C9C",
                    },
                    gradient: {
                        primary: "#984AE8",
                        secondary: "#FFBE18",
                    },
                },
            },
        },
    },

    plugins: [forms],
};
