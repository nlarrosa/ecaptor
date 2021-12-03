module.exports = {
  // purge: ['./source/**/*.blade.php'],
  // theme: {
  //   extend: {
  //     fontFamily: {
  //       roboto: ['Roboto'],
  //     },
  //   },
  // },

  purge: {
    content: ['yourfiles/**/*.html'],
    options: {
      safelist: [
        /data-theme$/,
      ]
    },
  },
  
  variants: {},
  plugins: [
    // require('@tailwindcss/custom-forms'),
    require('daisyui'),
  ],

  daisyui: {
      styled: true,
      themes: true,
      base: true,
      utils: true,
      logs: true,
      rtl: false,
    },
}
