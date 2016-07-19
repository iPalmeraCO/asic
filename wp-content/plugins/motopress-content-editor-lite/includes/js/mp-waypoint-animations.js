jQuery(document).ready(function() {
    if (typeof jQuery.fn.waypoint !== "undefined") {

        jQuery(".motopress-cta.motopress-need-animate").waypoint({
            offset: "85%",
            handler: function() {
                this.enabled = false; 
                var animation = jQuery(this.element).data("animation");
                jQuery(this.element).addClass("motopress-animation-" + animation);
                jQuery(this.element).find("[data-animation]").each(function() {
                    var child_animation = jQuery(this).data("animation");
                    jQuery(this).addClass("motopress-animation-" + child_animation);
                });
            }
        });

        jQuery(".motopress-ce-icon-obj.motopress-need-animate").waypoint(function(){
            this.enabled = false;  
            var animation = jQuery(this.element).attr('data-animation');
            jQuery(this.element).addClass('motopress-animation-' + animation);
        },{
            offset: "98%"
        });

    } 
});