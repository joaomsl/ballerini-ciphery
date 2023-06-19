/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js"
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: 'Inter, sans-serif',
            mono: '"IBM Plex Mono", ui-monospace, SFMono-Regular'
        }
    },
  },
  plugins: [],
}

