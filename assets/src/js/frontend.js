import '../sass/frontend.scss'
import Splide from '@splidejs/splide'
import customSelect from 'custom-select'
import Lenis from 'lenis'

document.addEventListener('DOMContentLoaded', function (e) {
  init(e)
})

const init = function (e) {

  const lenis = new Lenis({
    autoRaf: true,
  });

  
  
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
    const fermes = document.querySelectorAll('.detail-equipe-ferme')

    equipes.forEach((element) => {
      element.addEventListener('click', function (e) {
        e.preventDefault()
        const id = e.target.dataset.id

        document.querySelector('.overlay-equipe').classList.add('is-active')
        document.querySelector('body').classList.add('no-scroll')
        document.querySelector('#equipe-' + id).classList.add('is-active')
      })
    })

    fermes.forEach((element) => {
      element.addEventListener('click', function (e) {
        e.preventDefault()

        document.querySelector('.overlay-equipe').classList.remove('is-active')
        document.querySelector('body').classList.remove('no-scroll')
        const detail_equipe = document.querySelectorAll(
          '.overlay-detail-equipe'
        )
        detail_equipe.forEach((element) => {
          element.classList.remove('is-active')
        })
      })
    })
  }

  if (document.querySelector('.container-references')) {
    const refs = document.querySelectorAll('.col-reference')
    const btns = document.querySelectorAll('.tag-reference')

    btns.forEach((element) => {
      element.addEventListener('click', function (e) {
        const data = e.target.dataset.filter
        //  const btns = document.querySelectorAll('.tag-reference')

        if (data == 'tout') {
          btns.forEach((btn) => {
            btn.classList.remove('is-active')
          })
          document
            .querySelector('.tag-reference-tout')
            .classList.add('is-active')
          refs.forEach((ref) => {
            ref.classList.add('is-active')
          })
        } else {
          // document
          //   .querySelector('.tag-reference-tout')
          //   .classList.remove('is-active')

            btns.forEach((btn) => {
              btn.classList.remove('is-active')
            })

          if (e.target.classList.contains('is-active')) {
            e.target.classList.remove('is-active')
            updateFiltre()
    
              document
                .querySelector('.tag-reference-tout')
                .classList.add('is-active')
          } else {
            e.target.classList.add('is-active')
            updateFiltre()
          }
        }
      })
    })

    const updateFiltre = (n) => {
      // clean
      refs.forEach((ref) => {
        ref.classList.remove('is-active')
      })

      // active
      btns.forEach((btn) => {
        if (btn.classList.contains('is-active')) {
          const id = btn.dataset.filter
          refs.forEach((ref) => {
            if (ref.classList.contains(id)) ref.classList.add('is-active')
          })
        }
      })
    }
  }
}
