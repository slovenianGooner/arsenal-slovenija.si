module.exports = {
  content: [
    './resources/**/*.antlers.html',
    './resources/**/*.antlers.php',
    './resources/**/*.blade.php',
    './resources/**/*.vue',
    './content/**/*.md'
  ],
  theme: {
    extend: {
        colors: {
            arsenal: '#f00000'
        }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
