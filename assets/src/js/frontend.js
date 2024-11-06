import '../sass/frontend.scss'
import Splide from '@splidejs/splide'
import customSelect from 'custom-select'

document.addEventListener('DOMContentLoaded', function (e) {
  init(e)
})

const init = function (e) {
  // INIT Sliders Réalisations
  if (document.querySelector('.splide-images')) {
    const images = new Splide('.splide-images', {
      arrows: false,
      pagination: false,
    })
    const textes = new Splide('.splide-textes', {
      pagination: false,
    })
    images.sync(textes)
    images.mount()
    textes.mount()
  }

  // Select
  if (document.querySelector('select')) {
    customSelect('select')
  }

  // Pre inscription
  if (document.querySelector('.btn-preinscription')) {
    document
      .querySelector('.btn-preinscription')
      .addEventListener('click', function (e) {
        e.preventDefault()
        const code = document.querySelector('#select-session').value
        window.open('https://reseaucompost.org/se-preinscrire?session=' + code)
      })
  }

  // Equipe
  if (document.querySelector('.container-equipe')) {
    const equipes = document.querySelectorAll('.equipe')

    equipes.forEach(element => {
      element.addEventListener('click', function (e) {
        e.preventDefault()
        document.querySelector('.overlay-equipe').classList.add('is-active')
        document.querySelector('body').classList.add('no-scroll')
        document.querySelector('.overlay-detail-equipe').classList.add('is-active')

      })
    });

  }


}
