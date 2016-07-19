jQuery(document).ready(function(){
    jQuery(window).resize(function(){
        if(this.mpGridGalleryResizeTimeout) clearTimeout(this.mpGridGalleryResizeTimeout);
        this.mpGridGalleryResizeTimeout = setTimeout(function() {
            jQuery(this).trigger('mpGridGalleryResizeEnd');
        }, 500);
    });
    jQuery(window).on('mpGridGalleryResizeEnd', function(){
        mpRecalcGridGalleryMargins();
    });
});
function mpRecalcGridGalleryMargins(gridGalleries){
    if (typeof(gridGalleries) === 'undefined'){
        gridGalleries = jQuery('.motopress-grid-gallery-obj.motopress-grid-gallery-need-recalc');
    }
    if (gridGalleries.length) {
        gridGalleries.each(function(index, el){
            var spanMarginLeft = jQuery(jQuery(el).find('[class*="mp-span"]').get(1)).css('margin-left');
            var rows = jQuery(el).find('.mp-row-fluid').not(':first.mp-row-fluid');
            rows.css('margin-top', spanMarginLeft);
        });
    }
}