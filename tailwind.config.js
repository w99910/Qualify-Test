module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {
        fontFamily:{
            'poppins':['Poppins']
        },
        colors:{
          'primary':'#F3F3F3',
            'dark-primary':'#272D33',
            'dark-secondary':'#383C40',
            'dark-white':'#E5E1DD',
        },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
