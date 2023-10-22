/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: [
          {
            savingSorcerer: {
              "primary": "#9333ea",
              "secondary": "#0ea5e9",
              "accent": "#6ee7b7",
              "neutral": "#3d4451",
              "base-100": "#ffffff",
            },
          },
        ],
      },

};
