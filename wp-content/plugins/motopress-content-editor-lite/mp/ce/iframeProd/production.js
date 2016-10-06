

try {
    if (jQuery.hasOwnProperty('ui') && jQuery.ui.hasOwnProperty('version') ) {
        var CE = {};
        CE.jQueryUIVer = jQuery.ui.version;
        console.warn(parent.MP.Utils.strtr('The current page contains jQuery UI v%version%', {'%version%': CE.jQueryUIVer}));

        if (parent.MP.Utils.version_compare(CE.jQueryUIVer, '1.9.0', '<')) {
            jQuery.curCSS = jQuery.css;
            delete jQuery.ui;
            if (typeof $ !== 'undefined') {
                $.curCSS = jQuery.css;
                delete $.ui;
            }

            if (parent.MP.Utils.version_compare(CE.jQueryUIVer, '1.8.2', '>')) {
                jQuery.noConflict(true);
            }
        }
        delete CE.jQueryUIVer;
    }

    if (typeof jQuery === 'undefined') {
        steal.map('jquery/jquery.js', parent.motopress.wpJQueryUrl + 'jquery.js')
        .then(parent.motopress.wpJQueryUrl + 'jquery.js')
        .then(function() {
            if (parent.MP.Utils.version_compare(jQuery.fn.jquery, '1.9.0', '>')) {
                steal.then(parent.motopress.wpJQueryUrl + 'jquery-migrate.min.js');
            }
        })
        .then('mp/core/noConflict/noConflict' + parent.motopress.scriptSuffix + '.js')
        .then(
            'vendors/stellar/jquery.stellar.min.js' + parent.motopress.pluginVersionParam,
            'vendors/flexslider/jquery.flexslider-min.js' + parent.motopress.pluginVersionParam
        );
    } else {
        steal.loaded('jquery/jquery.js');
    }

    steal.then(function() {
        jQuery.ajax({
            url: parent.MP.Settings.loadScriptsUrl,
            type: 'GET',
            dataType: 'script',
            success: function() {
                if (jQuery.hasOwnProperty('curCSS')) {
                    delete jQuery.curCSS;
                    delete $.curCSS;
                }


                steal.then(
                    'vendors/select2/select2.min.js' + parent.motopress.pluginVersionParam,
                    'vendors/bgrins-spectrum/build/spectrum-min.js' + parent.motopress.pluginVersionParam,
                    'vendors/bgrins-spectrum/build/spectrum_theme.css' + parent.motopress.pluginVersionParam,
                    'vendors/fontIconPicker/jquery.fonticonpicker.min.js' + parent.motopress.pluginVersionParam,
                    'mp/core/bootstrapSelect/bootstrapSelect' + parent.motopress.scriptSuffix + '.js' + parent.motopress.pluginVersionParam,
                    'bootstrap/select/bootstrap-select.min.js' + parent.motopress.pluginVersionParam,
                    'bootstrap/bootstrap2-custom.min.js' + parent.motopress.pluginVersionParam,
                    'bootstrap/bootstrap-icon.min.css' + parent.motopress.pluginVersionParam,
                    parent.motopress.wpCssUrl + 'jquery-ui-dialog.css' + parent.motopress.pluginVersionParam,
                    'mp/ce/css/ceIframe' + parent.motopress.scriptSuffix + '.css' + parent.motopress.pluginVersionParam,
                    'bootstrap/select/bootstrap-select.min.css' + parent.motopress.pluginVersionParam,
                    'vendors/select2/select2.min.css' + parent.motopress.pluginVersionParam,
                    'bootstrap/datetimepicker/bootstrap-datetimepicker.min.css' + parent.motopress.pluginVersionParam,
                    function() {
                        if (parent.MP.Settings.lang.select2 !== 'en') steal('vendors/select2/select2_locale_' + parent.MP.Settings.lang.select2 + '.js' + parent.motopress.pluginVersionParam);
                    },
                    function($) {
                        if ($.hasOwnProperty('stellar')) $.stellar('refresh');
                    }
                )
                .then('bootstrap/clickover/bootstrapx-clickover.min.js' + parent.motopress.pluginVersionParam)
                .then('vendors/moment.js/moment.min.js' + parent.motopress.pluginVersionParam)
                .then('bootstrap/datetimepicker/bootstrap-datetimepicker.min.js' + parent.motopress.pluginVersionParam)
                .then('mp/ce/iframeProd/concat'+parent.motopress.scriptSuffix + '.js' + parent.motopress.pluginVersionParam,
                    function($) {
                        try {
                            if ($.hasOwnProperty('fn') && $.fn.hasOwnProperty('button') && $.fn.button.hasOwnProperty('noConflict')) {
                                $.fn.btn = $.fn.button.noConflict();
                            }

                            new CE.Utils();
                            CE.WPMore.getInstance();
                            new CE.StyleEditor();                            
                            new CE.LeftBar();
                            new CE.ImageLibrary();
                            new CE.WPGallery();
                            new CE.WPMedia();
                            new CE.WPAudio();
                            new CE.WPVideo();
                            new CE.Dialog();
                            new CE.Selectable();
                            new CE.Link();

	                                                    parent.MP.Editor.myThis.load();

                        } catch (e) {
                            parent.MP.Error.log(e);
                        }
                    }
                );
            }
        });
    });
} catch (e) {
    parent.MP.Error.log(e);
}
