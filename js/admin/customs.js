$(function() {
  
    $('.input-group').hide();
    $('#find').click(function() {
    $('.input-group').toggle();
    });
    
    var checkHeight = function() {
        var serv_height = $('.service').height();
        $('.text').height(serv_height);
    };
    $(window).resize(checkHeight);
    checkHeight();  
    
    
    var ravenous = function() {
        if (window.matchMedia('(max-width: 767px)').matches)
        {
            $('#pointer').css('left','1em');
        }
        else {
            $('#pointer').css('right','1em').css('left','auto');
        }
    };
    $(window).resize(ravenous);
    ravenous();
    
    var archive = function() {
      if($('.pre_header p').is(':hidden')){
          $('.archive').css('height','auto');
      }
        else{
            var serv_height2 = $('.actual').height();
            $('.archive').height(serv_height2);
        }
    };
    $(window).resize(archive);
    archive();
    
    $(window).scroll(function() {    
    if($(window).scrollTop() >= 100){
        $('#pointer').show();
        }
       else{
           $('#pointer').hide();
        }
    });    
    $('#pointer').click(function() {
       $('html,body').animate({ scrollTop: 0 }, 500); 
    });
    
    $('footer .navbar-brand').click(function() {
        $('html,body').animate({ scrollTop: 0 }, 500);
    });
    

        jQuery(document).ready(function ($) {    
            var homeHeight, servHeight, newsHeight, aboutHeight, contactHeight;
            function getHeight() {
                homeHeight = 0;
                servHeight = $('.title').offset().top;
                newsHeight = $('#news_offset').offset().top;
                aboutHeight = $('#about_offset').offset().top;
                contactHeight = $('#contact_offset').offset().top;
            };
            getHeight();
            $(window).resize(getHeight);
            
            
            $('.nav_home').click(function() {
                $('html,body').animate({scrollTop:homeHeight},500);
            });
            $('.nav_service').click(function() {
                $('html,body').animate({scrollTop:servHeight},500);            
            });
            $('.nav_discusion').click(function() {
                $('html,body').animate({scrollTop:newsHeight},500);
            });
            $('.nav_about').click(function() {
                $('html,body').animate({scrollTop:aboutHeight},500);
            });
            $('.nav_contact').click(function() {
                $('html,body').animate({scrollTop:contactHeight},500);
            });
    });
    
        $('.modal-footer .btn-primary').click(function() {
           $('.modal-footer form').slideDown(); 
        });
    
    $('.service ul').clone().removeClass('hidden-xs nav nav-tabs nav-stacked').appendTo('.xsmall');
    $('.xsmall li').removeClass('active').removeAttr('data-toggle','aria-expanded', 'href');
    $('.xsmall li a').removeAttr('data-toggle').removeAttr('href').removeClass('active');
    
    $('#traders p').clone().appendTo('.xsmall .traders').hide();
    $('.xsmall li.traders').click(function() {
       $('.xsmall .traders p').slideToggle('fast');
    });
    
    $('#registr p').clone().appendTo('.xsmall .registr').hide();
    $('.xsmall li.registr').click(function() {
       $('.xsmall .registr p').slideToggle('fast');
    });
    
    $('#invest p').clone().appendTo('.xsmall .invest').hide();
    $('.xsmall li.invest').click(function() {
       $('.xsmall .invest p').slideToggle('fast');
    });
    
    $('#adress p').clone().appendTo('.xsmall .adress').hide();
    $('.xsmall li.adress').click(function() {
       $('.xsmall .adress p').slideToggle('fast');
    });
    
    $('#ceo p').clone().appendTo('.xsmall .ceo').hide();
    $('.xsmall li.ceo').click(function() {
       $('.xsmall .ceo p').slideToggle('fast');
    });
    
    $('#spy p').clone().appendTo('.xsmall .spy').hide();
    $('.xsmall li.spy').click(function() {
       $('.xsmall .spy p').slideToggle('fast');
    });
    
    $('#liquid p').clone().appendTo('.xsmall .liquid').hide();
    $('.xsmall li.liquid').click(function() {
       $('.xsmall .liquid p').slideToggle('fast');
    });
    
    $('#bank p').clone().appendTo('.xsmall .bank').hide();
    $('.xsmall li.bank').click(function() {
       $('.xsmall .bank p').slideToggle('fast');
    });
    
    $('#sub p').clone().appendTo('.xsmall .sub').hide();
    $('.xsmall li.sub').click(function() {
       $('.xsmall .sub p').slideToggle('fast');
    });
    
    $('#trademark p').clone().appendTo('.xsmall .trademark').hide();
    $('.xsmall li.trademark').click(function() {
       $('.xsmall .trademark p').slideToggle('fast');
    });
    
    $('#corp p').clone().appendTo('.xsmall .corp').hide();
    $('.xsmall li.corp').click(function() {
       $('.xsmall .corp p').slideToggle('fast');
    });
    
    });

        