/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  darkMode: 'class',
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '1.5rem',
        lg: '2.5rem',
        xl: '5rem',
        '2xl': '6rem',
      },
    },
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1440px',
    },
    fontFamily: {
      sans: ['Roboto', 'sans-serif'],
    },
    extend: {
      colors: {
        primary: {
          light: '#B22D30',
          DEFAULT: '#B22D30',
          dark: '#B22D30'
        },

        secondary: {
          light: '#F6F7F9',
          DEFAULT: '#F6F7F9',
          dark: '#1B1B1B'
        },

        white: {
          light: '#FFF',
          DEFAULT: '#FFF',
          dark: '#141414'
        },

        black: {
          light: '#373435',
          DEFAULT: '#373435',
          dark: '#E1E1E1'
        }
      },
      transitionDuration: {
        'custom': '1000ms',
      },
      transitionTimingFunction: {
        'linear': 'linear',
      }
    },
  },
};

export default config;
