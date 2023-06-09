(function ($, root, undefined) {

    $(function () {

        $('.acordeon_padre').each(function(){
            $parent = $(this)
            let $item = $('<div class="fila-botones"></div>')
            $parent.append($item)
            let loop_nombre = 'scroll_hijo'
            $newfila = $parent.find('.fila-botones').clone().addClass('btm')
            $('#contenidoGeneral').append($newfila)

            $('.acordeon_hijo').each(function(index){
                // console.log($(this).find('.titulo-modulo .sec').html())
                let img_url = $(this).find('.galeria_voces .item.is-selected img').attr('src')

                let item_id = loop_nombre + '_' + index
                let $item = $('<a class="item"></a>')
                $item.attr('data-id', item_id)
                $(this).attr('id', item_id)
                $(this).hide()
                $item.html('<div class="inside"><div class="name"></div></div>')
                $item.find('.name').text($(this).find('.titulo-modulo .sec').html())
                $item.find('.inside').css({'background-image': 'url("'+img_url+'")'})
                // $parent = $(this)
                $parent.find('.fila-botones').addClass('btm').append($item)
                $item.on('click', function(){
                    $('.fila-botones .active').removeClass('active')
                    var in_ = $(this).index()
                    $('.fila-botones .item:nth-child('+(in_ + 1)+')').addClass('active')
                    $('.acordeon_hijo').hide()
                    let id = $(this).attr('data-id')
                    $('#' + id).fadeIn()
                    window.dispatchEvent(new Event('resize'));

                })

                $newfila.append($item.clone().on('click', function(){
                    $('.fila-botones .active').removeClass('active')
                    var in_ = $(this).index()
                    $('.fila-botones .item:nth-child('+(in_ + 1)+')').addClass('active')
                    $('.acordeon_hijo').hide()
                    let id = $(this).attr('data-id')
                    $('#' + id).fadeIn()
                    window.dispatchEvent(new Event('resize'));
                    $.scrollTo('.acordeon_padre', 300)

                }))
            })

            $parent.find('.fila-botones').find('.item:first-child').click()
        })

    });

})(jQuery, this);