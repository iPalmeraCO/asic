jQuery(window).load(function(){
    mpFixBackgroundVideoSize();
});
jQuery(window).resize(function(){
    if(this.mpResizeTimeout) clearTimeout(this.mpResizeTimeout);
    this.mpResizeTimeout = setTimeout(function() {
        jQuery(this).trigger('mpResizeEnd');
    }, 500);
});
jQuery(window).on('mpResizeEnd mpce-row-size-update', function(){
    mpFixBackgroundVideoSize();
});
function onYouTubeIframeAPIReady() {
    mpInitYouTubePlayers();
}

function mpInitYouTubePlayers(players) {

    if (typeof players === 'undefined') {
        players = jQuery('.mp-video-container>.mp-youtube-container>.mp-youtube-video');
    }
    players.each(function(index, player) {
        $player = jQuery(player);
        var ytplayer = new YT.Player(players[index], {
            videoId : $player.attr('data-src'),
            events : {
                'onReady' : mpCreateYTEvent(index )
            }
        });
        $player.data('ytplayer', ytplayer);
    });

    function mpCreateYTEvent(index){
        return function(evt){
            $player = jQuery(players[index]);
            if ($player.attr('data-mute') === '1') {
                evt.target.mute();
            }
        }
    }
}
jQuery('.mp-video-container').on('click', function(e){
    if (jQuery(this).children('video').length) {
        var player = jQuery(this).children('video')[0];
        if (player.paused) {
            player.play();
        } else {
            player.pause();
        }
    } else {
        var player = jQuery(this).find('iframe.mp-youtube-video').data('ytplayer');
        if (player) {
            if (player.getPlayerState() === 2) {
                player.playVideo();
            } else {
                player.pauseVideo();
            }
        }
    }
});
jQuery('.mp-row-video').on('click', function(e){
    if (jQuery(e.target).is('.mp-row-fluid') ) {
        jQuery(this).children('.mp-video-container').trigger('click');
    } else if(jQuery(e.target).is('[class*=mp-span]')){
        jQuery(this).closest('.mp-row-video').children('.mp-video-container').trigger('click');
    }
});
function mpFixBackgroundVideoSize(videos){
    if (typeof videos === 'undefined') {
        videos = jQuery('.mp-video-container');
    }
    jQuery.each(videos, function(index){
        mpFixVideoSize(videos[index]);
    });
}

function mpRememberOriginalSize(video) {
    if (!video.originalsize) {
        video.originalsize = {width : video.width(), height : video.height()};
    }
}

function mpFixVideoSize(div) {
    var video, fixHeight;

    if (jQuery(div).children().is('video')) {
        video = jQuery(div).children();
    } else {
        video = jQuery(div).find('iframe');
        if (!video.length){
            video = jQuery(div).find('img');
        }
    }

    mpRememberOriginalSize(video);

    var targetwidth = jQuery(div).width();
    var targetheight = jQuery(div).height();
    var srcwidth = video.originalsize.width;
    var srcheight = video.originalsize.height;
    var scaledVideo = mpScaleVideo(srcwidth, srcheight, targetwidth, targetheight);

    jQuery(div).find('.mp-youtube-container').height(scaledVideo.height);
    jQuery(div).find('.mp-youtube-container').width(scaledVideo.width);
    video.width(scaledVideo.width);
    video.height(scaledVideo.height);
    video.css("max-width", scaledVideo.width);
    jQuery(video).css("left", scaledVideo.targetleft);
    jQuery(video).css("top", scaledVideo.targettop);
}

function mpScaleVideo(srcwidth, srcheight, targetwidth, targetheight) {

    var result = { width: 0, height: 0, fScaleToTargetWidth: true };

    if ((srcwidth <= 0) || (srcheight <= 0) || (targetwidth <= 0) || (targetheight <= 0)) {
        return result;
    }

    var scaleX1 = targetwidth;
    var scaleY1 = (srcheight * targetwidth) / srcwidth;

    var scaleX2 = (srcwidth * targetheight) / srcheight;
    var scaleY2 = targetheight;

    var fScaleOnWidth = (scaleX2 <= targetwidth);

    if (fScaleOnWidth) {
        result.width = Math.floor(scaleX1);
        result.height = Math.floor(scaleY1);
        result.fScaleToTargetWidth = true;
    }
    else {
        result.width = Math.floor(scaleX2);
        result.height = Math.floor(scaleY2);
        result.fScaleToTargetWidth = false;
    }
    result.targetleft = Math.floor((targetwidth - result.width) / 2);
    result.targettop = Math.floor((targetheight - result.height) / 2);

    return result;
}