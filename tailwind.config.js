/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],
  theme: {
    extend: {
      spacing: {
        '80': '20rem'
      },
      rotate: {
        '2': '2deg',
        '4': '4deg',
        '6': '6deg',
        '8': '8deg',
        '10': '10deg',
        '12': '12deg',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
