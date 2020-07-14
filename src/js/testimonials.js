(function ($) {
$(window).on('load', function () {

    if ($('.thm__owl-carousel').length) {
        $('.thm__owl-carousel').each(function () {
            var Self = $(this);
            var carouselOptions = Self.data('options');
            var carouselPrevSelector = Self.data('carousel-prev-btn');
            var carouselNextSelector = Self.data('carousel-next-btn');
            var thmCarousel = Self.owlCarousel(carouselOptions);
            if (carouselPrevSelector !== undefined) {
                $(carouselPrevSelector).on('click', function () {
                    thmCarousel.trigger('prev.owl.carousel');
                    return false;
                });
            }
            if (carouselNextSelector !== undefined) {
                $(carouselNextSelector).on('click', function () {
                    thmCarousel.trigger('next.owl.carousel');
                    return false;
                });
            }
        });
    }
});
})(jQuery);


