(function( $ ) {
    "use strict";
    
    $('.woocommerce-form-coupon-toggle .showcoupon').on("click", function(){
        $(this).toggleClass( "active" );
        if ($(this).hasClass( "active" )) {
            $('.woocommerce-form-coupon').stop(true, true).slideDown();
        }else{
            $('.woocommerce-form-coupon').stop(true, true).slideUp();
        }
    });
    /* ========================================== 
	Sticky Header 1
	========================================== */
	$(window).on("scroll", function(){
		if ( $( '#site-header' ).hasClass( "sticky-header" ) ) {
			var site_header = $('#site-header').outerHeight() + 30;	
			
		    if ($(window).scrollTop() >= site_header) {	    	
		        $('.sticky-header .octf-main-header, .mobile-header-sticky .header_mobile').addClass('is-stuck');	        
		    }else {
		        $('.sticky-header .octf-main-header, .mobile-header-sticky .header_mobile').removeClass('is-stuck');		              
		    }
		}
	});

    /* ========================================== 
    Search on Header
    ========================================== */
    $('.toggle_search').on("click", function(){
        $(this).toggleClass( "active" );
        $('.h-search-form-field').toggleClass('show');
        if ($(this).find('i').hasClass( "flaticon-search" )) {
            $('.toggle_search > i').removeClass( "flaticon-search" ).addClass("flaticon-close");
        }else{
            $('.toggle_search > i').removeClass( "flaticon-close" ).addClass("flaticon-search");
        }
        $('.h-search-form-inner > form > input.search-field').focus();
    });

    /* ========================================== 
    Back To Top
    ========================================== */
    if ($('#back-to-top').length) {
        var scrollTrigger = 500, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        }); 
    }

    /* Counter */
    $(window).on('scroll', function() {
        $('.ot-counter').each(function() {
            var pos_y   = $(this).offset().top - window.innerHeight;
            var $this   = $(this).find('span.num'),
                countTo = $this.attr('data-to'),
                during  = parseInt( $this.attr('data-time') ),
                topOfWindow = $(window).scrollTop();

            if ( pos_y < topOfWindow ) {    
                $({
                    countNum: $this.text()
                }).animate({
                    countNum: countTo
                },
                {
                    duration: during,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
            }
        });

        $('.ot-counter2').each(function() {
            var pos_y   = $(this).offset().top - window.innerHeight;
            var $this   = $(this).find('span.num'),
                countTo = $this.attr('data-to'),
                during  = parseInt( $this.attr('data-time') ),
                topOfWindow = $(window).scrollTop();

            if ( pos_y < topOfWindow ) {    
                $({
                    countNum: $this.text()
                }).animate({
                    countNum: countTo
                },
                {
                    duration: during,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
            }
        });
        
        $('.ot-progress').each(function() {
            var pos_y = $(this).offset().top;
            var value = $(this).find(".progress-bar").data('percent');
            var topOfWindow = $(window).scrollTop();
            if (pos_y < topOfWindow + 900) {
                $(this).find(".progress-bar").css({
                    'width': value
                }, "slow");
            }
        });

        $('.circle-progress').each(function() {
            var bar_color = $(this).data('color');
            var bar_hei   = $(this).data('height');
            var bar_size  = $(this).data('size');
            var pos_y = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            if (pos_y < topOfWindow + 900) {
                $(this).find('.inner-bar').easyPieChart({
                    barColor: bar_color,
                    trackColor: false,
                    scaleColor: false,
                    lineCap: 'square',
                    lineWidth: bar_hei,
                    size: bar_size,
                    animate: 1000,
                    onStart: $.noop,
                    onStop: $.noop,
                    easing: 'easeOutBounce',
                    onStep: function(from, to, percent) {
                        $(this.el).find('.percent').text(Math.round(percent)) + '%';
                    }
                });
            }
        });
    });


    $('.ot-accordions').each( function () {
        var allPanels = $(this).find('.acc-content');
        $(this).find('.acc-toggle').on( 'click', function(){

            var $this = $(this),
                $target = $this.next();

            if(!$target.hasClass('active')){
                allPanels.removeClass('active').slideUp(300);
                allPanels.parent().removeClass('current');
                $target.addClass('active').slideDown(300);
                $target.parent().addClass('current');
            }

            return false;
        });
        $(this).find('.acc-toggle:first').trigger('click');
    });


    $('.ot-tabs').each(function() {
        $(this).find('.tabs-heading li').first().addClass('current');
        $(this).find('.tab-content').first().addClass('current');
    });

    $('.tabs-heading li').on( 'click', function(){
        var tab_id = $(this).attr('data-tab');
        $(this).siblings().removeClass('current');
        $(this).parents('.ot-tabs').find('.tab-content').removeClass('current');
        $(this).addClass('current');
        $("#"+tab_id).addClass('current');
    });

    $('.message-box > i').on( 'click', function() {
        $(this).parent().fadeOut();
    });

    $('.ot-countdown').each( function() {
        var date   = $(this).data('date'),
            zone   = $(this).data('zone'),
            day    = $(this).data('day'),
            days   = $(this).data('days'),
            hour   = $(this).data('hour'),
            hours  = $(this).data('hours'),
            min    = $(this).data('min'),
            mins   = $(this).data('mins'),
            second = $(this).data('second'),
            seconds = $(this).data('seconds');
        $(this).countdown({
            date: date,
            offset: zone,
            day: day,
            days: days,
            hour: hour,
            hours: hours,
            minute: min,
            minutes: mins,
            second: second,
            seconds: seconds
        }, function () {
            alert('Done!');
        });
    });


    /*Popup Video*/
    var $video_play = $('.btn-play');
    if ($video_play.length > 0 ) {
        $video_play.magnificPopup({
            type: 'iframe',
            removalDelay: 160,
            preloader: true,
            fixedContentPos: true,
            callbacks: {
            beforeOpen: function() {
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = this.st.el.attr('data-effect');
                }
            },
        });
    }

    
    
    $(".link-image-action").magnificPopup({
        type: "image"
    });


    /*Portfolio Filter*/
    $(window).on("load", function () {
        if( $('#projects_grid').length > 0 ){
            var $container = $('#projects_grid'); 
            $container.isotope({ 
                itemSelector : '.project-item', 
                layoutMode : 'masonry'
            });

            var $optionSets = $('.project_filters'),
                $optionLinks = $optionSets.find('a');

            $optionLinks.click(function(){
                var $this = $(this);

                if ( $this.hasClass('selected') ) {
                    return false;
                }
                var $optionSet = $this.parents('.project_filters');
                    $optionSets.find('.selected').removeClass('selected');
                    $this.addClass('selected');

                var selector = $(this).attr('data-filter');
                    $container.isotope({ 
                        filter: selector 
                    });
                return false;
            });
        };    
    });


    
        // Initialize popup as usual
        $('.image-link').magnificPopup({ 
            type: 'image',
            mainClass: 'mfp-with-zoom', // this class is for CSS animation below

            zoom: {
                enabled: true, // By default it's false, so don't forget to enable it
                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function 

                // The "opener" function should return the element from which popup will be zoomed in
                // and to which popup will be scaled down
                // By defailt it looks for an image tag:
                opener: function(openerElement) {
                  // openerElement is the element on which popup was initialized, in this case its <a> tag
                  // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                  return openerElement.is('img') ? openerElement : openerElement.find('img');
                }        
            },
            image: {
                // options for image content type
                titleSrc: 'title'
            },
            gallery: {
                // options for gallery
                enabled: true
            },
        });// JavaScript Document

    /* --------------------------------------------------
    * Client logo
    * --------------------------------------------------*/
    $('.home-client-carousel').owlCarousel({
        loop:true,
        margin:80,
        autoplay:true,
        autoplayTimeout:3000,
        nav:false,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive:{
            0:{
                items:2
            },
            480:{
                items:3
            },          
            767:{
                items:4
            },
            1000:{
                items:6
            }
        }
    });
    
    /* --------------------------------------------------
    * project carousel
    * --------------------------------------------------*/

     $(".project-slider").owlCarousel({
        stagePadding: 365,
        nav:false,
        autoplay:true,
        autoplayTimeout:3000,
        dots: true,
        loop:true,
        navText: ['<i class="flaticon-back"></i>', '<i class="flaticon-right-arrow-1"></i>'],
        responsive:{
            1400:{
                stagePadding: 365,
                items:2
            },
            1200:{
                stagePadding: false,
                items:3
            },
            992:{
                stagePadding: false,
                items:2
            },
            767:{
                stagePadding: false,
                items:2
            },
            0:{
                stagePadding: false,
                items:1
            }
        }
     });

     $(".simple-slider").owlCarousel({
        nav:false,
        dots: true,
        loop:true,
        navText: ['<i class="flaticon-back"></i>', '<i class="flaticon-right-arrow-1"></i>'],
        responsive:{
            1000:{
                items:2
            },
            600:{
                items:2
            },
            0:{
                items:1
            }
        }
     });

     $('.single-product').owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        dots: false,
        callbacks: true,
        URLhashListener: true,
        autoplayHoverPause: true,
        startPosition: 'URLHash'
    });


    /*Gallery Post*/
    $(".gallery-post").owlCarousel({
        items:1,
        nav:true,
        dots: false,
        auto: true,
        loop:true,
        navText: ['<i class="flaticon-back"></i>', '<i class="flaticon-right-arrow-1"></i>'],
        responsive: []
    });

    /* --------------------------------------------------
    * Testimonial carousel
    * --------------------------------------------------*/
     $(".ot-testimonials-slider").owlCarousel({
        nav:true,
        dots: false,
        autoplay:true,
        autoplayTimeout:6000,
        loop:true,
        navText: ['<i class="flaticon-back"></i>', '<i class="flaticon-right-arrow-1"></i>'],
        responsive:{
            1000:{
                items:2
            },
            767:{
                nav:false,
                dots: true,
                items:2
            },
            0:{
                nav:false,
                dots: true,
                items:1
            }
        }
     });
    /* --------------------------------------------------
    * industis carousel
    * --------------------------------------------------*/

     $(".ot-industries-slider").owlCarousel({
        stagePadding: 365,
        items:2,
        nav:false,
        dots: true,
        loop:true,
        navText: ['<i class="flaticon-back"></i>', '<i class="flaticon-right-arrow-1"></i>'],
        responsive:{
            1600:{
                stagePadding: 365,
                items:2
            },
            1200:{
                stagePadding: 200,
                items:2
            },
            992:{
                stagePadding: false,
                items:2
            },
            0:{
                stagePadding: false,
                items:1
            }
        }
     });
     
    $(window).on("load", function(){
    $('.projects-grid').each( function(){
        var $container = $(this); 
        $container.isotope({ 
            itemSelector : '.project-item', 
            animationEngine : 'css',
        });

        var $optionSets = $('.project_filters'),
            $optionLinks = $optionSets.find('a');

        $optionLinks.on('click', function(){
            var $this = $(this);

            if ( $this.hasClass('selected') ) {
                return false;
            }
            var $optionSet = $this.parents('.project_filters');
                $optionSets.find('.selected').removeClass('selected');
                $this.addClass('selected');

            var selector = $(this).attr('data-filter');
                $container.isotope({ 
                    filter: selector 
                });
            return false;
        });
    });
    });


})( jQuery );

const AboutMore = document.querySelector('.aboutUs__right--more')
const AboutMoreBtn = document.querySelector('.aboutUs__right--moreBtn')

const PlusA = document.querySelector('.listPlusA')
const ListA1 = document.querySelector('.maskListA1')
const ListA2 = document.querySelector('.maskListA2')
const ListA3 = document.querySelector('.maskListA3')
const ListA4 = document.querySelector('.maskListA4')
const ListA5 = document.querySelector('.maskListA5')

const PlusD = document.querySelector('.listPlusD')
const ListD1 = document.querySelector('.maskListD2')
const ListD2 = document.querySelector('.maskListD2')


const cardDesign = document.querySelector('.servicesUs__card1')
const cardAudio = document.querySelector('.servicesUs__card2')
const cardEvent = document.querySelector('.servicesUs__card3')
const cardDigitalisation = document.querySelector('.servicesUs__card4')
const cardPresse = document.querySelector('.servicesUs__card5')
const cardLocation = document.querySelector('.servicesUs__card6')
const cardShooting = document.querySelector('.servicesUs__card7')
const cardDigital = document.querySelector('.servicesUs__card8')
const cardConseil = document.querySelector('.servicesUs__card9')



const imgDesign = document.querySelector('.servicesUs__img1')
const imgDesignAlt = document.querySelector('.servicesUs__imgAlt1')

const imgAudio = document.querySelector('.servicesUs__img2')
const imgAudioAlt = document.querySelector('.servicesUs__imgAlt2')

const imgEvent = document.querySelector('.servicesUs__img3')
const imgEventAlt = document.querySelector('.servicesUs__imgAlt3')

const imgDigitalisation = document.querySelector('.servicesUs__img4')
const imgDigitalisationAlt = document.querySelector('.servicesUs__imgAlt4')

const imgPresse = document.querySelector('.servicesUs__img5')
const imgPresseAlt = document.querySelector('.servicesUs__imgAlt5')

const imgLocation = document.querySelector('.servicesUs__img6')
const imgLocationAlt = document.querySelector('.servicesUs__imgAlt6')

const imgShooting = document.querySelector('.servicesUs__img7')
const imgShootingAlt = document.querySelector('.servicesUs__imgAlt7')

const imgDigital = document.querySelector('.servicesUs__img8')
const imgDigitalAlt = document.querySelector('.servicesUs__imgAlt8')

const imgConseil = document.querySelector('.servicesUs__img9')
const imgConseilAlt = document.querySelector('.servicesUs__imgAlt9')



const divDesign = document.querySelector('.displayDesign')
const divAudio = document.querySelector('.displayAudio')
const divEvent = document.querySelector('.displayEvent')
const divDigitalisation = document.querySelector('.displayDigitalisation')
const divPresse = document.querySelector('.displayPresse')
const divLocation = document.querySelector('.displayLocation')
const divShooting = document.querySelector('.displayShooting')
const divDigital = document.querySelector('.displayDigital')
const divConseil = document.querySelector('.displayConseil')

// EVENT
if(AboutMoreBtn !== null)
AboutMoreBtn.addEventListener('click',MUs);

if(PlusA !== null)
PlusA.addEventListener('click',ListAudio);
if(PlusD !== null)
PlusD.addEventListener('click',ListDigitalisation);



if(cardDesign !== null)
cardDesign.addEventListener('click',fDesign);

if(cardAudio !== null)
cardAudio.addEventListener('click',fAudio);

if(cardEvent !== null)
cardEvent.addEventListener('click',fEvent);

if(cardDigitalisation !== null)
cardDigitalisation.addEventListener('click',fDigitalisation);

if(cardPresse !== null)
cardPresse.addEventListener('click',fPress);

if(cardLocation !== null)
cardLocation.addEventListener('click',fLocation);

if(cardShooting !== null)
cardShooting.addEventListener('click',fShooting);

if(cardDigital !== null)
cardDigital.addEventListener('click',fDigital);

if(cardConseil !== null)
cardConseil.addEventListener('click',fConseil);

// More aboutUs function

function MUs(){
    AboutMore.style.display = 'block'
    AboutMoreBtn.style.display = 'none'
}

// More List functions

function ListAudio(){
    ListA1.style.display = 'block'
    ListA2.style.display = 'block'
    ListA3.style.display = 'block'
    ListA4.style.display = 'block'
    ListA5.style.display = 'block'
    PlusA.style.display = 'none'
}

function ListDigitalisation(){
    ListD1.style.display = 'block'
    ListD2.style.display = 'block'
    PlusD.style.display = 'none'
}

// Design service function

function fDesign(){
    divDesign.style.display = 'block'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='block'
    imgDesignAlt.style.display ='none'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.add('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')

}

// Audio function

function fAudio(){
    divDesign.style.display = 'none'
    divAudio.style.display ='block'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='block'
    imgAudioAlt.style.display ='none'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.add('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Event function

function fEvent(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='block'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='block'
    imgEventAlt.style.display ='none'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.add('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}


// Digitalisation function

function fDigitalisation(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='block'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='block'
    imgDigitalisationAlt.style.display ='none'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.add('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Press function

function fPress(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='block'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='block'
    imgPresseAlt.style.display ='none'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.add('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Location function

function fLocation(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='block'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='block'
    imgLocationAlt.style.display ='none'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.add('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Shooting function

function fShooting(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='block'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='block'
    imgShootingAlt.style.display ='none'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.add('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Digital function

function fDigital(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='block'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='block'
    imgDigitalAlt.style.display ='none'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.add('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Conseil function

function fConseil(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='block'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='block'
    imgConseilAlt.style.display ='none'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.add('cardActive')
}