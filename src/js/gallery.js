var mixer =mixitup ('#Container');
    $('ul.filter-wrap > li').on('click', function(e){

        e.preventDefault();

        var filter = $(this).attr('data-filter');

        $('ul.filter-wrap > li').removeClass('active-filtre');
        $(this).addClass('active-filtre');


    });