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
      gridTemplateColumns: {
        'content-text': '1fr minmax(100px, 10%) 1fr',
        'content-text-sm': '20px 1fr 20px',
      },
      gridTemplateRows: {
        'content-text-sm': 'auto 40px auto',
      },
      backgroundImage: (theme) => ({
        'next-link': "url('/assets/media/next-link.svg')",
        search: 'url(/assets/media/search.svg)',
        next: "url('/assets/media/next.svg')",
        previous: "url('/assets/media/previous.svg')",
      }),
      animation: {
        'text-gradient': 'text-gradient 2s ease infinite',
      },
      keyframes: {
        'text-gradient': {
          '0%, 100%': {
            'background-size': '200% 200%',
            'background-position': 'left center',
          },
          '50%': {
            'background-size': '200% 200%',
            'background-position': 'right center',
          },
        },
      },
    },
  },
  plugins: [
    require('@_tw/themejson')(require('./theme.json')),
    // require('@tailwindcss/forms'),
  ],
}
