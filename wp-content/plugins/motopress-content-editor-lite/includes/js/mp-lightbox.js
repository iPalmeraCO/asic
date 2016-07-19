(function ($) {
    $(document).ready(function () {
        $('[data-action="motopressLightbox"]').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true
            }

        });

        $('[data-action="motopressGalleryLightbox"]').magnificPopup({
            type: 'image',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] 
            }
        });

        var modalButtons = $('[data-action="motopress-modal"]');
        modalButtons.each(function () {
            var modalButton = $(this);
            var showAnimation = modalButton.attr('data-mfp-show-animation').length ? ' ' + modalButton.attr('data-mfp-show-animation') : '';
            var hideAnimation = modalButton.attr('data-mfp-hide-animation').length ? ' ' + modalButton.attr('data-mfp-hide-animation') : '';
            var hideAnimationDuration = hideAnimation !== '' ? 500 : 0; 
            var modalStyle = modalButton.attr('data-modal-style');
            var uniqid = modalButton.attr('data-uniqid');
            var uniqueClass = ' motopress-modal-' + uniqid;

            modalButton.magnificPopup({
                key: 'motopress-modal-obj',
                mainClass: 'motopress-modal' + uniqueClass + ' ' + modalStyle,
                midClick: true,
                closeBtnInside: false,
                fixedBgPos: true,
                removalDelay: hideAnimationDuration,
                closeMarkup: '<button title="%title%" class="motopress-modal-close"></button>',
                callbacks: {
                    beforeOpen: function () {
                        modalButton.attr('disabled', true);
                        if (showAnimation) {
                            var background = $(this.bgOverlay);
                            var wrapper = $(this.wrap);
                            background.add(wrapper)
                                .addClass(showAnimation)
                                .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                                    $(this).removeClass(showAnimation);
                                });
                        }
                    },
                    beforeClose: function () {
                        if (hideAnimation) {
                            var background = $(this.bgOverlay);
                            var wrapper = $(this.wrap);
                            background.add(wrapper)
                                .addClass(hideAnimation)
                                .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                                    $(this).removeClass(hideAnimation);
                                });
                        }
                    },
                    afterClose: function () {
                        modalButton.removeAttr('disabled');
                    }
                }
            });
        });

        var popupTriggers = $('.motopress-popup-trigger');
        popupTriggers.each(function () {
            var popupTrigger = $(this);
            var delay = popupTrigger.attr('data-delay').length ? parseInt(popupTrigger.attr('data-delay')) : 0;
            var showAnimation = popupTrigger.attr('data-mfp-show-animation').length ? ' ' + popupTrigger.attr('data-mfp-show-animation') : '';
            var hideAnimation = popupTrigger.attr('data-mfp-hide-animation').length ? ' ' + popupTrigger.attr('data-mfp-hide-animation') : '';
            var hideAnimationDuration = hideAnimation !== '' ? 500 : 0; 
            var modalStyle = popupTrigger.attr('data-modal-style');
            var uniqid = popupTrigger.attr('data-uniqid');
            var uniqueClass = ' motopress-modal-' + uniqid;
            var customClasses = popupTrigger.attr('data-custom-classes');            

            popupTrigger.waypoint(function (direction) {
                this.enabled = false;
                clearTimeout(window.motopressPopupTimeout);
                window.motopressPopupTimeout = setTimeout(function () {

                    popupTrigger.magnificPopup({
                        key: 'motopress-popup-obj' + uniqid,
                        mainClass: 'motopress-modal ' + modalStyle + ' ' + customClasses + uniqueClass,
                        closeBtnInside: false,
                        fixedBgPos: true,
                        removalDelay: hideAnimationDuration,
                        closeMarkup: '<button title="%title%" class="motopress-modal-close"></button>',
                        items: {
                            src : '#motopress-modal-content-' + uniqid,
                            type : 'inline'
                        },
                        callbacks: {
                            beforeOpen: function () {
                                if (showAnimation) {
                                    var background = $(this.bgOverlay);
                                    var wrapper = $(this.wrap);
                                    background.add(wrapper)
                                            .addClass(showAnimation)
                                            .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                                                $(this).removeClass(showAnimation);
                                            });
                                }
                            },
                            beforeClose: function () {
                                if (hideAnimation) {
                                    var background = $(this.bgOverlay);
                                    var wrapper = $(this.wrap);
                                    background.add(wrapper)
                                            .addClass(hideAnimation)
                                            .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                                                $(this).removeClass(hideAnimation);
                                            });
                                }
                            },
                            open: function(){
                                var showOnceCoockie = popupTrigger.attr('data-show-once');
                                if (typeof showOnceCoockie !== 'undefined') {                                    
                                    MPCECookies.set(showOnceCoockie, 'true');
                                }
                            }
                        }
                    }).magnificPopup('open');
                    clearTimeout(window.motopressPopupTimeout);
                }, delay);

            }, {
                offset: "100%",
                continuous: false,
                group: 'motopress-popups'
            });
        });
    });
})(jQuery);
