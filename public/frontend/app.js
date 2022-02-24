const header = document.getElementById('header');
window.addEventListener('scroll', ()=>{
    if(window.scrollY > 500)
    {
        header.classList.add('nav-active')
    }
    else{
        header.classList.remove('nav-active')
    }
})
$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        nav: true,
    });
  });