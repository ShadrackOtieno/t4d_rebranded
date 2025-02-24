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
        customGreen: '#00a651',
        customBlue: '#0096FF',
        customYellow: '#FFEA00',
      },
      listStyleType: {
        square: 'square',
        roman: 'upper-roman',
      },
      borderRadius: {
        '4xl': '2rem',
        '5xl': '2.5rem',
        '6xl': '3rem',
        '7xl': '3.5rem',
        '8xl': '4rem',
        '9xl': '4.5rem',
        '10xl': '8rem',
      },
      rotate: {
        '180': '180deg',
      },
      zIndex: {
        '60': '60',
        '70': '70',
        '80': '80',
        '100': '100',
      }
    },
  },
  plugins: [],
}
