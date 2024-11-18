import '../sass/frontend.scss'
import Splide from '@splidejs/splide'
import { Intersection } from '@splidejs/splide-extension-intersection';
import customSelect from 'custom-select'
import Lenis from 'lenis'
import Accordion from "accordion-js"
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
//import { Observer } from "gsap/Observer";
import { ScrollToPlugin } from 'gsap/ScrollToPlugin'

gsap.registerPlugin(ScrollToPlugin, ScrollTrigger)

document.addEventListener('DOMContentLoaded', function (e) {
  init(e)
})

const init = function (e) {

  new Accordion('.accordion-container');


  /**========================================================================
   *                           ANIMATIONS
   *========================================================================**/

  const lenis = new Lenis({
    autoRaf: true,
  })

  // Animations start
  const revealsStart = document.querySelectorAll('.reveal-start')
  revealsStart.forEach((section, index) => {
    setTimeout(() => {
      section.classList.remove('reveal-start')
    }, 500)
  })

  // Init reveal
  document.documentElement.classList.add('reveal-loaded')

  const reveals = document.querySelectorAll('.reveal')
  reveals.forEach((section, index) => {
    ScrollTrigger.create({
      trigger: section,
      id: index + 1,
      start: 'top 80%',
      end: 'bottom 80%',
      onEnter: () => {
        section.classList.remove('reveal')
      },
      onLeave: () => {
        ;(self) => self.disable()
      },
      onLeaveBack: (self) => self.disable(),
      markers: false, // !! MARQUEURS
    })
  })

  gsap.to('.vague', {
    yPercent: -100,
    ease: 'none',
    scrollTrigger: {
      trigger: 'body',
      // start: "top bottom", // the default values
      // end: "bottom top",
      scrub: true,
    },
  })


  
  /**========================================================================
   *                          PARTICULIERS
   *========================================================================**/
  
  if (document.querySelector('#cp')) {
    const cp = document.querySelector('#cp')
    const form =  document.querySelector('.form-interlocuteur')
    const conteneur = document.querySelector('#conteneur-interlocuteur')
    const lieu = document.querySelector('#inter-lieu') 
    const libelle = document.querySelector('#inter-libelle') 
    const lien = document.querySelector('#inter-lien') 
    const changer = document.querySelector('#btn-changer')

    changer.addEventListener('click', function (e) {
      conteneur.className = ''
      cp.value = ''
    })

    form.addEventListener('change', function (e) {
      
      switch (e.target.id) {
          case 'idf':
            conteneur.className = ''
              break;
          case 'region':
            conteneur.classList.add('resultat-autre')
              break;
      }

  });



    let error = true
    cp.addEventListener('keyup', function (e) {
      conteneur.classList.remove('resultat-erreur')
      if (cp.value.length >= 5) {
        interlocuteurs.forEach((element) => {
          if (element['codes_postaux'].includes(cp.value)) {
            console.log(element)
            lieu.innerHTML = cp.value
            libelle.innerHTML = '<strong>'+element['nom']+'</strong>'
            lien.setAttribute('href',element['lien'])
            conteneur.classList.add('resultat')
            error = false
          }
        })

        if (error == true) {
          conteneur.classList.add('resultat-erreur')
        }
      }
    })
  }

  function handleChange(src) {
    alert(src.value);
    }

  /**========================================================================
   *                           SLIDERS
   *========================================================================**/

  // INIT Sliders Réalisations
  if (document.querySelector('.splide-images')) {
    const images = new Splide('.splide-images', {
      arrows: false,
      pagination: false,
    })
    const textes = new Splide('.splide-textes', {
      pagination: false,
    })

    textes.on( 'overflow', function ( isOverflow ) {
      textes.options = {
        arrows    : isOverflow,
        drag      : isOverflow,
      };
    } );

    textes.on('ready', function() {
      setHeightCarousel(0);
    })

    textes.on('move', function() {
      const currentIndex = textes.index;
      setHeightCarousel(currentIndex);
      
      if (detectMob ()) {
        gsap.to(window, {
          duration: 0.3,
          scrollTo: '#realisations',
          //ease: "Power1.easeInOut"
        });
      }
      
    })

    function setHeightCarousel(index) {
      const splide = document.querySelectorAll('.splide_conteneur')[index];
      let hauteur;
      
      hauteur = splide.offsetHeight;
      textes.options = {
        height: hauteur + 'px'
      }    
    }

    images.sync(textes)
    images.mount()
    textes.mount()
  }

   // INIT Sliders chiffres
   if (document.querySelector('.splide-chiffres')) {
    const splide = new Splide('.splide-chiffres', {
      arrows: false,
      pagination: true,
      type   : 'loop',
      autoplay: 'pause',
      intersection: {
        inView: {
          autoplay: true,
        },
      },
    })
    splide.mount(  { Intersection })
  }



  /**========================================================================
   *                     SELECT INSCRIPTION FORMATION
   *========================================================================**/

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
        window.open(code)
      })
  }

  /**========================================================================
   *                           ÉQUIPE
   *========================================================================**/

  if (document.querySelector('.container-equipe')) {
    const equipes = document.querySelectorAll('.equipe')
    const fermes = document.querySelectorAll('.detail-equipe-ferme')
    const overlays = document.querySelectorAll('.overlay-detail-equipe')

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

    overlays.forEach((element) => {
      element.addEventListener('click', function (e) {
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

  /**========================================================================
   *                           RÉFÉRENCES
   *========================================================================**/

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

  /**========================================================================
   *                           CONTACT
   *========================================================================**/

  if (document.querySelector('#contact-form')) {
    const inputs = document.querySelectorAll('input')
    const form = document.querySelector('#contact-form')
    const radio = document.querySelectorAll('.radio-btn')

    radio.forEach((input) => {
      input.addEventListener('change', (e) => {
        document.querySelector('.form-disabled').classList.remove('form-disabled')
        if (detectMob ()) {
          gsap.to(window, {
            duration: 0.3,
            scrollTo: '#contenu-form',
            //ease: "Power1.easeInOut"
          });
        }
        
      });
  });

    // Tests inputs
    inputs.forEach((element) => {
      element.addEventListener('invalid', (e) => {
        document.getElementById('contact-form').className = 'submitted'
      })
    })



    // Validation du form
    form.addEventListener('submit', (e) => {
      e.preventDefault()

      grecaptcha.ready(function () {
        // Wait for the recaptcha to be ready
        grecaptcha
          .execute('6Lf8nX4qAAAAAMipEIwrkT6h2YpBCavyo-KkF30W', {
            action: 'contact',
          }) // Execute the recaptcha
          .then(function (token) {
            let recaptchaResponse = document.getElementById('recaptchaResponse')
            recaptchaResponse.value = token // Set the recaptcha response

            fetch(
              '/wp-admin/admin-ajax.php?action=captcha&code=' +
                recaptchaResponse.value,
              {
                method: 'post',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded',
                },
                //body:  data = recaptchaResponse.value ,
              }
            )
              .then((response) => response.text())
              .then((response) => {
                const responseText = JSON.parse(response) // Get the response
                console.log(responseText.error, responseText.success)
                if (responseText.error == 1) {
                  // document.querySelector("#alert").innerText = "Erreur Captcha";
                  return false
                } else {
                  //document.querySelector("#alert").innerText = "";
                  form.submit()
                }
              })
          })
      })
    })
  }




  document
    .querySelector('#menuToggle input')
    .addEventListener('change', (e) => {
      if (e.target.checked) {
        document.querySelector('body').classList.add('is-menu-mobile')
      } else {
        document.querySelector('body').classList.remove('is-menu-mobile')
      }
    })
}




function detectMob() {
  const toMatch = [
      /Android/i,
      /webOS/i,
      /iPhone/i,
      /iPad/i,
      /iPod/i,
      /BlackBerry/i,
      /Windows Phone/i
  ];
  
  return toMatch.some((toMatchItem) => {
      return navigator.userAgent.match(toMatchItem);
  });
}