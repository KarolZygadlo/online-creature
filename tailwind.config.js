module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
      screens:{
        '2xl': '1440px',
        'xl': '1120px',
        'lg': '864px',
        'md': '608px',
        'sm': '480px'
      },
      extend: {},
    },
    plugins: [
      require('@tailwindcss/forms'),
    ],
}
