/*-----------------------------------------------------------------------------
Theme Name: staco
Author: uigigs
Author URL: https://themeforest.net/user/uigigs/portfolio
-----------------------------------------------------------------------------*/
(function ($) {
    ("use strict");
    /*-- corporate testimonial slider js start --*/
    var headerSection = $(".header-section");
    if (headerSection.length) {
        /*-- sticky header scripts start --*/
        function stacoScroll() {
            let lastScroll = 0;
            $(window).on("scroll", function () {
                let currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
                let diffScroll = currentScroll - lastScroll;
                if (diffScroll > 0 || currentScroll == 0) {
                    $(".header-section").removeClass("sticky");
                    $(".header-section.v2").removeClass("sticky");
                    $("body").removeClass("nav-expanded");
                } else {
                    $(".header-section").addClass("sticky");
                    $(".header-section.v2").addClass("sticky");
                }
                lastScroll = currentScroll;
            });
        }

        stacoScroll();
        /*-- sticky header scripts end --*/
    }

    /*-- corporate testimonial slider js start --*/
    var scrollTop = $(".staco-scroll-top");
    if (scrollTop.length) {
        /*-- sticky header scripts start --*/
        function stacoScroll() {
            let lastScroll = 0;
            $(window).on("scroll", function () {
                let currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
                let diffScroll = currentScroll - lastScroll;
                if (diffScroll > 0 || currentScroll == 0) {
                    $(".staco-scroll-top").removeClass("fixed");
                    $(".staco-scroll-top").removeClass("fixed");
                } else {
                    $(".staco-scroll-top").addClass("fixed");
                    $(".staco-scroll-top").addClass("fixed");
                }
                lastScroll = currentScroll;
            });
        }

        stacoScroll();
        /*-- sticky header scripts end --*/
    }
    /*-- corporate testimonial slider js end --*/

    /*-- menu responsive dropdown scripts start --*/
    $(".main-menu > li").on("click", function () {
        if ($(this).find(".submenu")) {
            $(this).find(".submenu").toggleClass("show");
        }
    });
    /*-- menu responsive dropdown scripts end --*/

    /*-- canvas menu scripts start --*/
    var navexpander = $("#nav-expander");
    if (navexpander.length) {
        $("#nav-expander").on("click", function (e) {
            e.preventDefault();
            $("body").toggleClass("nav-expanded");
        });
    }

    $(".mobile-navbar-menu a").each(function () {
        var href = $(this).attr("href");
        if ((href = "#")) {
            $(this).addClass("hash");
        } else {
            $(this).removeClass("hash");
        }
    });

    $.fn.menumaker = function (options) {
        var mobile_menu = $(this),
            settings = $.extend(
                {
                    format: "dropdown",
                    sticky: false,
                },
                options
            );

        return this.each(function () {
            mobile_menu.find("li ul").parent().addClass("has-sub");
            var multiTg = function () {
                mobile_menu.find(".has-sub").prepend('<span class="submenu-button"><em></em></span>');
                mobile_menu.find(".hash").parent().addClass("hash-has-sub");
                mobile_menu.find(".submenu-button").on("click", function () {
                    if ($(this).parent().siblings("li").hasClass("active")) {
                        $(this).parent().siblings("li").removeClass("active");
                        $(this).parent().siblings("li").find(".submenu-button").removeClass("submenu-opened");
                        $(this).parent().addClass("active");
                        $(this).addClass("submenu-opened");
                        if (
                            $(this).parent().siblings("li").find(".submenu-button").siblings("ul").hasClass("open-sub")
                        ) {
                            $(this)
                                .parent()
                                .siblings("li")
                                .find(".submenu-button")
                                .siblings("ul")
                                .removeClass("open-sub")
                                .hide("fadeIn");
                            $(this).parent().siblings("li").find(".submenu-button").siblings("ul").hide("fadeIn");
                        } else {
                            $(this)
                                .parent()
                                .siblings("li")
                                .find(".submenu-button")
                                .siblings("ul")
                                .addClass("open-sub")
                                .hide("fadeIn");
                            $(this)
                                .parent()
                                .siblings("li")
                                .find(".submenu-button")
                                .siblings("ul")
                                .slideToggle()
                                .show("fadeIn");
                        }

                        if ($(this).siblings("ul").hasClass("open-sub")) {
                            $(this).siblings("ul").removeClass("open-sub").hide("fadeIn");
                            $(this).siblings("ul").hide("fadeIn");
                            $(this).parent().removeClass("active");
                            $(this).removeClass("submenu-opened");
                        } else {
                            $(this).siblings("ul").addClass("open-sub").hide("fadeIn");
                            $(this).siblings("ul").slideToggle().show("fadeIn");
                        }
                    } else {
                        $(this).parent().addClass("active");
                        $(this).addClass("submenu-opened");
                        if ($(this).siblings("ul").hasClass("open-sub")) {
                            $(this).siblings("ul").removeClass("open-sub").hide("fadeIn");
                            $(this).siblings("ul").hide("fadeIn");
                            $(this).parent().removeClass("active");
                            $(this).removeClass("submenu-opened");
                        } else {
                            $(this).siblings("ul").addClass("open-sub").hide("fadeIn");
                            $(this).siblings("ul").slideToggle().show("fadeIn");
                        }
                    }
                });
            };

            if (settings.format === "multitoggle") multiTg();
            else mobile_menu.addClass("dropdown");
            if (settings.sticky === true) mobile_menu.css("position", "fixed");
            var resizeFix = function () {
                if ($(window).width() > 991) {
                    mobile_menu.find("ul").show("fadeIn");
                    mobile_menu.find("ul.sub-menu").hide("fadeIn");
                }
            };
            resizeFix();
            return $(window).on("resize", resizeFix);
        });
    };

    $(document).ready(function () {
        $("#mobile-navbar-menu").menumaker({
            format: "multitoggle",
        });
    });
    /*-- canvas menu scripts end --*/

    /*-- staco scroll top scripts start --*/
    var stacoScrollTop = document.querySelector(".staco-scroll-top");
    if (stacoScrollTop != null) {
        var scrollProgressPatch = document.querySelector(".staco-scroll-top path");
        var pathLength = scrollProgressPatch.getTotalLength();
        var offset = 50;
        scrollProgressPatch.style.transition = scrollProgressPatch.style.WebkitTransition = "none";
        scrollProgressPatch.style.strokeDasharray = pathLength + " " + pathLength;
        scrollProgressPatch.style.strokeDashoffset = pathLength;
        scrollProgressPatch.getBoundingClientRect();
        scrollProgressPatch.style.transition = scrollProgressPatch.style.WebkitTransition =
            "stroke-dashoffset 10ms linear";
        window.addEventListener("scroll", function (event) {
            var scroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var progress = pathLength - (scroll * pathLength) / height;
            scrollProgressPatch.style.strokeDashoffset = progress;
            var scrollElementPos = document.body.scrollTop || document.documentElement.scrollTop;
            if (scrollElementPos >= offset) {
                stacoScrollTop.classList.add("progress-done");
            } else {
                stacoScrollTop.classList.remove("progress-done");
            }
        });
        stacoScrollTop.addEventListener("click", function (e) {
            e.preventDefault();
            window.scroll({
                top: 0,
                left: 0,
                behavior: "smooth",
            });
        });
    }
    /*-- staco scroll top scripts end --*/

    /*-- venobox start --*/
    var myVideoLink = $(".my-video-links");
    if (myVideoLink.length) {
        new VenoBox({
            selector: ".my-video-links",
        });
    }
    /*-- venobox end --*/

    /*-- image rotate when scrolling scripts start --*/
    var rotateIconSection = $(".rotate-icon-btn");
    if (rotateIconSection.length) {
        $(window).on("scroll", function () {
            var rotateIconBtn = $(".rotate-icon-btn");
            var y = window.scrollY;
            var x;
            var rotateIcon;
            rotateIconBtn.each(function (i, item) {
                x = item.offsetTop;
                rotateIcon = $(this).find(".rotate-icon");
                x = x - 400;

                let animationValue = 0;
                animationValue = (y - x) / 4;

                let animationStop = 45;

                if (animationValue < 0) {
                    animationValue = 0;
                }

                if (animationValue > animationStop) {
                    animationValue = animationStop;
                }

                if (y > x) {
                    rotateIcon.css("transform", `rotate(-${animationValue}deg)`);
                } else {
                    rotateIcon.css("transform", `rotate(${animationValue}deg)`);
                }
            });
        });
    }

    /*-- image rotate when scrolling scripts end --*/

    /*-- usability slider start --*/
    var usabilitySliderFor = $(".usability-slider-for");
    if (usabilitySliderFor.length) {
        $(".usability-slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: ".usability-slider-nav",
            autoplay: true,
            fade: true,
            autoplaySpeed: 6000,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false,
        });
    }

    var usabilitySliderNav = $(".usability-slider-nav");
    if (usabilitySliderNav.length) {
        $(".usability-slider-nav").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: ".usability-slider-for",
            dots: false,
            centerMode: true,
            focusOnSelect: true,
        });
    }
    /*-- usability slider end --*/

    /*-- v6 quote slider Start --*/
    var sliderQuoteFor = $(".slider-quote-for");
    if (sliderQuoteFor.length) {
        $(".slider-quote-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            asNavFor: ".slider-quote-nav",
        });
    }

    var sliderQuoteNav = $(".slider-quote-nav");
    if (sliderQuoteNav.length) {
        $(".slider-quote-nav").slick({
            slidesToShow: 5,
            slidesToScroll: false,
            dots: false,
            arrows: false,
            centerMode: true,
            focusOnSelect: true,
            infinite: true,
            asNavFor: ".slider-quote-for",
        });
    }
    /*-- v6 quote slider End --*/

    /*-- v6 benefits slider Start --*/
    var sliderbenefitsFor = $(".slider-benefits-for");
    if (sliderbenefitsFor.length) {
        $(".slider-benefits-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            asNavFor: ".slider-benefits-nav",
            pauseOnHover: false,
            pauseOnFocus: false,
        });
    }

    var sliderbenefitsNav = $(".slider-benefits-nav");
    if (sliderbenefitsNav.length) {
        $(".slider-benefits-nav").slick({
            slidesToShow: 4,
            slidesToScroll: false,
            dots: false,
            arrows: false,
            centerMode: true,
            focusOnSelect: true,
            infinite: true,
            asNavFor: ".slider-benefits-for",
        });
    }
    /*-- v6 benefits slider End --*/

    /*-- v8 weOffering slider Start --*/
    var offeringSlider = $(".we-offering-slider");
    if (offeringSlider.length) {
        $(".we-offering-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            asNavFor: ".we-offering-slider-nav",
            pauseOnHover: false,
            pauseOnFocus: false,
        });
    }

    var offeringSlider = $(".we-offering-slider-nav");
    if (offeringSlider.length) {
        $(".we-offering-slider-nav").slick({
            slidesToShow: 5,
            slidesToScroll: false,
            dots: false,
            arrows: false,
            centerMode: true,
            focusOnSelect: true,
            autoplay: true,
            infinite: true,
            asNavFor: ".we-offering-slider",
        });
    }
    /*-- v8 weOffering slider End --*/

    /*-- marketingImg counter scroll effect start --*/
    var marketingImg = $(".marketing-img.v2");
    if (marketingImg.length) {
        let isAnimated = 0;
        function counterEffect() {
            if (isAnimated == 0) {
                const counterItem = document.querySelectorAll(".counter");
                counterItem.forEach((item) => {
                    var counterText = item.innerText;
                    item.innerText = "0";
                    const updateCounter = () => {
                        let dataTarget = +item.getAttribute("data-target");
                        if (dataTarget > 999) {
                            dataTarget = dataTarget / 1000;
                        }
                        counterText = +item.innerText;
                        let increment = dataTarget / 1000;
                        if (counterText < dataTarget) {
                            item.innerText = `${Math.ceil(counterText + increment)}`;
                            setTimeout(updateCounter, 1);
                        }
                    };
                    updateCounter();
                });
            }
        }
        $(window).on("scroll", function () {
            var counterItem = $(".marketing-img.v2");
            var y = window.scrollY;
            var x = counterItem.offset().top;
            x = x - 400;

            if (y > x && y < x - 400 + screen.height) {
                counterEffect();
                isAnimated++;
            } else {
                isAnimated = 0;
            }
        });
    }
    /*-- marketingImg counter scroll effect end --*/

    /*-- circular progress start --*/
    var pieProgress = $(".pie_progress");
    if (pieProgress.length) {
        $(".pie_progress").asPieProgress({
            namespace: "pie_progress",
            goal: 100,
            min: 0,
            max: 100,
            speed: 15,
            barcolor: "#00CEC9",
            barsize: "10",
            trackcolor: "#00CEC933",
            easing: "linear",
        });
        $(".pie_progress").asPieProgress("start");
    }
    /*-- circular progress end --*/

    /*-- Testimonial slider scripts start --*/
    var testimonialSliderNav = $(".testimonial-slider-nav");
    if (testimonialSliderNav.length) {
        $(".testimonial-slider-nav").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: ".testimonial-slider-for",
            dots: false,
            arrows: false,
            centerMode: true,
            focusOnSelect: true,
        });
    }

    var testimonialSliderFor = $(".testimonial-slider-for");
    if (testimonialSliderFor.length) {
        $(".testimonial-slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: ".testimonial-slider-nav",
            autoplay: true,
            autoplaySpeed: 5000,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false,
        });

        var sliderInfoContainer = document.createElement("div");
        sliderInfoContainer.classList.add("slider-info");
        sliderInfoContainer.innerHTML =
            '<div class="slider-arrow left"><span class="iconify" data-icon="bi:arrow-left"></span></div><div class="slider-counter"><p></p></div><div class="slider-arrow right"><span class="iconify" data-icon="bi:arrow-right"></span></div>';
        testimonialSliderFor.append(sliderInfoContainer);

        var sliderCounter = sliderInfoContainer.querySelector(".slider-counter p");
        sliderCounter.innerHTML = "1/5";

        var updateSliderCounter = function (slick, currentIndex) {
            currentSlide = slick.slickCurrentSlide() + 1;
            slidesCount = slick.slideCount;
            sliderCounter.innerHTML = currentSlide + "/" + slidesCount;
        };

        testimonialSliderFor.on("init", function (event, slick) {
            updateSliderCounter(slick);
        });

        testimonialSliderFor.on("afterChange", function (event, slick, currentSlide) {
            updateSliderCounter(slick, currentSlide);
        });

        var sliderArrowLeft = $(".slider-arrow.left");
        sliderArrowLeft.on("click", function () {
            $(".testimonial-slider-for").slick("slickPrev");
        });
        var sliderArrowRight = $(".slider-arrow.right");
        sliderArrowRight.on("click", function () {
            $(".testimonial-slider-for").slick("slickNext");
        });
    }

    var testimonialCardLeft = $(".testimonial-card-left .img-4");
    if (testimonialCardLeft.length) {
        $(window).on("scroll", function () {
            var testimonialCard = $(".testimonial-card-left .img-4");
            var y = window.scrollY;
            var x = testimonialCard.offset().top;
            var rotateIcon = testimonialCard.find(".rotate-icon");
            x = x - 400;

            let animationValue = 0;
            animationValue = (y - x) / 4;

            let animationStop = 45;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            if (y > x) {
                rotateIcon.css("transform", `rotate(-${animationValue}deg)`);
            } else {
                rotateIcon.css("transform", `rotate(${animationValue}deg)`);
            }
        });
    }
    /*-- Testimonial slider scripts end --*/

    /*-- compare price icon scripts start --*/
    var comparePriceCardIcon = $(".compare-price-card-icon");
    if (comparePriceCardIcon.length) {
        $(window).on("scroll", function () {
            var comparePriceIcon = $(".compare-price-card-icon");
            var y = window.scrollY;
            var x = comparePriceIcon.offset().top;
            var rotateIcon = comparePriceIcon.find(".rotate-icon");
            x = x - 400;

            var rotateIcon = comparePriceIcon.find(".rotate-icon");

            let animationValue = 0;
            animationValue = (y - x) / 3;

            let animationStop = 90;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            if (y > x) {
                rotateIcon.css("transform", `rotate(${animationValue}deg)`);
            } else {
                rotateIcon.css("transform", `rotate(${animationValue}deg)`);
            }
        });
    }
    /*-- compare price icon scripts end --*/

    /*-- index2-statistics-content section start --*/
    var index2StatisticsContent = $(".index2-statistics-content");
    if (index2StatisticsContent.length) {
        let isAnimated = 0;
        function counterEffect() {
            if (isAnimated == 0) {
                const counterItem = document.querySelectorAll(".counter");
                counterItem.forEach((item) => {
                    var counterText = item.innerText;
                    item.innerText = "0";
                    const updateCounter = () => {
                        let dataTarget = +item.getAttribute("data-target");
                        if (dataTarget > 999) {
                            dataTarget = dataTarget / 1000;
                        }
                        counterText = +item.innerText;
                        let increment = dataTarget / 1000;
                        if (counterText < dataTarget) {
                            item.innerText = `${Math.ceil(counterText + increment)}`;
                            setTimeout(updateCounter, 1);
                        }
                    };
                    updateCounter();
                });
            }
        }
        $(window).on("scroll", function () {
            var counterItem = $(".index2-statistics-content");
            var y = window.scrollY;
            var x = counterItem.offset().top;
            x = x - 400;

            if (y > x && y < x - 400 + screen.height) {
                counterEffect();
                isAnimated++;
            } else {
                isAnimated = 0;
            }
        });
    }
    /*-- index2-statistics-content section end --*/

    /*-- about feature section start --*/
    var aboutFeatureSliderFor = $(".about-feature-slider-for");
    if (aboutFeatureSliderFor.length) {
        $(".about-feature-slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: ".about-feature-slider-nav",
            autoplay: true,
            autoplaySpeed: 6000,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false,
        });
    }

    var aboutFeatureSliderNav = $(".about-feature-slider-nav");
    if (aboutFeatureSliderNav.length) {
        $(".about-feature-slider-nav").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: ".about-feature-slider-for",
            dots: false,
            centerMode: true,
            focusOnSelect: true,
        });
    }

    var aboutFeatureImg = $(".about-feature-img");
    if (aboutFeatureImg.length) {
        let isAnimated = 0;
        function counterEffect() {
            if (isAnimated == 0) {
                const counterItem = document.querySelectorAll(".counter");
                counterItem.forEach((item) => {
                    var counterText = item.innerText;
                    item.innerText = "0";
                    const updateCounter = () => {
                        let dataTarget = +item.getAttribute("data-target");
                        if (dataTarget > 999) {
                            dataTarget = dataTarget / 1000;
                        }
                        counterText = +item.innerText;
                        let increment = dataTarget / 1000;
                        if (counterText < dataTarget) {
                            item.innerText = `${Math.ceil(counterText + increment)}`;
                            setTimeout(updateCounter, 1);
                        }
                    };
                    updateCounter();
                });
            }
        }
        $(window).on("scroll", function () {
            var counterItem = $(".about-feature-img");
            var y = window.scrollY;
            var x = counterItem.offset().top;
            x = x - 400;

            if (y > x && y < x - 400 + screen.height) {
                counterEffect();
                isAnimated++;
            } else {
                isAnimated = 0;
            }
        });
    }
    /*-- about feature section end --*/

    /*-- pricing selector scripts start --*/
    var pricingSelector = $(".pricing-selector");
    if (pricingSelector.length) {
        $(".pricing-monthly-btn").on("click", function () {
            $("#pricing-selector").prop("checked", false);
            $(".pricing-monthly").css("display", "block");
            $(".pricing-yearly").css("display", "none");
        });

        $(".pricing-yearly-btn").on("click", function () {
            $("#pricing-selector").prop("checked", true);
            $(".pricing-monthly").css("display", "none");
            $(".pricing-yearly").css("display", "block");
        });

        $("#pricing-selector").on("change", function () {
            if (this.checked) {
                $(".pricing-monthly").css("display", "none");
                $(".pricing-yearly").css("display", "block");
            } else {
                $(".pricing-monthly").css("display", "block");
                $(".pricing-yearly").css("display", "none");
            }
        });
    }
    /*-- pricing selector scripts end --*/

    /*-- best pricing selector scripts start --*/
    var bestPricingSelector = $(".best-pricing-selector");
    if (bestPricingSelector.length) {
        $(".best-pricing-monthly-btn").on("click", function () {
            $("#best-pricing-selector").prop("checked", false);
            $(".best-pricing-grid.monthly").css("display", "flex");
            $(".best-pricing-grid.yearly").css("display", "none");
            $(".best-pricing-monthly-btn").addClass("active");
            $(".best-pricing-yearly-btn").removeClass("active");
        });

        $(".best-pricing-yearly-btn").on("click", function () {
            $("#best-pricing-selector").prop("checked", true);
            $(".best-pricing-grid.monthly").css("display", "none");
            $(".best-pricing-grid.yearly").css("display", "flex");
            $(".best-pricing-monthly-btn").removeClass("active");
            $(".best-pricing-yearly-btn").addClass("active");
        });

        $("#best-pricing-selector").on("change", function () {
            if (this.checked) {
                $(".best-pricing-grid.monthly").css("display", "none");
                $(".best-pricing-grid.yearly").css("display", "flex");
                $(".best-pricing-monthly-btn").removeClass("active");
                $(".best-pricing-yearly-btn").addClass("active");
            } else {
                $(".best-pricing-grid.monthly").css("display", "flex");
                $(".best-pricing-grid.yearly").css("display", "none");
                $(".best-pricing-monthly-btn").addClass("active");
                $(".best-pricing-yearly-btn").removeClass("active");
            }
        });
    }
    /*-- best pricing selector scripts end --*/

    /*-- useful-feature section start --*/
    var usefulFeatureSliderFor = $(".useful-feature-slider-for");
    if (usefulFeatureSliderFor.length) {
        $(".useful-feature-slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: ".useful-feature-slider-nav",
            autoplay: true,
            autoplaySpeed: 6000,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false,
        });
    }

    var usefulFeatureSliderNav = $(".useful-feature-slider-nav");
    if (usefulFeatureSliderNav.length) {
        $(".useful-feature-slider-nav").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: ".useful-feature-slider-for",
            dots: false,
            centerMode: true,
            focusOnSelect: true,
        });
    }
    /*-- useful-feature section end --*/

    /*-- compare price card start --*/
    var comparePriceCard = $(".compare-price-card");
    if (comparePriceCard.length) {
        var selectComparePrice = comparePriceCard.find("#select-compare-price");
        var basicPrice = comparePriceCard.find(".basic-price");
        var premiumPrice = comparePriceCard.find(".premium-price");
        var professionalPrice = comparePriceCard.find(".professional-price");

        selectComparePrice.on("change", function () {
            var $option = $(this).find("option:selected");
            var value = $option.val();
            if (value == "basic") {
                basicPrice.css("display", "block");
                premiumPrice.css("display", "none");
                professionalPrice.css("display", "none");
            } else if (value == "premium") {
                basicPrice.css("display", "none");
                premiumPrice.css("display", "block");
                professionalPrice.css("display", "none");
            } else if (value == "professional") {
                basicPrice.css("display", "none");
                premiumPrice.css("display", "none");
                professionalPrice.css("display", "block");
            } else {
                basicPrice.css("display", "block");
                premiumPrice.css("display", "none");
                professionalPrice.css("display", "none");
            }
        });
    }
    /*-- compare price card end --*/

    /*-- counter scrolling effect start --*/
    var counterCard = $(".counter-card");
    if (counterCard.length) {
        let isAnimated = 0;
        function counterEffect() {
            if (isAnimated == 0) {
                const counterItem = document.querySelectorAll(".counter");
                counterItem.forEach((item) => {
                    var counterText = item.innerText;
                    item.innerText = "0";
                    const updateCounter = () => {
                        let dataTarget = +item.getAttribute("data-target");
                        if (dataTarget > 999) {
                            dataTarget = dataTarget / 1000;
                        }
                        counterText = +item.innerText;
                        let increment = dataTarget / 1000;
                        if (counterText < dataTarget) {
                            item.innerText = `${Math.ceil(counterText + increment)}`;
                            setTimeout(updateCounter, 1);
                        }
                    };
                    updateCounter();
                });
            }
        }
        $(window).on("scroll", function () {
            var counterItem = $(".counter-card");
            var y = window.scrollY;
            var x = counterItem.offset().top;
            x = x - 400;

            if (y > x && y < x - 400 + screen.height) {
                counterEffect();
                isAnimated++;
            } else {
                isAnimated = 0;
            }
        });
    }
    /*-- counter scrolling effect end --*/

    /*-- hero Section 3 content scripts start --*/
    var heroSection3Content = $(".hero-section-3-content");
    if (heroSection3Content.length) {
        $(window).on("scroll", function () {
            var y = window.scrollY;
            var x = heroSection3Content.offset().top;
            x = x - 400;
            var item = document.querySelectorAll(".hero-section-3-content .item");
            var z = y / 15;
            if (y > x) {
                item[0].style.transform = "translate(-" + z + "px)";
                item[1].style.transform = "translate(-" + z / 2 + "px)";
                item[3].style.transform = "translate(" + z / 2 + "px)";
                item[4].style.transform = "translate(" + z + "px)";
                console.log(z);
            }
        });
    }
    /*-- hero Section 3 content scripts end --*/

    /*-- Timer scripts start --*/
    var timerContent = $(".timer");
    if (timerContent.length) {
        function makeTimer() {
            var endTime = new Date("jun 15, 2023 02:15:13");
            var endTime = Date.parse(endTime) / 1000;
            var now = new Date();
            var now = Date.parse(now) / 1000;
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - days * 86400) / 3600);
            var Xmas95 = new Date("December 25, 2023 23:15:30");
            var hour = Xmas95.getHours();
            var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
            var seconds = Math.floor(timeLeft - days * 86400 - hours * 3600 - minutes * 60);
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $(".timer .days").html(days + "<span>d</span>");
            $(".timer .hours").html(hours + "<span>h</span>");
            $(".timer .minutes").html(minutes + "<span>m</span>");
            $(".timer .seconds").html(seconds + "<span>s</span>");
        }
        setInterval(function () {
            makeTimer();
        }, 1000);
    }
    /*-- Timer scripts end --*/

    /*-- index5 img effect when scrolling scripts start --*/
    var hero5 = $(".hero-section-index5");
    if (hero5.length) {
        $(window).on("scroll", function () {
            var indexVImg = $(".hero-section-index5");
            var y = window.scrollY;
            var x;
            var heroVImg;
            x = indexVImg.offset().top;
            heroVImg = indexVImg.find(".index5-hero-img img");
            x = x + 400;

            console.log(y);
            console.log(x);

            let animationValue = 40;
            animationValue = (animationValue - (y - x)) / 5;

            let animationStop = 0;

            if (animationValue > 40) {
                animationValue = 40;
            }

            if (animationValue < animationStop) {
                animationValue = animationStop;
            }

            if (y > x) {
                heroVImg.css("transform", `rotateX(${animationValue}deg)`);
            } else {
                heroVImg.css("transform", `rotateX(${animationValue}deg)`);
            }

            var scrollSlider = $(".index5-scroll-carousel-section");
            var z = scrollSlider.offset().top;
            z = z - 500;
            var val = (-1 * y) / 4;
            var val2 = y / 4;
            if (y > z) {
                $(".slide-left").css("transform", `translateX(${val}px)`);
                $(".slide-right").css("transform", `translateX(${val2}px)`);
            }
        });
    }
    /*-- index5 img effect when scrolling scripts end --*/

    /*-- timeline start --*/
    var powerfullTemplateContent = $(".powerfull-template-content");
    if (powerfullTemplateContent.length) {
        $(window).on("scroll", function () {
            fnOnScroll();
        });

        $(window).on("resize", function () {
            fnOnResize();
        });

        var timelineListArea = $(".powerfull-template-content"),
            timelineInnerline = $(".timeline-innerline"),
            timelineProgress = $(".timeline-progress"),
            listItem = $(".powerfull-template-row"),
            agOuterHeight = $(window).outerHeight(),
            agHeight = $(window).height(),
            f = -1,
            agFlag = false;

        function fnOnScroll() {
            agPosY = $(window).scrollTop();

            fnUpdateFrame();
        }

        function fnOnResize() {
            agPosY = $(window).scrollTop();
            agHeight = $(window).height();

            fnUpdateFrame();
        }

        function fnUpdateWindow() {
            agFlag = false;

            f !== agPosY && ((f = agPosY), agHeight, fnUpdateProgress());
        }

        function fnUpdateProgress() {
            var agTop = listItem.last().offset().top;

            i = agTop + agPosY - $(window).scrollTop();

            a = timelineProgress.offset().top + agPosY - $(window).scrollTop();

            n = agPosY - a + agOuterHeight / 2;
            i <= agPosY + agOuterHeight / 2 && (n = i - a);
            timelineProgress.css({ height: n + "px" });

            listItem.each(function () {
                var agTop = $(this).offset().top;

                agTop + agPosY - $(window).scrollTop() < agPosY + 0.5 * agOuterHeight
                    ? $(this).addClass("active")
                    : $(this).removeClass("active");
            });
        }

        function fnUpdateFrame() {
            agFlag || requestAnimationFrame(fnUpdateWindow);
            agFlag = true;
        }
    }
    /*-- timeline end --*/

    /*-- happy-customers-bg-ball1 start --*/
    var happyCustomersBgBall1 = $(".happy-customers-bg-ball1");
    if (happyCustomersBgBall1.length) {
        $(window).on("scroll", function () {
            var happyCustomersBgBall = $(".happy-customers-bg-ball1");
            var y = window.scrollY;
            var x = happyCustomersBgBall.offset().top;
            x = x - 400;

            let animationValue = 0;
            animationValue = (y - x) / 6;

            let animationStop = 50;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            if (y > x) {
                happyCustomersBgBall.css("transform", `translateX(-${animationValue}px)`);
            } else {
                happyCustomersBgBall.css("transform", `translateX(${animationValue}px)`);
            }
        });
    }
    /*-- happy-customers-bg-ball1 end --*/

    /*-- happy customer slider start --*/
    var happyCustomerSliderFor = $(".happy-customer-slider-for");
    if (happyCustomerSliderFor.length) {
        $(".happy-customer-slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: "<img class='slick-prev' src='./assets/images/icons/arrow-left-black.svg' alt='prev'>",
            nextArrow: "<img class='slick-next' src='./assets/images/icons/arrow-right-black.svg' alt='next'>",
            asNavFor: ".happy-customer-slider-nav",
            autoplay: true,
            autoplaySpeed: 6000,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false,
        });

        var sliderCounter = document.createElement("div");
        sliderCounter.classList.add("slider-counter");
        happyCustomerSliderFor.append(sliderCounter);
        sliderCounter.innerHTML = "1/4";

        var updateSliderCounter = function (slick, currentIndex) {
            currentSlide = slick.slickCurrentSlide() + 1;
            slidesCount = slick.slideCount;
            sliderCounter.innerHTML = currentSlide + "/" + slidesCount;
        };

        happyCustomerSliderFor.on("init", function (event, slick) {
            updateSliderCounter(slick);
        });

        happyCustomerSliderFor.on("afterChange", function (event, slick, currentSlide) {
            updateSliderCounter(slick, currentSlide);
        });
    }

    var happyCustomerSliderNav = $(".happy-customer-slider-nav");
    if (happyCustomerSliderNav.length) {
        $(".happy-customer-slider-nav").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: ".happy-customer-slider-for",
            dots: false,
            centerMode: true,
            focusOnSelect: true,
        });
    }
    /*-- happy customer slider end --*/

    /*-- feature team  slider start--*/
    var featureTeamSliderFor = $(".feature-team-slider-for");
    if (featureTeamSliderFor.length) {
        $(".feature-team-slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: ".feature-team-slider-nav",
            autoplay: true,
            autoplaySpeed: 6000,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false,
        });
    }

    var featureTeamSliderNav = $(".feature-team-slider-nav");
    if (featureTeamSliderNav.length) {
        $(".feature-team-slider-nav").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: "<img class='slick-prev' src='./assets/images/icons/arrow-left-black.svg' alt='prev'>",
            nextArrow: "<img class='slick-next' src='./assets/images/icons/arrow-right-black.svg' alt='next'>",
            asNavFor: ".feature-team-slider-for",
            dots: false,
            centerMode: true,
            focusOnSelect: true,
        });
    }
    /*-- feature team  slider end --*/

    /*-- portfolio gallery start --*/
    var portfolioGallery = $(".portfolio-gallery");
    if (portfolioGallery.length) {
        $(window).on("scroll", function () {
            var container = $(".portfolio-gallery");
            var y = window.scrollY;
            var x;
            x = container.offset().top;
            x = x - 400;
            var val = (-1 * y) / 2;
            if (y > x) {
                container.css("transform", `translateX(${val}px)`);
            }
        });
    }
    /*-- portfolio gallery end --*/

    /*-- video start --*/
    var v6BannerImg = $(".v6-banner-img");
    if (v6BannerImg.length) {
        let stacoH6Video = document.getElementById("staco-h6-video");
        let stacoH6VideoControl = document.getElementById("staco-h6-video-control");
        stacoH6VideoControl.addEventListener("click", () => {
            if (stacoH6Video.paused) {
                stacoH6Video.play();
                stacoH6VideoControl.classList.remove("active");
            } else {
                stacoH6Video.pause();
                stacoH6VideoControl.classList.add("active");
            }
        });
    }
    /*-- video end --*/

    /*-- contact map start --*/
    var contactMap = $(".contact-map");
    if (contactMap.length) {
        function initialize() {
            $(".contact-map").each(function (index) {
                //Taking data attribute from map wrapper
                var mapLat = parseFloat($(this).data("lat"));
                var mapLng = parseFloat($(this).data("lng"));
                var mapZoom = parseInt($(this).data("zoom"));
                var mapType = $(this).data("maptype");

                //Processing wrapper data attribute to coordinate
                var mapOptions = {
                    center: {
                        lat: mapLat,
                        lng: mapLng,
                    },
                    zoom: mapZoom,
                    mapTypeId: mapType,
                    scrollwheel: false,
                };

                //Initiating map
                var map = new google.maps.Map(this, mapOptions);

                //Map Marker
                var marker = new google.maps.Marker({
                    position: {
                        lat: 40.713355,
                        lng: -74.005535,
                    },
                    map: map,
                    icon: "./assets/images/icons/map-marker.svg",
                });
            });
        }
        google.maps.event.addDomListener(window, "load", initialize);
        initialize();
    }
    /*-- contact map end --*/

    /*-- v7 Banner text slider Start--*/
    var sliderQuoteFor = $(".banner-text-slider-content");
    if (sliderQuoteFor.length) {
        $(".banner-text-slider-content").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            autoplay: true,
            autoplaySpeed: 1500,
            infinite: true,
            lazyLoad: "ondemand",
            fade: true,
            asNavFor: ".banner-text-slider",
        });
    }

    var sliderQuoteNav = $(".banner-text-slider");
    if (sliderQuoteNav.length) {
        $(".banner-text-slider").slick({
            slidesToShow: 3,
            slidesToScroll: false,
            dots: false,
            arrows: false,
            centerMode: true,
            focusOnSelect: true,
            infinite: true,
            lazyLoad: "ondemand",
            asNavFor: ".banner-text-slider-content",
        });
    }
    /*-- v7 Banner text slider End--*/

    /*--  Side Bar Sticky js Start--*/
    var sidebarSticky = $(".sidebar");
    if (sidebarSticky.length) {
        var sidebar = new StickySidebar(".sidebar", {
            topSpacing: 20,
            bottomSpacing: 20,
            containerSelector: ".main-content",
            innerWrapperSelector: ".sidebar__inner",
        });
    }
    /*--  Side Bar Sticky js End --*/

    var swiperContainer = $(".swiper-container");
    if (swiperContainer.length) {
        const swiper = new Swiper(".swiper-container", {
            slideToClickedSlide: true,
            slidePerView: "auto",
            centeredSlides: true,
            spaceBetween: 30,

            freeMode: {
                enabled: false,
                sticky: false,
                momentumBounce: true,
            },
            scrollbar: {
                el: ".swiper-scrollbar",
                draggable: true,
                dragSize: 100,
            },
            mousewheel: {
                enabled: true,
                sensitivity: 5.5,
                eventsTarget: ".why-choose-parent",
            },
        });
    }

    /*-- compare plan js start --*/
    var comparePlansContent = $(".compare-plans-content");
    if (comparePlansContent.length) {
        if ($(window).innerWidth() <= 991) {
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("pricingPlanTabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("pricingPlanTablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("pricingPlanTabDefaultOpen").click();
        }
    }
    /*-- compare plan js End --*/

    /*-- pricing Card Js Start --*/
    var pricingPlanSection = $(".pricing-plan-section");
    if (pricingPlanSection.length) {
        $(".pricing-plan-show-btn1").on("click", function () {
            $(".pricing-plan-show-btn1").toggleClass("active");
            $(".free-card").toggleClass("active");
        });

        $(".pricing-plan-show-btn2").on("click", function () {
            $(".pricing-plan-show-btn2").toggleClass("active");
            $(".growth-card").toggleClass("active");
        });

        $(".pricing-plan-show-btn3").on("click", function () {
            $(".pricing-plan-show-btn3").toggleClass("active");
            $(".business-card").toggleClass("active");
        });

        $(".pricing-plan-show-btn4").on("click", function () {
            $(".pricing-plan-show-btn4").toggleClass("active");
            $(".enterprise-card").toggleClass("active");
        });
    }
    /*-- pricing Card Js End --*/

    /*-- h6-bottom-section scripts start --*/
    var h6BottomSection = $(".h6-bottom-section");
    if (h6BottomSection.length) {
        $(window).on("scroll", function () {
            var item = $(".disclaimer-section");
            var y = window.scrollY;
            var x = h6BottomSection.offset().top;
            x = x - 400;

            if (y > x) {
                item.css("position", "sticky");
                item.css("bottom", "0");
                item.css("z-index", "-1");
            } else {
                item.css("position", "unset");
            }
        });
    }
    /*-- h6-bottom-section scripts end --*/

    /*-- chatbot-testmonial-slider js start --*/
    var chatbotTestmonialContent = $(".chatbot-testmonial-slider");
    if (chatbotTestmonialContent.length) {
        $(".chatbot-testmonial-slider").slick({
            dots: true,
            arrows: false,
            infinite: true,
            autoplay: true,
            speed: 500,
            slidesToShow: 1,
            adaptiveHeight: true,
            pauseOnHover: false,
            pauseOnFocus: false,
        });
    }
    /*-- chatbot-testmonial-slider js End --*/

    /*-- convert-visitors-slider-content start --*/
    var convertVisitorsSliderContent = $(".convert-visitors-slider-content");
    if (convertVisitorsSliderContent.length) {
        $(".convert-visitors-slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            dots: true,
            asNavFor: ".convert-visitors-slider-nav",
            focusOnSelect: true,
            autoplay: true,
            speed: 300,
            pauseOnHover: false,
            pauseOnFocus: false,
        });
    }
    /*-- convert-visitors-slider-content End --*/

    /*-- convert-visitors-slider-nav start --*/
    var convertVisitorsSliderNav = $(".convert-visitors-slider-nav");
    if (convertVisitorsSliderNav.length) {
        $(".convert-visitors-slider-nav").slick({
            slidesToShow: 4,
            slidesToScroll: 0,
            asNavFor: ".convert-visitors-slider-for",
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            autoplay: true,
            speed: 300,
            pauseOnHover: false,
            pauseOnFocus: false,
        });
    }
    /*-- convert-visitors-slider-nav End --*/

    /*-- chatbot-customers-suport-sectoin start --*/
    var cardImg1 = $(".card-img1");
    if (cardImg1.length) {
        $(window).on("scroll", function () {
            var CardImage = $(".card-img1");
            var y = window.scrollY;
            var x;
            x = CardImage.offset().top;
            x = x - 400;

            let animationValue = 0;
            animationValue = (y - x) / 2;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            CardImage.css("transform", `translateY(${animationValue}px)`);
        });
    }

    var cardImg2 = $(".card-img2");
    if (cardImg2.length) {
        $(window).on("scroll", function () {
            var CardImage = $(".card-img2");
            var y = window.scrollY;
            var x;
            x = CardImage.offset().top;
            x = x - 400;

            let animationValue = 0;
            animationValue = (y - x) / 2;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            CardImage.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- chatbot-customers-suport-sectoin end --*/

    /*-- chatbot-why-choose start --*/
    var chooseImg = $(".chatbot-why-choose-img");
    if (chooseImg.length) {
        $(window).on("scroll", function () {
            var chooseImage = $(".chatbot-why-choose-img");
            var y = window.scrollY;
            var x;
            x = chooseImage.offset().top;
            x = x - 200;

            let animationValue = 0;
            animationValue = (y - x) / 3;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            chooseImage.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- chatbot-why-choose end --*/

    /*-- chatbot pricing Card Js Start --*/
    var chatbotBestPricingSection = $(".chatbot-best-pricing-section");
    if (chatbotBestPricingSection.length) {
        $(".chatbot-pricing-card-btn").click(function () {
            $(".best-pricing-monthly").toggle();
            $(".best-pricing-yearly").toggle();
        });
    }
    /*-- chatbot pricing Card Js End --*/

    /*-- timeline start --*/
    var powerfullEmailContent = $(".email-collaps-list");
    if (powerfullEmailContent.length) {
        $(window).on("scroll", function () {
            fnOnScroll();
        });

        $(window).on("resize", function () {
            fnOnResize();
        });

        var timelineListArea = $(".email-collaps-list"),
            timelineInnerline = $(".timeline-innerline"),
            timelineProgress = $(".timeline-progress"),
            listItem = $(".email-collaps-item"),
            agOuterHeight = $(window).outerHeight(),
            agHeight = $(window).height(),
            f = -1,
            agFlag = false;

        function fnOnScroll() {
            agPosY = $(window).scrollTop();

            fnUpdateFrame();
        }

        function fnOnResize() {
            agPosY = $(window).scrollTop();
            agHeight = $(window).height();

            fnUpdateFrame();
        }

        function fnUpdateWindow() {
            agFlag = false;

            f !== agPosY && ((f = agPosY), agHeight, fnUpdateProgress());
        }

        function fnUpdateProgress() {
            var agTop = listItem.last().offset().top;

            i = agTop + agPosY - $(window).scrollTop();

            a = timelineProgress.offset().top + agPosY - $(window).scrollTop();

            n = agPosY - a + agOuterHeight / 2;
            i <= agPosY + agOuterHeight / 2 && (n = i - a);
            timelineProgress.css({ height: n + "px" });

            listItem.each(function () {
                var agTop = $(this).offset().top;

                agTop + agPosY - $(window).scrollTop() < agPosY + 0.5 * agOuterHeight
                    ? $(this).addClass("active").siblings().removeClass("active")
                    : $(this).removeClass("active");
            });
        }

        function fnUpdateFrame() {
            agFlag || requestAnimationFrame(fnUpdateWindow);
            agFlag = true;
        }
    }
    /*-- timeline end --*/

    /*-- bannerSlider Js Start --*/
    var bannerSlider = $(".banner-slider");
    if (bannerSlider.length) {
        $(".banner-slider").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            centerMode: true,
            variableWidth: true,
            infinite: true,
            focusOnSelect: true,
            cssEase: "linear",
            touchMove: true,
            pauseOnHover: false,
            pauseOnFocus: false,
            autoplay: true,
            speed: 300,
            asNavFor: ".nft-banner-slider-nav",
        });
    }
    var bannerSliderNav = $(".nft-banner-slider-nav");
    if (bannerSliderNav.length) {
        $(".nft-banner-slider-nav").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            infinite: true,
            touchMove: true,
            pauseOnHover: false,
            pauseOnFocus: false,
            autoplay: true,
            speed: 300,
            asNavFor: ".banner-slider",
        });
    }
    /*-- bannerSlider Js End --*/

    /*-- nft-categorie-slider Js Start --*/
    var nftCategorieSlider = $(".nft-categorie-slider");
    if (nftCategorieSlider.length) {
        $(".nft-categorie-slider").slick({
            dots: false,
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: false,
            touchMove: true,
            pauseOnHover: false,
            pauseOnFocus: false,
            autoplay: true,
            speed: 300,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 540,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    }
    /*-- nft-categorie-slider Js End --*/

    /*-- live-auctions-slider Js Start --*/
    var liveAuctionsSlider = $(".live-auctions-slider");
    if (liveAuctionsSlider.length) {
        $(".live-auctions-slider").slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    },
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    }
    /*-- live-auctions-slider Js End --*/

    /*-- hot-collections-slider Js Start --*/
    var hotCollectionsSlider = $(".hot-collections-slider");
    if (hotCollectionsSlider.length) {
        $(".hot-collections-slider").slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2,
                    },
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    }
    /*-- hot-collections-slider Js End --*/

    /*-- Timer1 Js --*/
    var timer1 = $(".timer_1");
    if (timer1.length) {
        function makeTimer() {
            var endTime = new Date("aug 15, 2023 10:35:13");
            var endTime = Date.parse(endTime) / 1000;
            var now = new Date();
            var now = Date.parse(now) / 1000;
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - days * 86400) / 3600);
            var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
            var seconds = Math.floor(timeLeft - days * 86400 - hours * 3600 - minutes * 60);
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $(".timer_1 .hours").html(hours + "<span>H</span>");
            $(".timer_1 .minutes").html(minutes + "<span>M</span>");
            $(".timer_1 .seconds").html(seconds + "<span>S</span>");
        }
        setInterval(function () {
            makeTimer();
        }, 1000);
    }

    /*-- Timer2 Js --*/
    var timer2 = $(".timer_2");
    if (timer2.length) {
        function makeTimer() {
            var endTime = new Date("jun 18, 2023 06:10:28");
            var endTime = Date.parse(endTime) / 1000;
            var now = new Date();
            var now = Date.parse(now) / 1000;
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - days * 86400) / 3600);
            var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
            var seconds = Math.floor(timeLeft - days * 86400 - hours * 3600 - minutes * 60);
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $(".timer_2 .days").html(days + "<span>D</span>");
            $(".timer_2 .hours").html(hours + "<span>H</span>");
            $(".timer_2 .minutes").html(minutes + "<span>M</span>");
            $(".timer_2 .seconds").html(seconds + "<span>S</span>");
        }
        setInterval(function () {
            makeTimer();
        }, 1000);
    }

    /*-- Timer3 Js --*/
    var timer3 = $(".timer_3");
    if (timer3.length) {
        function makeTimer() {
            var endTime = new Date("aug 21, 2023 05:18:23");
            var endTime = Date.parse(endTime) / 1000;
            var now = new Date();
            var now = Date.parse(now) / 1000;
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - days * 86400) / 3600);
            var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
            var seconds = Math.floor(timeLeft - days * 86400 - hours * 3600 - minutes * 60);
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $(".timer_3 .days").html(days + "<span>D</span>");
            $(".timer_3 .hours").html(hours + "<span>H</span>");
            $(".timer_3 .minutes").html(minutes + "<span>M</span>");
            $(".timer_3 .seconds").html(seconds + "<span>S</span>");
        }
        setInterval(function () {
            makeTimer();
        }, 1000);
    }

    /*-- Timer4 Js --*/
    var timer4 = $(".timer_4");
    if (timer4.length) {
        function makeTimer() {
            var endTime = new Date("jul 15, 2023 07:13:18");
            var endTime = Date.parse(endTime) / 1000;
            var now = new Date();
            var now = Date.parse(now) / 1000;
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - days * 86400) / 3600);
            var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
            var seconds = Math.floor(timeLeft - days * 86400 - hours * 3600 - minutes * 60);
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $(".timer_4 .days").html(days + "<span>D</span>");
            $(".timer_4 .hours").html(hours + "<span>H</span>");
            $(".timer_4 .minutes").html(minutes + "<span>M</span>");
            $(".timer_4 .seconds").html(seconds + "<span>S</span>");
        }
        setInterval(function () {
            makeTimer();
        }, 1000);
    }

    /*-- Timer5 Js --*/
    var timer5 = $(".timer_5");
    if (timer5.length) {
        function makeTimer() {
            var endTime = new Date("jun 20, 2023 09:35:47");
            var endTime = Date.parse(endTime) / 1000;
            var now = new Date();
            var now = Date.parse(now) / 1000;
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - days * 86400) / 3600);
            var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
            var seconds = Math.floor(timeLeft - days * 86400 - hours * 3600 - minutes * 60);
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $(".timer_5 .days").html(days + "<span>D</span>");
            $(".timer_5 .hours").html(hours + "<span>H</span>");
            $(".timer_5 .minutes").html(minutes + "<span>M</span>");
            $(".timer_5 .seconds").html(seconds + "<span>S</span>");
        }
        setInterval(function () {
            makeTimer();
        }, 1000);
    }

    /*-- Timer6 Js --*/
    var timer6 = $(".timer_6");
    if (timer6.length) {
        function makeTimer() {
            var endTime = new Date("aug 20, 2023 11:35:47");
            var endTime = Date.parse(endTime) / 1000;
            var now = new Date();
            var now = Date.parse(now) / 1000;
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - days * 86400) / 3600);
            var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
            var seconds = Math.floor(timeLeft - days * 86400 - hours * 3600 - minutes * 60);
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $(".timer_6 .days").html(days + "<span>D</span>");
            $(".timer_6 .hours").html(hours + "<span>H</span>");
            $(".timer_6 .minutes").html(minutes + "<span>M</span>");
            $(".timer_6 .seconds").html(seconds + "<span>S</span>");
        }
        setInterval(function () {
            makeTimer();
        }, 1000);
    }

    /*-- Timer7 Js --*/
    var timer7 = $(".timer_7");
    if (timer7.length) {
        function makeTimer() {
            var endTime = new Date("jul 20, 2023 10:15:13");
            var endTime = Date.parse(endTime) / 1000;
            var now = new Date();
            var now = Date.parse(now) / 1000;
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - days * 86400) / 3600);
            var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
            var seconds = Math.floor(timeLeft - days * 86400 - hours * 3600 - minutes * 60);
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $(".timer_7 .hours").html(hours + "<span>H</span>");
            $(".timer_7 .minutes").html(minutes + "<span>M</span>");
            $(".timer_7 .seconds").html(seconds + "<span>S</span>");
        }
        setInterval(function () {
            makeTimer();
        }, 1000);
    }

    /*-- Timer8 Js --*/
    var timer8 = $(".timer_8");
    if (timer8.length) {
        function makeTimer() {
            var endTime = new Date("aug 18, 2023 01:15:13");
            var endTime = Date.parse(endTime) / 1000;
            var now = new Date();
            var now = Date.parse(now) / 1000;
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - days * 86400) / 3600);
            var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
            var seconds = Math.floor(timeLeft - days * 86400 - hours * 3600 - minutes * 60);
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $(".timer_8 .hours").html(hours + "<span>H</span>");
            $(".timer_8 .minutes").html(minutes + "<span>M</span>");
            $(".timer_8 .seconds").html(seconds + "<span>S</span>");
        }
        setInterval(function () {
            makeTimer();
        }, 1000);
    }
    /*-- addActive --*/
    var addActive = $("#addActive");
    if (addActive.length) {
        var header = document.getElementById("addActive");
        var btns = header.getElementsByClassName("active-btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    }
    /*-- creatorsAddActive --*/
    var creatorsAddActive = $("#creatorsAddActive");
    if (creatorsAddActive.length) {
        var header = document.getElementById("creatorsAddActive");
        var btns = header.getElementsByClassName("creators-card-btns");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    }

    /*-- discoverFilterCollapsible --*/
    var discoverFilterCollapsible = $(".discover-filter-collaps");
    if (discoverFilterCollapsible.length) {
        var coll = document.getElementsByClassName("discoverFilterCollapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    }

    /*-- testimonial-slider js --*/
    var testimonialSlider = $(".testimonial-slider");
    if (testimonialSlider.length) {
        $(".testimonial-slider").slick({
            dots: true,
            infinite: true,
            arrows: false,
            touchMove: true,
            pauseOnHover: false,
            pauseOnFocus: false,
            autoplay: true,
            loop: true,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1800,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 1440,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    }
    /*-- chatbot-customers-suport-sectoin end --*/

    /*-- App Chose us Js Start --*/
    var appChoseUsContent = $(".app-chose-us-content");
    if (appChoseUsContent.length) {
        $(".app-chose-us-card").hover(function () {
            $(".app-chose-title-defult").removeClass("active");
        });
        $(".app-chose-us-card1").hover(function () {
            $(".app-chose-title1").addClass("active");
            $(".app-chose-title2, .app-chose-title3, .app-chose-title4").removeClass("active");
        });
        $(".app-chose-us-card2").hover(function () {
            $(".app-chose-title2").addClass("active");
            $(".app-chose-title1, .app-chose-title3, .app-chose-title4").removeClass("active");
        });
        $(".app-chose-us-card3").hover(function () {
            $(".app-chose-title3").addClass("active");
            $(".app-chose-title1, .app-chose-title2, .app-chose-title4").removeClass("active");
        });
        $(".app-chose-us-card4").hover(function () {
            $(".app-chose-title4").addClass("active");
            $(".app-chose-title1, .app-chose-title2, .app-chose-title3").removeClass("active");
        });

        $(document).mousemove(function () {
            var appChoseUsContent = $(".app-chose-us-content .row");
            if (!appChoseUsContent.is(event.target) && !appChoseUsContent.has(event.target).length) {
                $(".app-chose-title1, .app-chose-title2, .app-chose-title3, .app-chose-title4").removeClass("active");
                $(".app-chose-title-defult").addClass("active");
            }
        });
    }
    /*-- App Chose us Js End --*/

    /*-- app-banner-img-scroll-effect-js start --*/
    var benefitsCardImg = $(".app-benefits-card-img");
    if (benefitsCardImg.length) {
        $(window).on("scroll", function () {
            var CardImage = $(".app-benefits-card-img img");
            var y = window.scrollY;
            var x;
            x = CardImage.offset().top;
            x = x - 400;

            let animationValue = 0;
            animationValue = (y - x) / 2;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            CardImage.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- app-banner-img-scroll-effect-js End --*/

    /*-- appBanneImg js start --*/
    var appBanneImg = $(".app-landing-banner-img");
    if (appBanneImg.length) {
        $(window).on("scroll", function () {
            var bannerImg = $(".app-landing-banner-img img");
            var y = window.scrollY;
            var x;
            x = bannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 4;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            bannerImg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- appBanneImg js End --*/

    /*-- App Features section start --*/
    var appFeaturesAard = $(".app-useful-features-card");
    if (appFeaturesAard.length) {
        appFeaturesAard.on("mousemove", function (e) {
            var x = e.screenX + "px";
            var y = e.screenY + "px";

            $(".app-useful-features-card:hover .card-glow").css({
                left: x,
                top: y,
            });
        });
    }
    /*-- App Features section End --*/

    /*-- Convert Visitors slider start --*/
    var appConvertVisitorsSection = $(".app-convert-visitors-section");
    if (appConvertVisitorsSection.length) {
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            slidesPerView: 1,
            mousewheel: false,
            effect: "fade",
            speed: 300,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    }
    /*-- Convert Visitors slider end --*/

    var powerfulEmailactive = $(".powerful-email-content");
    if (powerfulEmailactive.length) {
        let totalItems, i;
        totalItems = powerfulEmailactive.find(".email-collaps-item");
        $(window).on("scroll", function () {
            for (i = 1; i < totalItems.length; i++) {
                if ($(`.email-collaps-item${i}`).hasClass("active")) {
                    $(`.email-collaps-img${i}`).addClass("active").siblings().removeClass("active");
                }
            }
        });
    }
    /*--  Side Bar Sticky js End --*/

    /*-- crypto-banner-img-scroll-effect-js start --*/
    var bannerMobileImg = $(".mobile-img");
    if (bannerMobileImg.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".mobile-img");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 4;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- crypto-banner-img-scroll-effect-js End --*/
    /*-- crypto-banner-img-scroll-effect-js start --*/
    var bannerGrad = $(".banner-grad");
    if (bannerGrad.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".banner-grad");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 4;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- crypto-banner-img-scroll-effect-js End --*/

    /*-- crypto-banner-img-scroll-effect-js start --*/
    var letsTalkImg = $(".lets-talk-img");
    if (letsTalkImg.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".lets-talk-img img");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 4;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- crypto-banner-img-scroll-effect-js End --*/

    /*-- mobile slider js start --*/
    var mobileSlider = $(".mobile-slider");
    if (mobileSlider.length) {
        $(".mobile-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false,
            dots: false,
        });
    }
    /*-- mobile slider js end --*/

    /*-- Feedback Js start --*/
    var feedbacksSection = $(".feedbacks-section");
    if (feedbacksSection.length) {
        $(".feedback-stop-btn").on("click", function () {
            $(".feedback-stop-btn").toggleClass("active");
            $(".feedback-card-list").toggleClass("active");
        });
    }
    /*-- Feedback Js End --*/

    /*-- corporate service slider js start --*/
    var corporateServicelsSlider = $(".corporate-servicels-slider");
    if (corporateServicelsSlider.length) {
        $(".corporate-servicels-slider").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false,
            dots: false,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        arrows: false,
                        dots: true,
                        autoplay: true,
                        autoplaySpeed: 3000,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    }
    /*-- corporate service slider js end --*/
    /*-- corporate testimonial slider js start --*/
    var corporateTestiminialsSlider = $(".corporate-testiminials-slider");
    if (corporateTestiminialsSlider.length) {
        $(".corporate-testiminials-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false,
            dots: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        arrows: false,
                        dots: true,
                    },
                },
            ],
        });
    }
    /*-- corporate testimonial slider js end --*/

    /*-- whyChoseSlider js start --*/
    var whyChoseSlider = $(".why-chose-slider");
    if (whyChoseSlider.length) {
        $(".why-chose-slider").slick({
            centerMode: true,
            centerPadding: "15%",
            slidesToShow: 1,
            arrows: false,
            dots: false,
            autoplay: true,
            autoplaySpeed: 3000,
            asNavFor: ".why-chose-slider-nav",
            pauseOnHover: false,
            pauseOnFocus: false,
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        centerPadding: "10%",
                        arrows: false,
                    },
                    breakpoint: 1200,
                    settings: {
                        centerMode: false,
                        arrows: false,
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }
    /*-- whyChoseSlider js End --*/

    /*-- whyChoseSliderNav js start --*/
    var whyChoseSliderNav = $(".why-chose-slider-nav");
    if (whyChoseSliderNav.length) {
        $(".why-chose-slider-nav").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            asNavFor: ".why-chose-slider",
            dots: false,
            pauseOnHover: false,
            pauseOnFocus: false,
            centerMode: false,
            focusOnSelect: true,
        });
    }
    /*-- whyChoseSliderNav js End --*/

    /*-- up ball-scroll-effect-js start --*/
    var upBall = $(".safe-platform-ball1");
    if (upBall.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".safe-platform-ball1");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 8;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- up ball-scroll-effect-js End --*/

    /*-- up ball-scroll-effect-js start --*/
    var downBall = $(".safe-platform-ball2");
    if (downBall.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".safe-platform-ball2");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 8;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- up ball-scroll-effect-js End --*/

    /*-- our-partners-scroll-effect-js start --*/
    var partnersLogosLeft = $(".our-partners-list-left");
    if (partnersLogosLeft.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".our-partners-list-left");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 8;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateX(${animationValue}px)`);
        });
    }
    /*-- our-partners-scroll-effect-js End --*/

    /*-- our-partners-scroll-effect-js start --*/
    var partnersLogosRight = $(".our-partners-list-right");
    if (partnersLogosRight.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".our-partners-list-right");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 8;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateX(${animationValue}px)`);
        });
    }
    /*-- our-partners-scroll-effect-js End --*/

    /*-- up ball-scroll-effect-js start --*/
    var weavImg = $(".benifits-card-img-section");
    if (weavImg.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".weav-img");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 2;

            let animationStop = 160;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateX(${animationValue}px)`);
        });
    }
    /*-- up ball-scroll-effect-js End --*/

    /*-- scroll-text-effect-js start --*/
    var scrollText = $(".scroll-text-list");
    if (scrollText.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".scroll-text-list");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 800;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 2;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateX(${animationValue}px)`);
        });
    }
    /*-- scroll-text-effect-js End --*/

    /*-- scroll-text-effect-js start --*/
    var footerText = $(".token-footer-bottom-text .text .top");
    if (footerText.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".token-footer-bottom-text .text .top");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 800;

            let animationValue = 1;
            animationValue = (y - x) / 2;

            let animationStop = 0;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("top", `${animationValue}px`);
        });
    }
    /*-- scroll-text-effect-js End --*/

    /*-- sass-banner-img-scroll-effect-js start --*/
    var sassBannerImg = $(".sass-banner-img");
    if (sassBannerImg.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".sass-banner-img .banner-img");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 4;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    var sassBannerImg = $(".sass-banner-img");
    if (sassBannerImg.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".sass-banner-img .shape2");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 3;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    var sassBannerShape = $(".sass-landing-banner-shapes");
    if (sassBannerShape.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".sass-landing-banner-shapes .shape1");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 15;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    var sassBannerShape = $(".sass-landing-banner-shapes");
    if (sassBannerShape.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".sass-landing-banner-shapes .shape5");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 6;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- sass-banner-img-scroll-effect-js End --*/

    /*-- sass video js start --*/
    var sassVideoShape = $(".sass-video-container .shape1");
    if (sassVideoShape.length) {
        $(window).on("scroll", function () {
            var SassVideoShape1 = $(".sass-video-container .shape1");
            var y = window.scrollY;
            var x;
            x = SassVideoShape1.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 15;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            SassVideoShape1.css("transform", `translateY(${animationValue}px)`);
        });
    }
    var sassVideoShape2 = $(".sass-video-container .shape4");
    if (sassVideoShape2.length) {
        $(window).on("scroll", function () {
            var SassVideoShape2 = $(".sass-video-container .shape4");
            var y = window.scrollY;
            var x;
            x = SassVideoShape2.offset().top;
            x = x - 200;

            let animationValue = 10;
            animationValue = (-1 * (y - x)) / 15;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            SassVideoShape2.css("transform", `translateY(${animationValue}px)`);
        });
    }

    var seamlessShape = $(".seamless-shape");
    if (seamlessShape.length) {
        $(window).on("scroll", function () {
            var seamlessShapeImg = $(".seamless-shape");
            var y = window.scrollY;
            var x;
            x = seamlessShapeImg.offset().top;
            x = x - 200;

            let animationValue = 10;
            animationValue = (-1 * (y - x)) / 12;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            seamlessShapeImg.css("transform", `translateY(${animationValue}px)`);
        });
    }

    /*-- sass video js end --*/

    var demeShape = $(".sass-demo-shapes .shape4");
    if (demeShape.length) {
        $(window).on("scroll", function () {
            var demeShape = $(".sass-demo-shapes .shape4");
            var y = window.scrollY;
            var x;
            x = demeShape.offset().top;
            x = x - 400;

            let animationValue = 10;
            animationValue = (y - x) / 2;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            demeShape.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- up card-scroll-effect-js End --*/

    /*-- up card-scroll-effect-js start --*/
    var upCardBg = $(".seamless-card .card-bg");
    if (upCardBg.length) {
        $(window).on("scroll", function () {
            var cryptoBannerImg = $(".seamless-card .card-bg");
            var y = window.scrollY;
            var x;
            x = cryptoBannerImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 6;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cryptoBannerImg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- up card-scroll-effect-js End --*/

    /*-- up card-scroll-effect-js start --*/
    var corporateBannerBg = $(".corporate-banner-bg");
    if (corporateBannerBg.length) {
        $(window).on("scroll", function () {
            var corporateBannerBg = $(".corporate-banner-bg");
            var y = window.scrollY;
            var x;
            x = corporateBannerBg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 6;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            corporateBannerBg.css("transform", `translateY(${animationValue}px)`);
        });
    }
    var corporatetestimonialBg = $(".corporate-testimonial-bg");
    if (corporatetestimonialBg.length) {
        $(window).on("scroll", function () {
            var corporateTestimonialBg = $(".corporate-testimonial-bg");
            var y = window.scrollY;
            var x;
            x = corporateTestimonialBg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 6;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            corporateTestimonialBg.css("transform", `translateY(${animationValue}px)`);
        });
    }

    var choseUsImg1 = $(".chose-us-small-img");
    if (choseUsImg1.length) {
        $(window).on("scroll", function () {
            var choseUsImg1 = $(".chose-us-small-img img");
            var y = window.scrollY;
            var x;
            x = choseUsImg1.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 10;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            choseUsImg1.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- up card-scroll-effect-js End --*/

    /*-- defi-safe-platform-img-scroll-effect-js start --*/
    var defiSafePlatformImg = $(".defi-safe-platform-img img");
    if (defiSafePlatformImg.length) {
        $(window).on("scroll", function () {
            var defiSafePlatformImg = $(".defi-safe-platform-img img");
            var y = window.scrollY;
            var x;
            x = defiSafePlatformImg.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 4;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue = 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            defiSafePlatformImg.css("transform", `translateY(${animationValue}px)`);
        });
    }

    var metavarseCardBg2 = $(".metavarse-card-bg2");
    if (metavarseCardBg2.length) {
        $(window).on("scroll", function () {
            var metavarseCardBg2 = $(".metavarse-card-bg2");
            var y = window.scrollY;
            var x;
            x = metavarseCardBg2.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 9;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            metavarseCardBg2.css("transform", `translateY(${animationValue}px)`);
        });
    }

    var metavarseCarBg3 = $(".metavarse-card-bg3");
    if (metavarseCarBg3.length) {
        $(window).on("scroll", function () {
            var metavarseCarBg3 = $(".metavarse-card-bg3");
            var y = window.scrollY;
            var x;
            x = metavarseCarBg3.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 9;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            metavarseCarBg3.css("transform", `translateY(${animationValue}px)`);
        });
    }

    var galaxy = $(".galaxy1");
    if (galaxy.length) {
        $(window).on("scroll", function () {
            var galaxy = $(".galaxy1");
            var y = window.scrollY;
            var x;
            x = galaxy.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 6;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            galaxy.css("transform", `translateY(${animationValue}px)`);
        });
    }

    var rocket = $(".rocket");
    if (rocket.length) {
        $(window).on("scroll", function () {
            var rocket = $(".rocket");
            var y = window.scrollY;
            var x;
            x = rocket.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 6;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            rocket.css("transform", `translateY(${animationValue}px)`);
        });
    }
    /*-- defi-safe-platform-img-scroll-effect-js End --*/

    /*-- eco system js --*/
    var cloud3 = $(".cloud3");
    if (cloud3.length) {
        $(window).on("scroll", function () {
            var cloud3 = $(".cloud3");
            var y = window.scrollY;
            var x;
            x = cloud3.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (-1 * (y - x)) / 9;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cloud3.css("transform", `translateX(${animationValue}px)`);
        });
    }

    var cloud2 = $(".cloud2");
    if (cloud2.length) {
        $(window).on("scroll", function () {
            var cloud2 = $(".cloud2");
            var y = window.scrollY;
            var x;
            x = cloud2.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 9;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            cloud2.css("transform", `translateX(${animationValue}px)`);
        });
    }
    var globe = $(".globe");
    if (globe.length) {
        $(window).on("scroll", function () {
            var globe = $(".globe");
            var y = window.scrollY;
            var x;
            x = globe.offset().top;
            x = x - 400;

            let animationValue = 1;
            animationValue = (y - x) / 9;

            let animationStop = 100;

            if (animationValue < 0) {
                animationValue > 0;
            }

            if (animationValue > animationStop) {
                animationValue = animationStop;
            }

            globe.css("transform", `rotate(${animationValue}deg)`);
        });
    }

    /*-- btn hover effect js start --*/
    var partnersLogo = $(".partners-logo");
    if (partnersLogo.length) {
        let button = document.querySelectorAll(".partners-logo");
        button.forEach((item) => {
            let roundItem = item.querySelector(".round");

            item.addEventListener("mouseenter", () => {
                item.classList.add("animate");

                let buttonX = event.offsetX;
                let buttonY = event.offsetY;

                if (buttonY < 105) {
                    roundItem.style.top = 0 + "px";
                } else if (buttonY > 30) {
                    roundItem.style.top = 210 + "px";
                }

                roundItem.style.left = buttonX + "px";
                roundItem.style.width = "1px";
                roundItem.style.height = "1px";
            });
            item.addEventListener("mouseleave", () => {
                item.classList.remove("animate");

                let buttonX = event.offsetX;
                let buttonY = event.offsetY;

                if (buttonY < 105) {
                    roundItem.style.top = 0 + "px";
                } else if (buttonY > 30) {
                    roundItem.style.top = 210 + "px";
                }
                roundItem.style.left = buttonX + "px";
            });
        });
    }

    var btnEffect = $(".btn-hov-effect");
    if (btnEffect.length) {
        let button = document.querySelectorAll(".btn-hov-effect");
        button.forEach((item) => {
            let roundItem = item.querySelector(".round-shape");

            item.addEventListener("mouseenter", () => {
                item.classList.add("animate");

                let buttonX = event.offsetX;
                let buttonY = event.offsetY;

                if (buttonY < 105) {
                    roundItem.style.top = 0 + "px";
                } else if (buttonY > 30) {
                    roundItem.style.top = 210 + "px";
                }

                roundItem.style.left = buttonX + "px";
                roundItem.style.width = "1px";
                roundItem.style.height = "1px";
            });
            item.addEventListener("mouseleave", () => {
                item.classList.remove("animate");

                let buttonX = event.offsetX;
                let buttonY = event.offsetY;

                if (buttonY < 105) {
                    roundItem.style.top = 0 + "px";
                } else if (buttonY > 30) {
                    roundItem.style.top = 210 + "px";
                }
                roundItem.style.left = buttonX + "px";
            });
        });
    }
    /*-- btn hover effect js end --*/

    /*- move img js start --*/
    var moveImg = $(".move-img");
    if (moveImg.length) {
        $(document).mousemove(function (e) {
            $(".move-img").offset({
                left: e.pageX,
            });
        });
    }
    var docImg = $(".doc-img");
    if (docImg.length) {
        $(document).mousemove(function (e) {
            $(".doc-img").offset({
                left: e.pageX,
            });
        });
    }
    /*- move img js end --*/

    /*-- splting js start --*/
    Splitting();
    ScrollOut({
        targets: "[data-splitting]",
    });
    /*-- splting js end --*/

    var gridfilter = $(".grid");
    if (gridfilter.length) {
        $(".grid").imagesLoaded(function () {
            $(".gridFilter").on("click", "button", function () {
                var filterValue = $(this).attr("data-filter");
                $grid.isotope({
                    filter: filterValue,
                });
            });
            var $grid = $(".grid").isotope({
                itemSelector: ".grid-item",
                percentPosition: true,
                masonry: {
                    columnWidth: ".grid-item",
                },
            });
        });
    }

    if ($(".gridFilter button").length) {
        var projectfiler = $(".gridFilter button");
        if (projectfiler.length) {
            $(".gridFilter button").on("click", function (event) {
                $(this).siblings(".active").removeClass("active");
                $(this).addClass("active");
                event.preventDefault();
            });
        }
    }

    /*-- Mega menu scripts start --*/
    var homeNav = $(".home-nav");
    if (homeNav.length) {
        megaTabLinks = document.querySelectorAll(".megaTablinks");
        megaMenuTab = document.querySelector(".mega-menu-tabcontent");
        megaMenuTabContent = document.querySelectorAll(".megaMenutabcontent");

        function allDisplayNone() {
            megaMenuTabContent.forEach((item, i) => {
                item.style.display = "none";
            });
        }

        function onlyDisplayBlock(idName) {
            let item = megaMenuTab.querySelector(`#${idName}`);
            item.style.display = "block";
        }

        function defaultDisplay() {
            let item = megaMenuTab.querySelector("#primaryText");
            item.style.display = "block";
        }

        megaTabLinks.forEach((item, i) => {
            let menuData = item.getAttribute("data-menu");
            item.addEventListener("mouseover", () => {
                item.classList.add("menuTabActive");
                allDisplayNone();
                onlyDisplayBlock(menuData);
            });
            item.addEventListener("mouseout", () => {
                item.classList.remove("menuTabActive");
                allDisplayNone();
                defaultDisplay();
            });
        });
    }
    /*-- Mega menu scripts end --*/

    /*-- defi-counter js start --*/
    var defiStatistic = $(".defi-statistic-section");
    if (defiStatistic.length) {
        $(".defi-counter-1").rollNumber({
            number: 289,
            speed: 1000,
            interval: 200,
            symbol: ",",
            fontStyle: {},
        });

        $(".defi-counter-2").rollNumber({
            number: 563,
            speed: 1000,
            interval: 200,
            fontStyle: {},
        });

        $(".defi-counter-3").rollNumber({
            number: 2.6,
            speed: 1000,
            interval: 200,
            fontStyle: {},
        });

        $(".defi-counter-4").rollNumber({
            number: 940,
            speed: 1000,
            interval: 200,
            fontStyle: {},
        });
    }
    /*-- defi-counter js End --*/

    /*-- crypto-token-banner--counter js start --*/
    var cryptoBannerCoounter = $(".crypto-token-banner-card-section");
    if (cryptoBannerCoounter.length) {
        $(".data-1").rollNumber({
            number: 55695693,
            speed: 1000,
            interval: 200,
            symbol: ",",
            fontStyle: {},
        });

        $(".data-2").rollNumber({
            number: 5.03,
            speed: 1000,
            interval: 200,
            fontStyle: {},
        });

        $(".data-3").rollNumber({
            number: 24,
            speed: 1000,
            interval: 200,
            fontStyle: {},
        });

        $(".data-4").rollNumber({
            number: 49,
            speed: 1000,
            interval: 200,
            fontStyle: {},
        });
    }
    /*-- defi-counter js End --*/

    /*-- defi-counter js start --*/
    var tokenomicsCounter = $(".tokenomics-progress");
    if (tokenomicsCounter.length) {
        $(".tokenomics-1").rollNumber({
            number: 46,
            speed: 1000,
            interval: 200,
            symbol: ",",
            fontStyle: {},
        });

        $(".tokenomics-2").rollNumber({
            number: 34,
            speed: 1000,
            interval: 200,
            fontStyle: {},
        });

        $(".tokenomics-3").rollNumber({
            number: 12,
            speed: 1000,
            interval: 200,
            fontStyle: {},
        });

        $(".tokenomics-4").rollNumber({
            number: 8,
            speed: 1000,
            interval: 200,
            fontStyle: {},
        });
    }
    /*-- defi-counter js End --*/
})(jQuery);

/*-- creatorsCollectorsTab --*/
var newsletterTestmonialTab = $(".newsletter-testmonial-section");
if (newsletterTestmonialTab.length) {
    function openTab(evt, tanName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("testmonialTabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("testmonialTablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tanName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpentesTmonialTab").click();
}

/*-- itemDetailsTab --*/
var itemDetailsTab = $(".item-details-tab-section");
if (itemDetailsTab.length) {
    function openTab(evt, TabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("item-details-tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("item-details-tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(TabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("itemDetailsTabOpen").click();
}

/*-- creatorsCollectorsTab --*/
var creatorsCollectorsTab = $(".creators-details-tab-section");
if (creatorsCollectorsTab.length) {
    function openTab(evt, TabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("creators-collectors-tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("creators-collectors-tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(TabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("creatorsCollectorsTabOpen").click();
}
