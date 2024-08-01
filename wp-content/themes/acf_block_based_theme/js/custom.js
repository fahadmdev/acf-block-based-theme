jQuery(function ($) {
    "use strict";

    mobileMenu('#mobile__menu', '#mobile__menu--button');

    jQuery(window).scrollTop() > 10 ? 
    jQuery(".site-header").addClass('fixed-header') : 
    jQuery(".site-header").removeClass('fixed-header');

    jQuery(window).scroll(function() {
        jQuery(window).scrollTop() > 10 ? 
        jQuery(".site-header").addClass('fixed-header') : 
        jQuery(".site-header").removeClass('fixed-header');
    });
});

function mobileMenu ( menu, button ) {
    jQuery( button ).on( 'click', function() {
        jQuery( button ).stop().toggleClass( 'open' );
        jQuery( menu ).stop().slideToggle( 500 ).css( 'display', 'flex' );
        jQuery( 'body, html' ).stop().toggleClass( 'overflow-hidden' );
    } );

    jQuery( menu + ' .menu-item-has-children > a' ).on( 'click', function( e ) {
        e.preventDefault();
        jQuery( this ).parent().toggleClass( 'active' ).find( '.sub-menu' ).stop().slideToggle( 300 );
    } );
}
// jQuery(document).ready(function($) {
//     $('#search-button').on('click', function(e) {
//         e.preventDefault(); // Prevent default form submission
//         var searchTerm = $('#search-input').val();
//         if (searchTerm.trim() !== '') {
            
//             var searchUrl = window.location.origin + '/?s=' + encodeURIComponent(searchTerm);
//             window.location.href = searchUrl;
//         }
//     });
// });

// swiper slider service detail
document.addEventListener('DOMContentLoaded', function () {
    var swiperContainer = document.querySelector('.swiper-container');
    
    if (swiperContainer) {
        var swiper = new Swiper('.swiper-container', {
            loop: true,
    slidesPerView: 3,
    autoplay: true,
    spaceBetween: 30, 
    pagination: {
        clickable: true,
    },
            spaceBetween: 30,
            pagination: {
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                280: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
              
            }
        });
    }
});

jQuery(document).ready(function($) {
    $('#share-to-icon').click(function() {
      navigator.clipboard.writeText(window.location.href).then(function() {
        var toastElement = $('#liveToast');
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
      }).catch(function(error) {
        console.error('Could not copy text: ', error);
      });
    });
  });


// particle js
particlesJS("particles-js", {
    "particles": {
        "number": {
            "value": 80,
            "density": {
                "enable": false,
                "value_area": 320.6824121731046
            }
        },
        "color": {
            "value": "#FBFF29"
        },
        "shape": {
            "type": "circle",
            "stroke": {
                "width": 0,
                "color": "#000000"
            },
            "polygon": {
                "nb_sides": 4
            },
            "image": {
                "src": "img/github.svg",
                "width": 100,
                "height": 100
            }
        },
        "opacity": {
            "value": 0.7936889701284338,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 1,
                "opacity_min": 0.1,
                "sync": false
            }
        },
        "size": {
            "value": 5,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 24.36231636904035,
                "size_min": 0.1,
                "sync": false
            }
        },
        "line_linked": {
            "enable": true,
            "distance": 160.3412060865523,
            "color": "#fff",
            "opacity": 0.2244776885211732,
            "width": 0.9620472365193136
        },
        "move": {
            "enable": true,
            "speed": 2,
            "direction": "none",
            "random": true,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 1200
            }
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": true,
                "mode": "grab"
            },
            "onclick": {
                "enable": true,
                "mode": "push"
            },
            "resize": true
        },
        "modes": {
            "grab": {
                "distance": 267.9854800594439,
                "line_linked": {
                    "opacity": 1
                }
            },
            "bubble": {
                "distance": 400,
                "size": 40,
                "duration": 2,
                "opacity": 8,
                "speed": 3
            },
            "repulse": {
                "distance": 200,
                "duration": 0.4
            },
            "push": {
                "particles_nb": 4
            },
            "remove": {
                "particles_nb": 2
            }
        }
    },
    "retina_detect": true
});

var count_particles, update;
count_particles = document.querySelector('.js-count-particles');
update = function() {
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
        if (count_particles) {
            count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
        }
    }
    requestAnimationFrame(update);
};
requestAnimationFrame(update);
