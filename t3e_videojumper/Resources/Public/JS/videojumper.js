(function ($) {
  'use strict';

  $(document).ready(function () {
     var player = projekktor('video.projekktor', {
       disallowSkip : t3evideojumper_disallowSkip,
	   //disallowSkip: true,
       playerFlashMP4 : 'typo3conf/ext/t3e_videojumper/Resources/Public/SWF/StrobeMediaPlayback.swf',
       playerFlashMP3 : 'typo3conf/ext/t3e_videojumper/Resources/Public/SWF/StrobeMediaPlayback.swf'
     }, function (player) {

      // resize stuff
      var parentElement = $('#' + player._id).parent();
      var parentWidth = parentElement.width();
      var aspectRatio = $('#' + player._id).width() / $('#' + player._id).height();
      var newHeight = parentWidth / aspectRatio;
      player.setSize({ width : parentWidth, height : newHeight });
      $(window).resize(function (){
        var parentWidth = parentElement.width();
        var newHeight = parentWidth / aspectRatio;
        player.setSize({ width : parentWidth, height : newHeight });
      });

      // big play/pause button
       player.addListener('state', function(state) {
        if (state == 'PLAYING' || state == 'STARTING') {
          $('#' + player._id).parent().find('a.playpause').removeClass('play');
          $('#' + player._id).parent().find('a.playpause').addClass('pause');
        } else if (state == 'PAUSED') {
          $('#' + player._id).parent().find('a.playpause').removeClass('pause');
          $('#' + player._id).parent().find('a.playpause').addClass('play');
        }
       });

      player.addListener('done', function () {
        gotoNextPage();
      });
     });

    $('.tx-videojumper a.playpause').click(function (e) {
      e.preventDefault();
      player.setPlayPause();
      return false;
    });
  });
}) (jQuery);
