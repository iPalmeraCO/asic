(function($){
    $(function(){
		var FULLWIDTH_CLASS = 'mp-row-fullwidth',
            FULLWIDTH_CONTENT_CLASS = 'mp-row-fullwidth-content';

            	    var resetRow = function(el) {
		    el.css({
			    'width': '',
			    'padding-left': '',
			    'margin-left': '',
			    'padding-right': '',
			    'margin-right': ''
		    });
	    };


                motopressUpdateFullwidthRow();
        if ( parent.hasOwnProperty('MP') && parent.MP.hasOwnProperty('Editor') ) {
            parent.MP.Editor.onIfr('Resize', function(){
                    motopressUpdateFullwidthRow();
            });
        }
            var motopressUpdateFullwidthRowTimeout;
            $(window).resize(function(){
                if ( motopressUpdateFullwidthRowTimeout ) clearTimeout( motopressUpdateFullwidthRowTimeout );
                motopressUpdateFullwidthRowTimeout = setTimeout(function() {
                    motopressUpdateFullwidthRow();
                }, 500);
            });

        function motopressUpdateFullwidthRow() {
	        var fullWidthRows = $('.mp-row-fluid.' + FULLWIDTH_CLASS + ', .mp-row-fluid.' + FULLWIDTH_CONTENT_CLASS);

            $.each(fullWidthRows, function(){
                var row = $(this);
	            resetRow(row);
                var isFullWidthContent = row.hasClass(FULLWIDTH_CONTENT_CLASS);
                var rowOffsetLeft = row.offset().left;
                var rowOffsetRight = $('html').width() - rowOffsetLeft - $(row).width();                
                var rowPaddingLeft = (!isFullWidthContent) ? rowOffsetLeft - parseInt($(row).css('border-left-width')) + parseInt($(row).css('padding-left')) : '';
                var rowPaddingRight = (!isFullWidthContent) ? rowOffsetRight - parseInt($(row).css('border-right-width')) - parseInt($(row).css('padding-right')) : '';                

                                var rowWidth = $('html').width();
                $(row).css({
                    'width': rowWidth,
                    'padding-left': rowPaddingLeft,
                    'margin-left': -rowOffsetLeft,
                    'padding-right': rowPaddingRight,
                    'margin-right': -rowOffsetRight
                });                
            });
            $(window).trigger('mpce-row-size-update');
        }
    });

})(jQuery);