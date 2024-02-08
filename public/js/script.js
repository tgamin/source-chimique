document.addEventListener("DOMContentLoaded", () => {
    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            document.querySelector(".page-header").classList.add("active");
            document.querySelectorAll(".header-link").forEach(function (link) {
                link.style.color = "#312783";
            });
            document.querySelector(".logo").src = "/img/logo-color.png";
            document.querySelector(".logo").style.width = "40%";
        } else {
            document.querySelector(".page-header").classList.remove("active");
            document
                .querySelector(".page-header")
                .classList.remove("active-link");
            document.querySelector(".logo").src = "/img/logo-mono.png";
            document.querySelector(".logo").style.width = "65%";
            document.querySelectorAll(".header-link").forEach(function (link) {
                link.style.color = "";
            });
        }
    });
});

$(".actualites-carousel").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: "<button type='button' class='slick-prev slick-arrow'></button>",
    nextArrow: "<button type='button' class='slick-next slick-arrow'></button>",
});



if ($(".brand-slider").length) {
    $(".brand-slider").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 5000,
        pauseOnHover: false,
        pauseOnFocus: false,
        cssEase: "linear",
        arrows: false,
        // variableWidth: true,
        // centerPadding: '30px',
        centerMode: true,
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 6,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 5,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                },
            },
        ],
    });
}


new PureCounter();
