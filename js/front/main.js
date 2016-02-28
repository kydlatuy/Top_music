var W = {
        _w: null,
        wnd: $(window),
        _widthScroll: function () {
            if (!this._w) {
                var el = $('<div/>').appendTo($('body')).css({
                    'height': 100,
                    'width': 100,
                    'overflow': 'scroll'
                }).wrap($('<div style="width:0;height:0;overflow:hidden;"></div>'));

                this._w = el.width() - el.get(0).clientWidth;
                el.parent().remove();
            }
            return this._w;
        },
        getWindowWidth: function () {
            return this.wnd.width() + (this.wnd.height() < $(document).height() || $('body').css('overflow') === 'scroll' ? this._widthScroll() : 0);
        }
    }
    ;
(function () {
    function show_sub(instant) {
        this.addClass('active');
        if (instant) {
            _show.call($('.frame-menu').show());
        }
        else
            $('.frame-menu').fadeIn(_show);
        function _show() {
            $(this).removeClass('close').addClass('open').removeAttr('style');
        }
    }

    function hide_sub(instant) {
        this.removeClass('active');
        if (instant) {
            _hide.call($('.frame-menu').hide());
        }
        else
            $('.frame-menu').fadeOut(_hide);
        function _hide() {
            $(this).removeClass('open').addClass('close').removeAttr('style');
        }
    }

    $(document).ready(function () {
        $('#message_send').validate({
            highlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass(validClass).addClass(errorClass);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass(errorClass).addClass(validClass);
            },
            submitHandler: function () {
                var notify = $('#notify').removeClass('alert-success alert-error').hide();
                $.ajax({
                    type: 'post',
                    data: $('#message_send').serialize(),
                    url: 'main/validations',
                    success: function (data) {
                        var dataObject = JSON.parse(data);

                        if (dataObject.success == true) {
                            notify.addClass('alert-success').html(dataObject.message);
                        } else {
                            notify.addClass('alert-error').html(dataObject.errors);
                        }
                        notify.show();
                    }
                })
            }
        });

        var $openListTechnologies = $('.open'),
            $frameMenu = $('.frame-menu');

        $('.header-menu').click(function () {
            if (!$frameMenu.is(':visible')) {
                show_sub.call($(this));
            }
            else {
                hide_sub.call($(this));
            }
        });

        var technologies = $('.items-technologies > li');
        addAnimationDelay.call(technologies);
        addAnimationDelay.call($('.frame-sosial-icons a'));

        var alreadyShowed,
            $hiddenElemnts = technologies.filter('.hide');
        $openListTechnologies.click(function () {
            addAnimationDelay.call($hiddenElemnts);
            $hiddenElemnts.removeClass('animated')
            $openListTechnologies.toggleClass('open close')
            if (!$openListTechnologies.data('show')) {
                alreadyShowed = $hiddenElemnts.addClass('animated').removeClass('hide');
                $openListTechnologies.data('show', true);
                setTimeout(function () {
                    technologies.css('animation-delay', '0.1s');
                }, technologies.length * 100);
            } else {
                addAnimationDelay.call($hiddenElemnts);
                alreadyShowed.addClass('hide');
                $openListTechnologies.data('show', false);
            }
            wayPointItemTechnologies();
        });

        $('#toUp').click(function () {
            $('html, body').animate({scrollTop: 0});
        });

        function addAnimationDelay() {
            var i = 0;
            this.each(function () {
                $(this).css('animation-delay', (i / 10) + 0.1 + 's');
                i++;
            });
        }

        $('[href^="#"]').filter(function () {
            return this.href.match(/#.+/);
        }).click(function (e) {
            var href = $(this).attr("href"),
                offsetTop = href === "#" ? 0 : $(href).offset().top + 1,
                wndTop = $(window).scrollTop();
            $('html, body').stop().animate({
                scrollTop: offsetTop
            }, (W.getWindowWidth() <= 960 ? 0 : 550), function () {
                if (W.getWindowWidth() <= 960) {
                    $('.header-menu.active').trigger('click');
                    $(window).scrollTop($(window).scrollTop() - $('header').outerHeight());
                }
                else if (wndTop > $(window).scrollTop())
                    menuWayPoint.call({element: $(href)}, 'custom');
            });
            e.preventDefault();
        });
        $.dropper.setParameters({loadingAnimate: false});
        $('a[rel]').dropper({
            addClass: 'dropper-gallery',
            overlayColor: '#323232',
            overlayOpacity: .9,
            scrollContent: false,
            limitSize: true
        });
        $("img.lazy").lazyload().load(function () {
            if (/http/.test($(this).attr('src'))) {
                $(this).removeAttr('width height');
                $(window).resize();
            }
        });
        $("[data-lazy]").load(function () {
            $(this).removeAttr('width height');
        });
        $('img[data-hover]').load(function () {
            var $this = $(this),
                img = new Image();
            $this.data('normal', $this.data('original') || $this.attr('src'));
            img.src = $this.data('hover');
            img.onload = function () {
                $this.hover(function () {
                    $(this).attr('src', $(this).data('hover'));
                }, function () {
                    $(this).attr('src', $(this).data('normal'));
                });
            }
        });
    });

    var imgContent = $('.img-content'),
        frameAboutTitle = $('.frame-about-title');

    function setHeightHC() {
        imgContent.css({
            'min-height': frameAboutTitle.outerHeight(),
            'height': $(window).height() - $('header').height()
        });
    }

    $(window).on('resize', function () {
        if (W.getWindowWidth() > 960) {
            hide_sub.call($('.header-menu'), true);
            $('.frame-menu').removeClass('close');
        }
    });
    setHeightHC();

    $.reject({
        reject: {
            msie7: true,
            msie8: true,
            firefox2: true,
            firefox3: true,
            opera7: true,
            opera8: true,
            opera9: true,
            opera10: true,
            safari2: true,
            safari3: true,
            safari4: true,
            konqueror1: true,
            konqueror2: true,
            konqueror3: true,
            chrome1: true,
            chrome2: true,
            chrome3: true,
            chrome4: true,
            unknown: true
        },
        imagePath: '/vendor/jReject/images/'
    });
})();