/*
 * jQuery Cookie Law JS Script
 *
 * Last Updated: Feb 01, 2016
 * 
 * Version 1.0
 *
 */
(function(e, t, n, r) {
    function o(t) {
        this.options = e.extend({}, s, t);
        if (!n.cookie.indexOf(this.options.cookieName)) {
            return false
        }
        this._defaults = s;
        this._name = i;
        this.create()
    }
    var i = "addcookienotice",
        s = {
            defaultText: "We use cookies to improve your experience on our website. By browsing this website, you agree to our use of cookies.",
            okButton: "Ok",
            displayMore: true,
            moreButton: "More Info",
            moreInfo: "Cookies are small text files held on your computer. Some cookies are required to ensure that the site functions correctly, for this reason we may have already set some cookies. They also allow us to give you the best browsing experience possible and help us understand how you use our site.",
            moreURL: "",
            location: "bottom",
            makeSpace: false,
            spaceMargin: "34px",
            speedIn: 500,
            speedOut: 400,
            delay: 1e3,
            "float": true,
            style: "dark",
            cookieExpiry: 90,
            cookieName: "addcookienotice",
            ok: function() {}
        };
    o.prototype.create = function() {
        if (this.options.displayMore && this.options.moreURL == "") {
            var t = '<div id="cookie-law-more-info"><div id="cookie-law-info-container"><a id="cookie-law-more-text-close" href="#">X</a><div id="cookie-law-more-text">' + this.options.moreInfo + '</div><div style="clear:both;"></div></div></div>';
            var n = '<a class="cookie-law-button" id="cookie-law-button-more" href="#cookie-law-more-info">' + this.options.moreButton + "</a>"
        } else if (this.options.moreURL) {
            var t = "";
            var n = '<a class="cookie-law-button" id="cookie-law-button-more" href="' + this.options.moreURL + '">' + this.options.moreButton + "</a>"
        } else {
            var t = "";
            var n = ""
        }
        var r = '<div id="cookie-law-container-box"><div id="cookie-law-container"><div id="cookie-law-message">' + this.options.defaultText + '</div><div id="cookie-law-action" style="float:right;"><a class="cookie-law-button" id="cookie-law-button-ok" href="#">' + this.options.okButton + "</a>" + n + '</div><div style="clear:both;"></div></div></div>';
        if (!this.options.float && this.options.location == "top") {
            var i = "absolute"
        } else {
            var i = "fixed"
        }
        if (this.options.makeSpace && this.options.location == "top") {
            e("body").css("margin-top", this.options.spaceMargin)
        } else if (this.options.makeSpace) {
            e("body").css("margin-bottom", this.options.spaceMargin)
        }
        e("body").append('<div id="jquery-cookie-law-script" class="' + this.options.style + " " + this.options.location + " " + i + '">' + t + r + "</div>");
        this.action()
    };
    o.prototype.action = function() {
        function r(e) {
            var t = new RegExp(e + "=([^;]+)");
            var r = t.exec(n.cookie);
            return r != null ? unescape(r[1]) : null
        }
        var t = this.options;
        e("#cookie-law-button-ok").click(function(r) {
            r.preventDefault();
            n.cookie = t.cookieName + "=accepted;path=/;max-age=" + 60 * 60 * 24 * t.cookieExpiry;
            e("#jquery-cookie-law-script").slideUp(t.speedOut);
            t.ok.call(t)
        });
        if (!t.moreURL) {
            e("#cookie-law-button-more").click(function(n) {
                n.preventDefault();
                e("#jquery-cookie-law-script #cookie-law-more-info").slideToggle(t.speedIn)
            })
        }
        e("#cookie-law-more-text-close").click(function(n) {
            n.preventDefault();
            e("#jquery-cookie-law-script #cookie-law-more-info").slideUp(t.speedOut)
        });
        if (r(t.cookieName) != "accepted") {
            e("#jquery-cookie-law-script").delay(t.delay).slideDown(t.speedIn)
        }
    };
    e.fn[i] = function(e) {
        new o(e)
    }
})(jQuery, window, document)