/*-----------------------------------------------------------------------------------

    Theme Name: Loan - Banking and Loan Responsive Template
    Description: Banking and Loan Responsive Template
    Author: Chitrakoot Web
    Version: 1.0

    ---------------------------------- */

!function (e) {
    "use strict";
    var t = e(window);

    function o() {
        var o, a;
        o = e(".full-screen"), a = t.height(), o.css("min-height", a), function () {
            var o = e("header").height(), a = e(".screen-height"), i = t.height() - o;
            a.css("height", i)
        }()
    }
    var defaultLogo  = window.APP_LOGO.default;
    var innerLogo    = window.APP_LOGO.inner;
    var cfgLogo      = window.APP_LOGO.fromConfig;

    e("#preloader").fadeOut("normall", function () {
        e(this).remove()
    }), t.on("scroll", function () {
        var o = t.scrollTop(), a = e(".navbar-brand img"), i = e(".navbar-brand.logodefault img");
        o <= 50 ? (e("header").removeClass("scrollHeader").addClass("fixedHeader"), a.attr("src", defaultLogo), i.attr("src", innerLogo)) : (e("header").removeClass("fixedHeader").addClass("scrollHeader"), a.attr("src", innerLogo), i.attr("src", innerLogo))
    }), t.on("scroll", function () {
        e(this).scrollTop() > 500 ? e(".scroll-to-top").fadeIn(400) : e(".scroll-to-top").fadeOut(400)
    }), e(".scroll-to-top").on("click", function (t) {
        t.preventDefault(), e("html, body").animate({scrollTop: 0}, 600)
    }), e(".parallax,.bg-img").each(function (t) {
        e(this).attr("data-background") && e(this).css("background-image", "url(" + e(this).data("background") + ")")
    }), e(".popup-social-video").magnificPopup({
        disableOn: 700, type: "iframe", mainClass: "mfp-fade", removalDelay: 160, preloader: !1, fixedContentPos: !1
    }), e(".source-modal").magnificPopup({
        type: "inline", mainClass: "mfp-fade", removalDelay: 160
    }), e(".tab1").click(function () {
        e(".second, .third, .four").fadeOut(), e(".first").fadeIn(1e3)
    }), e(".tab2").click(function () {
        e(".first, .third, .four").fadeOut(), e(".second").fadeIn(1e3)
    }), e(".tab3").click(function () {
        e(".second, .first, .four").fadeOut(), e(".third").fadeIn(1e3)
    }), e(".current-year").text((new Date).getFullYear()), t.resize(function (e) {
        setTimeout(function () {
            o()
        }, 500), e.preventDefault()
    }), o(), 0 !== e(".copy-clipboard").length && (new ClipboardJS(".copy-clipboard"), e(".copy-clipboard").on("click", function () {
        var t = e(this);
        t.text();
        t.text("Copied"), setTimeout(function () {
            t.text("Copy")
        }, 2e3)
    })), e(document).ready(function () {
        e(".testimonial-carousel").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !1,
            autoplayTimeout: 5e3,
            smartSpeed: 1500,
            nav: !0,
            dots: !1,
            center: !1,
            margin: 0,
            responsive: {0: {items: 1, nav: !1, dots: !0}, 576: {items: 1}, 768: {items: 1}, 992: {items: 1}}
        }), e(".portfolio-carousel").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            autoplayTimeout: 5e3,
            smartSpeed: 1500,
            nav: !1,
            dots: !0,
            center: !1,
            margin: 50,
            responsive: {0: {items: 1, dots: !1}, 576: {items: 1}, 768: {items: 2}, 992: {items: 3}}
        }), e(".client-carousel").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            autoplayTimeout: 5e3,
            smartSpeed: 1500,
            nav: !1,
            dots: !1,
            center: !1,
            margin: 0,
            responsive: {0: {items: 1}, 481: {items: 2}, 768: {items: 3}, 992: {items: 4}, 1200: {items: 5}}
        }), e(".owl-carousel").owlCarousel({
            items: 1, loop: !0, dots: !1, margin: 0, autoplay: !0, smartSpeed: 500
        }), 0 !== e(".horizontaltab").length && e(".horizontaltab").easyResponsiveTabs({
            type: "default", width: "auto", fit: !0, tabidentify: "hor_1", activate: function (t) {
                var o = e(this), a = e("#nested-tabInfo");
                e("span", a).text(o.text()), a.show()
            }
        }), 0 !== e(".verticaltab").length && e(".verticaltab").easyResponsiveTabs({
            type: "vertical",
            width: "auto",
            fit: !0,
            closed: "accordion",
            tabidentify: "hor_1",
            activate: function (t) {
                var o = e(this), a = e("#nested-tabInfo2");
                e("span", a).text(o.text()), a.show()
            }
        }), e(".countup").counterUp({delay: 25, time: 2e3}), e(".countdown").countdown({
            date: "01 Jan 2026 00:01:00", format: "on"
        }), e(".calculator-loan").accrue()
    }), t.on("load", function () {
        var o = e(".portfolio-gallery-isotope").isotope({});
        e(".filtering").on("click", "span", function () {
            var t = e(this).attr("data-filter");
            o.isotope({filter: t})
        }), e(".filtering").on("click", "span", function () {
            e(this).addClass("active").siblings().removeClass("active")
        }), e(".portfolio-gallery,.portfolio-gallery-isotope").lightGallery(), t.stellar()
    })
}(jQuery);
