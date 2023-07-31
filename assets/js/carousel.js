// import Flickity from 'flickity'

function initCarousel(elements, options) {
  const _options = { grouped: false, autoPlay: false, ...options }
  const flick = []
  if (elements && elements.length > 0) {
    const { default: Flickity } = await import('flickity')
    for (const element of elements) {
      const total = element.dataset.total
      if (total === undefined || +total > 1) {
        flick[element] = new Flickity(element, {
          groupCells: _options.grouped,
          cellAlign: 'left',
          autoPlay: _options.autoPlay,
          on: {
            ready: () => {
              // hack for size height bug
              setTimeout(() => {
                flick[element].resize()
              }, 1000)
            },
          },
        })
      }
    }
  }
}

export default initCarousel
