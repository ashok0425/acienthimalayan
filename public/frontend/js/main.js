const hamburger = document.querySelector('.header .hamburger')
const navbar = document.querySelector('.header .navbar')
const body = document.querySelector('body')

if (hamburger) {

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('is-active')
        navbar.classList.toggle('navbar-active')
    })
}

if (document.querySelector('.testimonial')) {
    const splide = new Splide('.testimonial', {
        pagination: false,
    });


    splide.mount();
}

const header = document.querySelector('header')
window.addEventListener('scroll', () => {
    if (window.scrollY) {
        header.classList.add('header_active')
    }
    else {
        header.classList.remove('header_active')
    }
})

var acc = document.getElementsByClassName("accordion");
var i;
if (acc) {

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = "fit-content";
            }
        });
    }
}

$(document).ready(function () {
    $(function () {
        $("#slider").slider({
            min: 0,
            max: 100,
            range: true,
            slide: function (event, ui) { $("#d1").html("Nrs : " + ui.values[0]), $("#d2").html("Nrs : " + ui.values[1]); }
        });
    });
})

const filter__btns = document.querySelectorAll('.filter__btn')
if (filter__btns) {
    const filter = document.querySelector('.filter__wrap')

    filter__btns.forEach(
        filter__btn => {
            filter__btn.addEventListener('click', () => {
                filter.classList.toggle('is__active')
                body.classList.toggle('modal-open')
            })
        }
    )
}

AOS.init(
    {
        duration: 1000,
        once: true,
        offset: 0,
    }
)