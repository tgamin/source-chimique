document.addEventListener("DOMContentLoaded", function () {
    // Check if it's the home page
    if (
        window.location.pathname === "/fr" ||
        window.location.pathname === "/ar" ||
        window.location.pathname === "/en"
    ) {
        document.querySelector(".logo").src = "/img/logo-mono.png";
        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                document.querySelector(".page-header").classList.add("active");
                document
                    .querySelectorAll(".header-link")
                    .forEach(function (link) {
                        link.style.color = "#312783";
                    });
                document.querySelector(".logo").src = "/img/logo-color.png";
                document.querySelector(".logo").style.width = "40%";
                document.querySelector(".header-top").style.display = "none";
                document.querySelector(".header-top").classList.remove("d-flex");
                document.querySelector(".navbar").classList.remove("navbar-dark");

            } else {
                document.querySelector(".header-top").classList.add("d-flex");
                document.querySelector(".navbar").classList.add("navbar-dark");

                document
                    .querySelector(".page-header")
                    .classList.remove("active");
                document
                    .querySelector(".page-header")
                    .classList.remove("active-link");
                document.querySelector(".logo").src = "/img/logo-mono.png";
                document.querySelector(".logo").style.width = "65%";
                document
                    .querySelectorAll(".header-link")
                    .forEach(function (link) {
                        link.style.color = "";
                    });
                document.querySelector(".header-top").style.display = "block";
            }
        });
    } else {
        document.querySelector(".header-top").style.display = "none";
        document.querySelector(".header-top").classList.add("d-none");
        document.querySelector(".navbar").classList.remove("navbar-dark");
        
        document.querySelector(".page-header").classList.add("active");
        document.querySelector(".logo").src = "/img/logo-color.png";
        document.querySelectorAll(".header-link").forEach(function (link) {
            link.style.color = "#312783";
        });
        document.querySelector(".logo").style.width = "40%";
        document.querySelector(".side-lang").style.display = "block";
    }
});

$(".actualites-carousel").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: "<button type='button' class='slick-prev slick-arrow'></button>",
    nextArrow: "<button type='button' class='slick-next slick-arrow'></button>",
    responsive: [
        {
            breakpoint: 1000,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});

if ($(".brand-slider").length) {
    $(".brand-slider").slick({
        infinite: true,
        slidesToShow: 5,
        draggable: false,
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
                breakpoint: 972,
                settings: {
                    slidesToShow: 5,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });
}
