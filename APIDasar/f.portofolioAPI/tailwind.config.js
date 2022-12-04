/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ["**/*.{html,js,php}"],
  theme: {

    container: {
      center: true,
      padding:'16px',
    },

    extend: {

      colors: {
        primary: '#FF64A5',
        secondary: '#464482',
        third: '#7773FF',
        dark: '#3C2B33',

        darkBG: '#1D1D1D',
        darkPrimary: '#FF9EFF',
        darkSecondary: '#313131',

        youtube: '#FF0000',
        instagram: '#E4405F',
        android: '#3DDC84'
      },
      screens: {
        '2xl': '1320px'
      },

    },
  },
  plugins: [],
}
