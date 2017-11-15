
window.addEventListener("load", function(){
    //wow
    new WOW().init();
    //preloader
    var load_screen = document.getElementById("load_screen");
    load_screen.style = 'opacity: 0;';
    function removePreloader() {
        document.body.removeChild(load_screen);
    }
    var transitionTime = parseFloat(window.getComputedStyle(load_screen,null).getPropertyValue("transition-duration")) * 1000;
    setTimeout(removePreloader, transitionTime);
});

//parallax
$('.parallax-window').parallax({imageSrc: 'img/main_pic.jpg'});

//buttons animation
var telephone = $('#telephone');
setInterval(function(){ buzzing() }, 4000);

function buzzing(){
    telephone.addClass('phone-buzz');
    setTimeout(function(){ telephone.removeClass('phone-buzz'); }, 1000);
};

// //remove hover on mobile
// function hasTouch() {
//     return 'ontouchstart' in document.documentElement
//         || navigator.maxTouchPoints > 0
//         || navigator.msMaxTouchPoints > 0;
// }
// if (hasTouch()) { // remove all :hover stylesheets
//     try { // prevent exception on browsers not supporting DOM styleSheets properly
//         for (var si in document.styleSheets) {
//             var styleSheet = document.styleSheets[si];
//             if (!styleSheet.rules) continue;
//
//             for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--) {
//                 if (!styleSheet.rules[ri].selectorText) continue;
//
//                 if (styleSheet.rules[ri].selectorText.match(':hover')) {
//                     styleSheet.deleteRule(ri);
//                 }
//             }
//         }
//     } catch (ex) {}
// }


$('.responsive').slick({
    // dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1500,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,
                // dots: true
            }
        },
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});

$("[data-fancybox]").fancybox({
    idleTime : 0,
    loop     : true,
    infobar : false,
    buttons : [
        'close'
    ]
});
$.fancybox.defaults.animationEffect = "fade";
