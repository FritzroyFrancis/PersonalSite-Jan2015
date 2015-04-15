var $j = jQuery.noConflict();

$j('.carousel').carousel({interval: 2000});
$j('left carousel-control').click(function()
{
	$j('.carousel').carousel('prev');
});
$j('left carousel-control').click(function()
{
	$j('.carousel').carousel('next');
});

function loadMusicData(ID, ajaxurl)
{

	$j.ajax({
    
    	url: ajaxurl, 
        type: 'POST', 
    	data: {action: 'my_action_name', songID: ID},
    
    	success: function(song)
    	{
    		$j(".grey, #songDesc").animate({opacity: 0}, 800);
    		
    		setTimeout(function()
    		{
	    		var results = song.split("|");	
				$j("audio").attr("src", results[0]);
				$j(".grey").attr("src", results[1]);
				$j("#songDesc").html(results[2].substring(0, results[2].length - 1));
				document.getElementById('player').play();
				var str = $j("#play-btn").attr("src");
				str = str.replace("play", "pause");
				$j("#play-btn").attr("src", str);
	      		songLength();
			}, 1000);
			
			setTimeout(function()
    		{
    			$j(".grey, #songDesc").animate({opacity: 1}, 800);
			}, 1000);
    	}
	});
}

/* SCROBBLING FUNCTIONALITY */

function songLength()
{
  setInterval(function()
  {
    var source = document.getElementById('player');
    var sourceMeasure =$j("#songTimeMeasure");
    sourceMeasure.css("width", (source.currentTime * 100/ source.duration) + "%"); 
    sourceMeasure.parent().click(function(e)
    {
        var newPosition = (e.pageX - sourceMeasure.offset().left) / $j("#progress-bar").width();
        source.currentTime = newPosition * source.duration;
	      //var bottom = $j("#player").offset().top + $j("#player").height();
	      //if(bottom - e.pageY <= 5)
	      //{
	      //}
    });
  }, 20)
}

$j(document).ready(function()
{
	var currentPage;

	/* HOVER OVER NAVIGATION MENU */

	$j(".menu-item a").on("mouseover", function(e)
	{
		$j(this).removeClass("navUnhover").addClass("navHover");
	});

	$j(".menu-item a").on("mouseout", function(e)
	{
		if($j(this).html() != currentPage)
		{
			$j(this).removeClass("navHover").addClass("navUnhover");		
		}
	});

	/* PLAY OR PAUSE */

	$j('#play-btn').on("click", function(e)
	{
		if(document.getElementById('player').paused)
	    {
	      	document.getElementById('player').play();
	      	var str = $j("#play-btn").attr("src");
			str = str.replace("play", "pause");
			$j("#play-btn").attr("src", str);
	      	songLength();
	      	//$j(this).attr("src", "<?php bloginfo('template_directory'); ?>/image/play.png");
	    }

		else
	    {
	      	document.getElementById('player').pause();
	      	var str = $j("#play-btn").attr("src");
			str = str.replace("pause", "play");
			$j("#play-btn").attr("src", str);
	      //$j(this).attr("src", "<?php bloginfo('template_directory'); ?>/image/play.png");
	    }
	});

	/* EXPAND A BLOG POST */

	$j('body').on("click", "ul#blogList li", function()
	{		
		if($j(this).css("max-height") == "2000px")
		{
			$j(this).css("background-color", "", 1000);
			$j(this).animate({"max-height": "50px"}, 1000);
		} 
		else
		{
			$j(this).css("background-color", "rgba(0,0,255,.2)", 1000);
			$j(this).animate({"max-height": "2000px"}, 1000);
		} 
    });  

});