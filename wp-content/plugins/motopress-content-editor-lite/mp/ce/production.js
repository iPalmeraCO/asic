try {
    if (typeof jQuery === 'undefined') {
        steal.map('jquery/jquery.js', motopress.wpJQueryUrl + 'jquery.js')
        .then(motopress.wpJQueryUrl + 'jquery.js');
    } else {
        steal.loaded('jquery/jquery.js');
    }

    steal
    .then(
        'bootstrap/bootstrap2-custom.min.js' + motopress.pluginVersionParam,
        'bootstrap/bootstrap-icon.min.css' + motopress.pluginVersionParam
    )
    .then('mp/ce/concat' + motopress.scriptSuffix + '.js' + motopress.pluginVersionParam,
        function($) {
            try {
                if ($.hasOwnProperty('fn') && $.fn.hasOwnProperty('button') && $.fn.button.hasOwnProperty('noConflict')) {
                    $.fn.btn = $.fn.button.noConflict();
                }
                new MP.Editor();
            } catch (e) {
                MP.Error.log(e);
            }
        }
    );

} catch (e) {
    MP.Error.log(e);
}
