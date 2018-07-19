$(function () {
    init();
});

function init() {
    //bannerMainCarousel
    bannerMainCarousel();

    // photoX3Carousel
    photoX3Carousel();

    // lectorCarousel
    lectorCarousel();
}


// bannerMainCarousel
function bannerMainCarousel() {
    var bannerOwl = $('.banner-main.owl-carousel');
    bannerOwl.owlCarousel({
        margin: 0,
        nav: false,
        dots: true,
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplaySpeed: true
    })
}

// photoX3Carousel
function photoX3Carousel() {
    var photoX3Owl = $('.photo-x3.owl-carousel');
    photoX3Owl.owlCarousel({
        margin: 10,
        nav:true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            992: {
                items: 3
            }
        }
    })
}

// lectorCarousel
function lectorCarousel(){
    var lectorOwl = $('.banner-lector.owl-carousel');
    lectorOwl.owlCarousel({
        margin: 0,
        nav: false,
        dots: true,
        items: 1
    })
}