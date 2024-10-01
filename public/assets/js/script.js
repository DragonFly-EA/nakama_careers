$(document).ready(function () {
    document.addEventListener('scroll', function () {
        const header = document.querySelector('.desktop-navigation');
        const logo = document.getElementById('logo');
        if (window.scrollY > 50) { // Adjust scroll position as needed
            header.classList.add('scrolled');
            logo.src = '../images/scrolled-logo.png';
        } else {
            header.classList.remove('scrolled');
            logo.src = '../images/logo.png';
        }
    });


    $('.upcoming-fixtures-slider').slick({
        slidesToShow: 3, // Number of slides to show at once
        slidesToScroll: 1, // Number of slides to scroll at a time
        dots: false, // Show dots navigation
        arrows: true, // Show arrows navigation
        prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-arrow-left-long"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-arrow-right-long"></i></button>',
        // Add more options as needed
        responsive: [
            {
                breakpoint: 1468,
                settings: {
                    slidesToShow: 1
                }
            }
        ],
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    $('.select').niceSelect();
});
$(document).ready(function () {
    $('.latest-news-slider').slick({
        slidesToShow: 3, // Number of slides to show at once
        slidesToScroll: 1, // Number of slides to scroll at a time
        dots: false, // Show dots navigation
        arrows: true, // Show arrows navigation
        prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-arrow-left-long"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-arrow-right-long"></i></button>',
        // Add more options as needed
        responsive: [
            {
                breakpoint: 1468,
                settings: {
                    slidesToShow: 1
                }
            }
        ],
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});

$(document).ready(function () {
    // $("#matches-link").click(function (event) {
    //     event.preventDefault(); // Prevents the default action
    //     $(".matches-submenu").slideToggle();
    //     $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
    // });
});

$(document).ready(function () {
    $(".mobile-menu-icon.fa-bars").click(function () {
        $(".hidden-mobile").slideDown();
    });

    $(".mobile-menu-icon.fa-times").click(function () {
        $(".hidden-mobile").slideUp();
    });
    $(".mobile-droplist1").click(function () {
        $(".mobile-dropdown1").slideToggle();
    });
    $(".mobile-droplist2").click(function () {
        $(".mobile-dropdown2").slideToggle();
    });
    $(".mobile-droplist3").click(function () {
        $(".mobile-dropdown3").slideToggle();
    });
    $(".mobile-droplist4").click(function () {
        $(".mobile-dropdown4").slideToggle();
    });
    $('.mobile-droplist1').on('click', function (e) {
        $('.mobile-droplist1 a i').toggleClass("fa-chevron-down fa-chevron-up"); //you can list several class names
        e.preventDefault();
    });
    $('.mobile-droplist2').on('click', function (e) {
        $('.mobile-droplist2 a i').toggleClass("fa-chevron-down fa-chevron-up"); //you can list several class names
        e.preventDefault();
    });
    $('.mobile-droplist3').on('click', function (e) {
        $('.mobile-droplist3 a i').toggleClass("fa-chevron-down fa-chevron-up"); //you can list several class names
        e.preventDefault();
    });
    $('.mobile-droplist4').on('click', function (e) {
        $('.mobile-droplist4 a i').toggleClass("fa-chevron-down fa-chevron-up"); //you can list several class names
        e.preventDefault();
    });
    $('.mobile-dropdown li a').click(function (e) {
        // Prevent the default link behavior
        e.preventDefault();

        // Get the href attribute of the clicked link
        var pageUrl = $(this).attr('href');

        // Redirect to the page
        window.location.href = pageUrl;
    });
});
$(document).ready(function () {
    $(".view-stats:gt(1)").hide();

    // Add a click event handler to the "View All Our Services" element
    $(".view-all").click(function () {
        // Toggle the visibility of the hidden list items
        $(".view-stats:gt(2)").toggle();
        $('.view-all').text() === 'View All' ? $('.view-all').text('View Less') : $('.view-all').text('View All');
    });
});
