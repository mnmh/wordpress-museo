(function ($, root, undefined) {

    $(function () {
        var $carousel = $('.photo-gallery .photo-container');

        var $next = $('<div class="next"></div>');
        var $prev = $('<div class="prev"></div>');

        $('.photo-gallery').append($next).append($prev);

        $('.item_filtro').on('click', (e) => {
            $item = $(e.target)
            $parent = $item.parent()
            $parent_galeria = $item.parent().parent().parent()

            if($item.hasClass('active')){
                $parent.find('.item_filtro').show();
            } else if($item.hasClass('filter')){
                $parent.find('.item_filtro.active').removeClass('active')
                $parent.find('.item_filtro').show();
                $item.addClass('active')
                $parent.find('.item_filtro:not(.active)').hide();
                $parent_galeria.find('.inside .item').hide()
                var filtro = ''
                $('.item_filtro.filter.active').each((i, elem) => {
                    filtro += '.' + $(elem).attr('data-filter')
                })
                $parent_galeria.find('.inside .item').removeClass('hidden');
                $parent_galeria.find('.inside .moreNav').remove();
                $parent_galeria.find('.inside .item' + filtro).show()
            } else if ($item.hasClass('todos')){
                $parent.find('.item_filtro.active').removeClass('active')
                $parent.find('.item_filtro').show();
                $parent.find('.item_filtro.name').addClass('active')
                $parent.find('.item_filtro:not(.active)').hide()
                $parent_galeria.find('.inside .item').show()
                $parent_galeria.find('.inside .item').removeClass('hidden');
                $parent_galeria.find('.inside .moreNav').remove();
            }
        })

        $('.container_filtro').on({
            mouseleave: (e) => {
                var $item = $(e.target)
                var $parent = $item.parent()
                $parent.find('.item_filtro:not(.active)').hide();
            }
        })

        $carousel.flickity({
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
        });

        bindNav();

        function bindNav() {
            $next.on('click', function () {
                $carousel.flickity('next');
            });

            $prev.on('click', function () {
                $carousel.flickity('previous');
            });
        }

        $('.close-slider').on('click', function () {
            $('.photo-gallery').toggleClass('visible');
            var $gal = $(this).parent().parent().find('.gal .itemgal').clone();
            $gal.each(function () {
                var img = $(this).attr('data-img');
                $(this).css({
                    'background-image': "url('" + img + "')"
                });
            })
            if ($('.photo-gallery').hasClass('visible')) {
                $carousel.flickity('remove', $('.photo-gallery .itemgal'));
                $carousel.flickity('append', $gal);
            } else {
                $carousel.flickity('remove', $('.photo-gallery .itemgal'));
            }
        });

        $('.tarjetas .item.tipo_galeria, .open-gallery').on('click', function () {
            $('.photo-gallery').toggleClass('visible');
            var $gal = $(this).find('.gal .itemgal').clone();
            $gal.each(function () {
                var img = $(this).attr('data-img');
                $(this).css({
                    'background-image': "url('" + img + "')"
                });
            })
            if ($('.photo-gallery').hasClass('visible')) {
                $carousel.flickity('remove', $('.photo-gallery .itemgal'));
                $carousel.flickity('append', $gal);
                $carousel.flickity('select', 0);
            } else {
                $carousel.flickity('remove', $('.photo-gallery .itemgal'));
            }
        });


        $('.tarjetas .item.tipo_video').on('click', function () {
            var video = $(this).attr('data-video');
            // var url = 'https://www.youtube.com/embed/' + video + '?autoplay=1&controls=0&rel=0&showinfo=0&color=white';
            var url = video;
            $('body').append('<div class="visor_video"><iframe></iframe></div>');
            $('.visor_video iframe').attr('src', url);

            var tl_temp = new TimelineMax();

            tl_temp.add('start')
                .fromTo('.visor_video', 0.2, {
                    autoAlpha: 0
                }, {
                    autoAlpha: 1
                });

            $('.visor_video').on('click', function () {
                $(this).remove();
            })
        });

        $('.tarjetas .inside .moreNav').on('click', function() {
            $parent = $(this).parents('.inside');
            $parent.find('.item').removeClass('hidden');
            $(this).remove();
        })
    });

})(jQuery, this);