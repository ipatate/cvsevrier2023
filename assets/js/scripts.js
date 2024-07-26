import initCarousel from './carousel'

function main() {
  /** navigation */
  const openNav = document.getElementById('open-nav')
  const nav = document.querySelector('.site-navigation')
  openNav?.addEventListener('click', () => {
    document.body.classList.toggle('nav-is-open')
    openNav?.classList.toggle('is-open')
    nav?.classList.toggle('is-open')
    document.body.style.overflow = nav?.classList.contains('is-open')
      ? 'hidden'
      : 'auto'
  })

  /** carousel */
  const elements = document.getElementsByClassName('cvs-carousel-grouped')
  initCarousel(elements, { grouped: true })

  const elements_home = document.getElementsByClassName('gm-carousel-grouped')
  initCarousel(elements_home, { grouped: true, autoPlay: 4000 })

  // scroll watcher for header
  const scrollWatcher = document.createElement('span')
  const primaryHeader = document.querySelector('.site-header')
  scrollWatcher.setAttribute('data-scroll-watcher', '')
  primaryHeader.after(scrollWatcher)

  const mainObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          document.body.classList.remove('is-scrolled')
        } else {
          document.body.classList.add('is-scrolled')
        }
      })
    },
    {
      rootMargin: '50px 0px 0px 0px',
    },
  )
  mainObserver.observe(scrollWatcher)

  // /** wind top bar */
  // const windInfos = document.getElementById('cvs-wind')
  // if (windInfos) {
  //   const apiUrl = '/wp-json/gm/v1/wind'
  //   const fetchData = async (apiUrl) => {
  //     if (!apiUrl) return
  //     const response = await fetch(apiUrl, { cache: "no-cache" })
  //     const data = await response.json()
  //     windInfos.innerHTML = `${data.wind.avg10} Noeuds`
  //     //  Air : <strong>{{ data.real.temperature.air }}</strong
  //     // >°C
  //   }
  //
  //   fetchData(apiUrl)
  //   setInterval(() => {
  //     fetchData(apiUrl)
  //   }, 100000)
  // }
}

document.addEventListener('DOMContentLoaded', () => {
  main()
})
