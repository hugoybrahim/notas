/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*blade.php",
    "./resources/**/*blade.js",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [require('flowbite/plugin')],
}
