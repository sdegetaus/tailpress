const _ = require('lodash');
const theme = require('./theme.json');
const tailpress = require('@jeffreyvr/tailwindcss-tailpress');

module.exports = {
  mode: 'jit',
  purge: {
    content: [
      './theme/*.php',
      './theme/**/*.php',
      './resources/css/*.css',
      './resources/js/*.js',
      './safelist.txt',
    ],
  },
  theme: {
    container: {
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '0rem',
      },
    },
    extend: {
      colors: tailpress.colorMapper(
        tailpress.theme('settings.color.palette', theme)
      ),
    },
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1120px',
      xl: tailpress.theme('settings.layout.wideSize', theme),
    },
  },
  plugins: [tailpress.tailwind],
};
