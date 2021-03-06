(function() {

    var PIE_HOLE    =  0.5,
        MIN_HEIGHT  =  200,
        EMPTY_CHART =  "No Data";

    google.load('visualization', '1');

    if (motopressGoogleChartsPHPData.motopressCE === '1') {
        google.motopressDrawChart = function( id ) {

            var verticalSize, item, motopressGoogleChartData,
                chartObject, validData, wrapper;

            if ( arguments.length !== 0 ) {
                verticalSize = arguments[1];
            }

            item = jQuery(document.getElementById( id ));
            motopressGoogleChartData = jQuery.parseJSON( item.attr('data-chart') ) || {};

            motopressGoogleChartData.height = MIN_HEIGHT;
            if ( verticalSize !== null ) {
                motopressGoogleChartData.height = verticalSize;
            }

            chartObject = {};
            validData = validateData( motopressGoogleChartData.table );
            chartObject.chartType = chartType( motopressGoogleChartData.type );

            if (validData === true) {
                chartObject.dataTable = motopressGoogleChartData.table;
            }else {
                chartObject.dataTable = null;
            }
            chartObject.options = { 'title': motopressGoogleChartData.title, 'height': motopressGoogleChartData.height, 'colors': motopressGoogleChartData.colors };
            if (motopressGoogleChartData.backgroundColor !== null) {
                chartObject.options.backgroundColor = {'fill' : 'transparent'};
            }
            if (motopressGoogleChartData.type == 'PieChart3D') {
                chartObject.options.is3D = true;
            }
            if (motopressGoogleChartData.donut != false && motopressGoogleChartData.donut !== 'false') {
                chartObject.options.pieHole = PIE_HOLE;
            }
            chartObject.containerId = motopressGoogleChartData.ID;

            if ( chartObject.dataTable !== null ) {
                wrapper = new google.visualization.ChartWrapper(chartObject);
                wrapper.draw();
                item.addClass('motopress-google-chart-loaded');
            } else {
                item.toggleClass('motopress-empty-chart').text(EMPTY_CHART);
            }
        };
    }

    var motopressDrawCharts = function() {
        jQuery('.motopress-google-chart').each(function() {

            var jQThis = jQuery(this),
                motopressGoogleChartData = jQuery.parseJSON( jQThis.attr('data-chart') ) || {},
                parentElement, heightFinder, chartObject,
                validData, prepareData, wrapper;

            if (motopressGoogleChartsPHPData.motopressCE === '0') {
                parentElement  = jQThis.parent();
                heightFinder = parentElement.attr('style');
                if (heightFinder !== undefined) {
                    heightFinder = heightFinder.split('min-height:');
                    heightFinder = heightFinder[1].split("px;");
                    motopressGoogleChartData.height = Number(heightFinder[0]);
                }else {
                    motopressGoogleChartData.height = MIN_HEIGHT;
                }
            }else if (motopressGoogleChartsPHPData.motopressCE === '1') {
                motopressGoogleChartData.height = jQThis.parent().parent().height();
                if ( motopressGoogleChartData.height < 100 ) {
                    motopressGoogleChartData.height = MIN_HEIGHT;
                }
            }

            chartObject = {};

            validData = validateData( motopressGoogleChartData.table );
            chartObject.chartType = chartType( motopressGoogleChartData.type );

            if (validData === true) {
                chartObject.dataTable = motopressGoogleChartData.table;
            }else {
                chartObject.dataTable = null;
            }
            chartObject.options = { 'title': motopressGoogleChartData.title, 'height': motopressGoogleChartData.height, 'colors' : motopressGoogleChartData.colors };
            if (motopressGoogleChartData.backgroundColor !== null) {
                chartObject.options.backgroundColor = {'fill' : 'transparent'};
            }
            if (motopressGoogleChartData.type == 'PieChart3D') {
                chartObject.options.is3D = true;
            }
            if (motopressGoogleChartData.donut != false && motopressGoogleChartData.donut !== 'false') {
                chartObject.options.pieHole = 0.5;
            }
            chartObject.containerId = motopressGoogleChartData.ID;

            if ( chartObject.dataTable !== null ) {
                wrapper = new google.visualization.ChartWrapper(chartObject);
                wrapper.draw();
                jQThis.addClass('motopress-google-chart-loaded');
            } else {
                jQThis.addClass('motopress-empty-chart').text(EMPTY_CHART);
            }
        });
    },

    validateData = function(dataToValidate) {
        var ethalon = null;
        if (dataToValidate) {
            for (i = 0; i < dataToValidate.length; i++) {
                ethalon = dataToValidate[0].length;
                if ( (dataToValidate.length === 1 && dataToValidate[0][0] === null )  || ethalon != dataToValidate[i].length ) {
                  return false;
                }
            }
            return true;
        }
        return false;
    },

    chartType = function(type) {
        var chart = null;
        if (type == 'PieChart3D') {
            type = 'PieChart';
        }
        return type;
    };

    google.setOnLoadCallback( motopressDrawCharts );

    if (motopressGoogleChartsPHPData.motopressCE === '0') {
        jQuery(document).ready(function () {
            var timer;
            jQuery(window).resize(function(e) {
                timer && clearTimeout( timer );
                timer = setTimeout(motopressDrawCharts, 100);
            });
        });
    }

    if (motopressGoogleChartsPHPData.motopressCE === '1') {
        jQuery(document).ready(function () {
            var timer;
                jQuery(document).on("resize", ".motopress-content-wrapper .ui-resizable", function(e) {
                    var thisChartID = jQuery(this).find(".motopress-google-chart").attr("id");
                    if ( thisChartID !== undefined ) {
                        var thisSizer = jQuery(this).find(".motopress-drag-handle").height();
                        timer && clearTimeout( timer );
                        timer = setTimeout(function() {
                                    google.motopressDrawChart( thisChartID, thisSizer );
                        }, 100);
                    }
                });
                jQuery(document).on("dragstop", ".motopress-content-wrapper .motopress-splitter", function(e) {
                    var thisChartParent = jQuery(this).parent().parent().parent(),
                        thisChart = thisChartParent.find(".motopress-google-chart");
                    if ( thisChart.length !== 0 ) {
                        thisChart.each(function() {
                            var thisID = jQuery(this).attr("id");
                            google.motopressDrawChart( thisID );
                        });
                    }
                });
                jQuery(window).on('resize', function(){
                    if (jQuery('.motopress-google-chart').length) {
                        timer && clearTimeout( timer );
                        timer = setTimeout(motopressDrawCharts, 100);                        
                    }
                });
        });
    }

})();