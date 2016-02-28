function getPaddings() {
    var $this = $(this);
    return $this.css('padding-top') + ' ' + $this.css('padding-right') + ' ' + $this.css('padding-bottom') + ' ' + $this.css('padding-left');
}
function wayPointItemTechnologies(els) {
    var $itemTechnologies = els || $('.items-technologies').children('li:visible')

    $itemTechnologies.waypoint(function (dir) {
        $(this.element).removeClass('zoomIn zoomOut animated');
        if (dir === 'down')
            $(this.element).addClass('zoomIn animated');
        else
            $(this.element).addClass('zoomOut animated');
    }, {
        offset: '100%'
    });

    $itemTechnologies.waypoint(function (dir) {
        $(this.element).removeClass('zoomIn zoomOut animated')
        if (dir === 'down')
            $(this.element).addClass('zoomOut animated')
        else
            $(this.element).addClass('zoomIn animated');
    }, {
        offset: '-100%'
    });
}
function menuWayPoint(dir) {
    var parent = $('.frame-menu-paste'),
        menuPaste = $('#menuPaste'),
        refersMenu = $('header .frame-menu li a'),
        firstRefer = refersMenu.first(),

        $this = $(this.element),
        padding = getPaddings.call(firstRefer),
        activeItem = $('[href="#' + $this.attr('id') + '"]'),
        posMenuItem = Math.round(activeItem.offset().left) - 34,
        indexActiveItem = activeItem.parent().index();

    if (W.getWindowWidth() <= 960) {
        parent.empty();
        return false;
    }

    if (parent.length === 0) {
        parent = $('<div/>', {
            'class': 'frame-menu-paste'
        }).insertAfter($('.frame-logo'))
    }
    if (menuPaste.length === 0) {
        parent.append($('.frame-logo-content.hidden').clone().removeClass('hidden')).append($('<div/>', {
            'id': 'menuPaste'
        }));
        menuPaste = $('#menuPaste');
    }

    var curLeft = parseInt(menuPaste.css('left'));

    var newTitle = $this.clone()
        .removeAttr('id')
        .addClass('tempMenu');

    newTitle
        .wrap($('<div/>', {
            'id': 'tempMenuPaste'
        }))
        .parent()
        .prependTo(parent);

    var title = $('.tempMenu .title').css('padding', padding),
        tempMenuPaste = $('#tempMenuPaste');

    if (dir === 'down')
        $this.css('visibility', 'hidden');

    function setVisible($this) {
        var top = $this.offset().top - $(window).scrollTop();
        if (top < 0 && $this.outerHeight() + top < 0 || dir === 'up')
            $this.css('visibility', 'visible');
    }

    $(window).off('scroll.waypoint.menu').on('scroll.waypoint.menu', function () {
        setVisible($this);
    });

    tempMenuPaste.find('.title').css('width', 'auto');
    refersMenu.removeClass('active');
    tempMenuPaste.animate({'left': curLeft > 0 ? curLeft : posMenuItem}, {
        duration: dir === 'down' ? 500 : 0, complete: function () {
            activeItem.addClass('active');
            setVisible($this);
            $(this).remove();
            -
                newTitle
                    .clone()
                    .addClass(function () {
                        if (indexActiveItem === 0)
                            return 'first';
                        if (indexActiveItem === refersMenu.length - 1)
                            return 'last';
                    })
                    .prependTo(menuPaste.empty());

            menuPaste.css({
                display: 'block',
                left: posMenuItem
            });
        }
    });
}
jQuery(window).load(function () {
    $('.frame-about-title').addClass('animated fadeInDown');

    var logoContent = new Image();
    logoContent.src = '/img/logo-content.png';

    $('.title-category').waypoint(menuWayPoint, {
        offset: '0'
    });

    var $frameInfo = $('.frame-info');
    $frameInfo.waypoint(function (dir) {
        $(this.element).removeClass('fadeOutRight fadeInLeft animated');
        if (dir === 'down')
            $(this.element)
                .addClass('fadeInLeft animated');
        else
            $(this.element)
                .addClass('fadeOutRight');
    }, {
        offset: '100%'
    })


    $frameInfo.waypoint(function (dir) {
        $(this.element).removeClass('fadeOutRight fadeInLeft animated');
        if (dir === 'down')
            $(this.element)
                .addClass('fadeOutRight');
        else
            $(this.element)
                .addClass('fadeInLeft animated');
    }, {
        offset: '-100'
    });


    $('.icons-uphill').waypoint(function (dir) {
        if (dir === 'down')
            $(this.element).addClass('bounceIn');
        else
            $(this.element).removeClass('bounceIn');
    }, {
        offset: '100%'
    });

    wayPointItemTechnologies();

    var $frameInformationTitle = $('.frame-information > .title'),
        $frameInformationText = $('.frame-information > p');

    $frameInformationTitle.waypoint(function (dir) {
        $(this.element).removeClass('fadeInUp fadeOutUp fadeOutDown').addClass('animated');
        if (dir === 'down')
            $(this.element).addClass('fadeInUp');
        else
            $(this.element).addClass('fadeOutUp');
    }, {
        offset: '90%'
    });

    $frameInformationText.waypoint(function (dir) {
        $(this.element).removeClass('fadeInUp fadeOutUp fadeOutDown fadeInDown').addClass('animated');
        if (dir === 'down')
            $(this.element).addClass('fadeInUp');
        else
            $(this.element).addClass('fadeOutDown');
    }, {
        offset: '100%'
    });

    var $socialIcons = $('.frame-sosial-icons a');

    $socialIcons.waypoint(function (dir) {
        $(this.element).removeClass('fadeOutRightBig fadeInRightBig').addClass('animated');
        if (dir === 'down')
            $(this.element)
                .addClass('fadeInRightBig');
        else
            $(this.element)
                .addClass('fadeOutRightBig');
    }, {
        offset: '95%'
    });

    $socialIcons.waypoint(function (dir) {
        $(this.element)
            .removeClass('fadeOutRightBig fadeInRightBig animated')
            .addClass('fadeOutRightBig');
    }, {
        offset: '-50'
    });

    $socialIcons.waypoint(function (dir) {
        $(this.element)
            .removeClass('fadeOutRightBig fadeInRightBig')
            .addClass('animated fadeInRightBig');
    }, {
        offset: '50'
    });

    var $itemsTestimonials = $('.items-testimonials'),
        $frameLeftTestimonials = $('.frame-face, .frame-rules'),
        $frameRightTestimonials = $('.frame-happy-clients, .frame-name'),
        $frameAllTestimonials = $frameLeftTestimonials.add($frameRightTestimonials).removeClass('animated');


    $itemsTestimonials.waypoint(function (dir) {
        $frameAllTestimonials.removeClass('fadeInRightBig fadeInLeftBig animated');
        if (dir === 'down') {
            $frameLeftTestimonials.addClass('fadeInLeftBig animated');
            $frameRightTestimonials.addClass('fadeInRightBig animated');
        }
    }, {
        offset: '70%'
    });

    $itemsTestimonials.waypoint(function (dir) {
        if (dir === 'down')
            $frameAllTestimonials.removeClass('fadeInRightBig fadeInLeftBig animated');
        else {
            $frameLeftTestimonials.addClass('fadeInLeftBig animated');
            $frameRightTestimonials.addClass('fadeInRightBig animated');
        }
    }, {
        offset: '-70%'
    });

    var $itemsOurClients = $('.items-our-clients');
    var $frameUpstairs = $('.frame-upstairs');
    var $frameDownstairs = $('.frame-downstairs');
    var $frameAllStairs = $frameUpstairs.add($frameDownstairs);


    $itemsOurClients.waypoint(function (dir) {
        $frameAllStairs.removeClass('fadeInRightBig fadeInLeftBig animated');
        if (dir === 'down') {
            $frameUpstairs.addClass('fadeInLeftBig animated');
            $frameDownstairs.addClass('fadeInRightBig animated');
        }
    }, {
        offset: '95%'
    });

    $itemsOurClients.waypoint(function (dir) {
        if (dir === 'down')
            $frameAllStairs.removeClass('fadeInRightBig fadeInLeftBig animated');
        else {
            $frameUpstairs.addClass('fadeInLeftBig animated');
            $frameDownstairs.addClass('fadeInRightBig animated');
        }
    }, {
        offset: '-100%'
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() === 0) {
            $('.frame-menu-paste').empty();
        }
    }).resize(function () {
        var refersMenu = $('header .frame-menu li a');
        $('.tempMenu .title').css('padding', getPaddings.call(refersMenu.first()));
        var activeItemMenu = refersMenu.filter('.active');
        if (activeItemMenu.length > 0)
            $('#menuPaste').css('left', Math.round(activeItemMenu.offset().left) - 34);
        if (W.getWindowWidth() <= 960)
            $('.frame-menu-paste').empty();
    });
});