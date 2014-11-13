$(function(){	
var description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id tortor nisi. Aenean sodales diam ac lacus elementum scelerisque. Suspendisse a dui vitae lacus faucibus venenatis vel id nisl. Proin orci ante, ultricies nec interdum at, iaculis venenatis nulla. ';
	$('#lbPlayer').ttwMusicPlayer(myPlaylist, {
		autoPlay:false, 
	    //description:description,
		jPlayer:{
			swfPath:'assets/jquery-jplayer'
		}
	});
});