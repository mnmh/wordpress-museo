(function ($, root, undefined) {

	$(function () {
        if($('#citas .inside').length > 0){
            var citas_gal = new Flickity('#citas .inside', {
                freeScroll: false,
                contain: true,
                wrapAround: true,
                autoPlay: 7000,
                pageDots: false,
                prevNextButtons: false,
                cellAlign: 'center',
            });
        }
});

})(jQuery, this);