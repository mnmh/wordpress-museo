(function ($, root, undefined) {

    $(function () {

        var urlCC = 'http://cc.museodememoria.gov.co';

        var mapa = L.map('mapa_cc_general',{
            maxZoom: 9,
            minZoom: 6,
            scrollWheelZoom: false,
            maxBounds:[[-4.7020829940000013,-79.4437498789999950],[13.6087503390000002,-66.2529165459999945]]
          }).setView([4.124080991005611, -73.67431640625001], 6);

          $.getJSON('https://gist.githubusercontent.com/nestorandrespe/a1a0c14e772b3f578e410b49835bf31c/raw/e436431233d197c23581b839f88367e5c94e17f7/colombia_cercanos.json', function(data){
                mundo = data
              data.features.map(f=>{
                L.geoJson(f.geometry, {
                  weight: 0.3,
                  color: '#999',
                  fillColor: '#fff',
                  fillOpacity: 0.5,
                  opacity: 1
                }).addTo(mapa);
              })

              $.getJSON('https://gist.githubusercontent.com/john-guerra/43c7656821069d00dcbc/raw/3aadedf47badbdac823b00dbe259f6bc6d9e1899/colombia.geo.json', function(data_){
                departamentos = data_
                data_.features.map(f=>{
                    L.geoJson(f.geometry, {
                      weight: 0.7,
                      color: '#555',
                      fillColor: '#fff',
                      fillOpacity: 1,
                      opacity: 1
                    }).addTo(mapa);
                  })
                })
            })

        // $('.filtro-cc .item').on('click', function(){
        //     $parent = $('.filtro-cc')
        //     if(!$(this).hasClass('active')) $(this).addClass('active')
        //     else $(this).removeClass('active')
        //     //return false;
        // });

        // $('.filtro_tags.cc .alfa .letter').on('click', function () {
        //     var div = $(this).attr('data-div');
        //     if(!$(this).hasClass('active')){
        //         $('.filtro_tags .alfa .active').removeClass('active');
        //         $(this).addClass('active');
        //         $('.filtro_tags .listado li').hide();
        //         $('.filtro_tags .listado li.' + div).show();
        //     }
        //     else{
        //         $('.filtro_tags .alfa .active').removeClass('active');
        //         $('.filtro_tags .listado li').hide();
        //     }
            
        // });

        // $('.filtro_tags.cc .listado li').on('click', function() {
        //     $parent = $(this).parents('.filtro_tags')
        //     $child = $parent.find('.selected .default').clone();
        //     $child.removeClass('default').addClass($(this).attr('data-slug'))
        //     $child.html($(this).html())

            

        //     if(!$(this).hasClass('active')) {
        //         $(this).addClass('active')
        //         $parent.find('.selected').append($child)
        //         onSelectedClick($child);

        //     } else {
        //         $(this).removeClass('active')
        //         $parent.find('.selected .' + $(this).attr('data-slug')).remove()
        //     }

        //     updateFiltroTagParent();
        // })

        // function onSelectedClick($elem) {
        //     $elem.on('click', function() {
        //         var div = $(this).attr('class');
        //         $parent = $(this).parents('.filtro_tags')

        //         $parent.find('.listado [data-slug=' + div + ']').click();

        //         $list = $parent.find('.alfa .letter.active-persistent')
        //         $list.each(function(){
        //             var div = $(this).attr('data-div')
        //             if($parent.find('.listado li.active.' + div).length > 0) $(this).addClass('active-persistent')
        //             else $(this).removeClass('active-persistent')
        //         })
        //     })
        // }

        // function updateFiltroTagParent() {
        //     var $parent = $('.filtro_tags.cc .alfa .letter.active')
        //     var div = $parent.attr('data-div')
        //     if($('.filtro_tags.cc .listado li.active.' + div).length > 0) $parent.addClass('active-persistent')
        //     else $parent.removeClass('active-persistent')
        // }

        // $('#busqueda-cc').submit(function(){
        //     var string = urlCC + '/wp-json/cc/v1/busqueda?p=20';
        //     var string_searchVal = urlCC + '/wp-json/cc/v1/busqueda?p=20';

        //     var total_tipo = $('.filtro-cc .active').length

        //     if(total_tipo > 0){
        //         string += '&tipo-de-contenido='

        //         $('.filtro-cc .active').each(function(i,e) {
        //             var id = $(this).attr('data-id')

        //             string += id
        //             if(i+1 < total_tipo) string += ','
        //         })
        //     }

        //     var total_tags = $('.filtro_tags .listado .active').length

        //     if(total_tags > 0){
        //         string += '&tags='

        //         $('.filtro_tags .listado .active').each(function(i,e) {
        //             var id = $(this).attr('data-id')

        //             string += id
        //             if(i+1 < total_tags) string += ','
        //         })
        //     }

        //     var $inside = $('.cc-contenido-thumbs .inside');

        //     $inside.find('.item:not(.hide),.msj').remove()
        //     $inside.append('<div class="msj"></div>').find('.msj').html('cargando...')

        //     // if($('#buscar').val() != ''){
        //         var myStr = $('#buscar').val()
        //         myStr=myStr.toLowerCase();
        //         myStr=myStr.replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"");   //this one
        //         myStr=myStr.replace(/\s+/g, "+");

        //         string = string + '&q=' + encodeURI(myStr)

        //         // $.getJSON(string_searchVal, function (data) {
        //         //     console.log(data)
        //         //     $inside.find('.msj').remove()
        //         //     for(var i = 0; i < data.length; i++){
        //         //         var titulo = data[i]['title'];
        //         //         $item = $inside.find('.hide.limpio').clone();
        //         //         $item.find('.name').html(titulo);
        //         //         $item.attr('href', '/centro-de-contenido/?contenido=' + data[i]['id']);
        //         //         $item.attr('target', '_blank');
        //         //         $item.removeClass('hide').addClass('fresh');
        //         //         $inside.append($item);
        //         //     }
    
        //         //     var tl_temp = new TimelineMax();
        //         //     tl_temp.add('start')
        //         //         .staggerFromTo($inside.find('.fresh'), 0.2, {
        //         //             autoAlpha: 0,
        //         //             y: 20
        //         //         }, {
        //         //             autoAlpha: 1,
        //         //             y: 0
        //         //         }, 0.05)
        //         //         .add(function () {
        //         //             $($inside.find('.fresh')).removeClass('fresh');
        //         //         });
        //         // })
        //     // } else {
        //         $.getJSON(string, function (data) {
        //             $inside.find('.msj').remove()
        //             for(var i = 0; i < data.length; i++){
        //                 // var tipo = data[i]['tipo-de-contenido'][0]['slug'];
        //                 // var titulo = data[i]['titulo'];
        //                 // $item = $inside.find('.hide.' + tipo).clone();
        //                 // $item.find('.name').html(titulo);
        //                 // $item.attr('href', '/centro-de-contenido/?contenido=' + data[i]['id']);
        //                 // $item.attr('target', '_blank');
        //                 // $item.removeClass('hide').addClass('fresh');
        //                 // $inside.append($item);

        //                 var titulo = data[i]['post_title'];
        //                 $item = $inside.find('.hide.limpio').clone();
        //                 $item.find('.name').html(titulo);
        //                 $item.attr('href', '/centro-de-contenido/?contenido=' + data[i]['ID']);
        //                 $item.attr('target', '_blank');
        //                 $item.removeClass('hide').addClass('fresh');
        //                 $inside.append($item);
        //             }
    
        //             var tl_temp = new TimelineMax();
        //             tl_temp.add('start')
        //                 .staggerFromTo($inside.find('.fresh'), 0.2, {
        //                     autoAlpha: 0,
        //                     y: 20
        //                 }, {
        //                     autoAlpha: 1,
        //                     y: 0
        //                 }, 0.05)
        //                 .add(function () {
        //                     $($inside.find('.fresh')).removeClass('fresh');
        //                 });
        //             // $this.attr('data-page', page + 1);
        //             // if(data.length < 20) $this.remove();
        //         })
        //     // }

        //     return false
        // })

    });

})(jQuery, this);