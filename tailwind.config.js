module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
      './resources/js/**/*.jsx',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {}
  },
  variants: {
      borderRadius: ['responsive', 'first', 'last', 'hover', 'focus'],
  },
  plugins: [
    require('@tailwindcss/custom-forms')
  ]
}
