const usePreflightFront = false

module.exports = {
  // use preflight (reset CSS) override fonts size from theme.json
  corePlugins: {
    preflight: process.env.IS_EDITOR ? false : usePreflightFront,
  },
  content: [
    // './**/*.{php,html}',
    './blocks/**/*.php',
    './assets/*.{js,jsx,ts,tsx,vue}',
    // './ecommerce/app/src/**/*.{js,jsx,ts,tsx,vue}',
  ],
  safelist: [],
  theme: {
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1095px',
      xl: '1280px',
      '2xl': '1536px',
    },
    extend: {
      backgroundImage: (theme) => ({
        'next-link': "url('/assets/media/next-link.svg')",
        search: 'url(/assets/media/search.svg)',
        next: "url('/assets/media/next.svg')",
        previous: "url('/assets/media/previous.svg')",
      }),
    },
  },
  plugins: [
    require('@_tw/themejson')(require('./theme.json')),
    // require('@tailwindcss/forms'),
  ],
}
