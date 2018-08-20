// Global site tag (gtag.js) - Google Analytics
var GA_TRACKING_ID;
var THIS_PAGE = GetFilename(location);
if ($.cookie) {
    var COOKIE_REGION = $.cookie('region');
}

if (COOKIE_REGION == 'TP') {
    // 台北
    GA_TRACKING_ID = 'UA-61868442-1';
} else if (COOKIE_REGION == 'KH') {
    // 高雄
    GA_TRACKING_ID = 'UA-61868442-2';
} else {
    // 聯誼會
    GA_TRACKING_ID = 'UA-61868442-3';
}

console.log(GA_TRACKING_ID, COOKIE_REGION, THIS_PAGE);

var js = document.createElement("script");
js.type = "text/javascript";
js.src = "https://www.googletagmanager.com/gtag/js?id=" + GA_TRACKING_ID;
document.head.appendChild(js);
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', GA_TRACKING_ID);

// myGA EVENT
function myGA(category, label) {
    console.log(category, label);
    gtag('event', 'click', {
        'event_category': category,
        'event_label': label
    });
}
// GetFilename
function GetFilename(url) {
    if (url) {
        var m = url.toString().match(/.*\/(.+?)\./);
        if (m && m.length > 1) {
            return m[1];
        }
    }
    return "";
}

// booking btn
$('.nav .nav__right--booking').on('click', function(){
    myGA(THIS_PAGE, 'nav_booking_open');
});
$('#header_booking').on('click', function(){
    myGA(THIS_PAGE, 'header_booking');
});
$('#main_booking').on('click', function(){
    myGA(THIS_PAGE, 'main_booking');
});

// main video btn
$('.main a[href$="#popupVideo"]').on('click', function(){
    myGA(THIS_PAGE, 'popup_video');
});

// about main
$('.about.main a[href$="tel:02-2886-8888"]').on('click', function() {
    myGA(THIS_PAGE, 'tp_telphone');
});
$('.about.main a[href$="tel:02-2886-8888 #1700"]').on('click', function() {
    myGA(THIS_PAGE, 'club_telphone');
});
$('.about.main a[href$="tel:tel:07-370-5911"]').on('click', function() {
    myGA(THIS_PAGE, 'ks_telphone');
});

// wedding
$('.wedding a[href$="#contactUs"]').on('click', function() {
    myGA(THIS_PAGE, 'wedding_contact_us');
});
$('.wedding a[href$="tel:02-2886-1818 #1702"]').on('click', function() {
    myGA(THIS_PAGE, 'wedding_telphone');
});

// restaurant
$('.restaurant .booking-start').on('click', function() {
    myGA(THIS_PAGE, 'restaurant_booking');
});

// footer
$('footer a[href$="#contactUs"]').on('click', function(){
    GA(THIS_PAGE, 'footer_contact_us');
});
$('footer a[href$="tel:02-2886-8888"]').on('click', function() {
    GA(THIS_PAGE, 'footer_telphone');
});