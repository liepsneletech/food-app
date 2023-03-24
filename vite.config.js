import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/front/app.css",
                "resources/css/back/app.css",
                "resources/js/front/app.js",
                "resources/js/back/app.js",
            ],
            refresh: true,
        }),
    ],
});
