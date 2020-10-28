<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
	 integrity="sha393-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
	 crossorigin="anonymous"/> 
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>

<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.color.js"></script>
<script type="text/javascript" src="js/script.js"></script>
	<title></title>
  <script type="text/javascript">
	/*
* Author:      Marco Kuiper (http://www.marcofolio.net/)
*/

$(document).ready(function()
{
	// Variable to set the duration of the animation
	var animationTime = 500;
	
	// Variable to store the colours
	var colours = ["bd2c33", "e49420", "ecdb00", "3bad54", "1b7db9"];

	// Add rating information box after rating
	var ratingInfobox = $("<div />")
		.attr("id", "ratinginfo")
		.insertAfter($("#rating"));

	// Function to colorize the right ratings
	var colourizeRatings = function(nrOfRatings) {
		$("#rating li a").each(function() {
			if($(this).parent().index() <= nrOfRatings) {
				$(this).stop().animate({ backgroundColor : "#" + colours[nrOfRatings] } , animationTime);
			}
		});
	};
	
	// Handle the hover events
	$("#rating li a").hover(function() {
		
		// Empty the rating info box and fade in
		ratingInfobox
			.empty()
			.stop()
			.animate({ opacity : 1 }, animationTime);
		
		// Add the text to the rating info box
		$("<p />")
			.html($(this).html())
			.appendTo(ratingInfobox);
		
		// Call the colourize function with the given index
		colourizeRatings($(this).parent().index());
	}, function() {
		
		// Fade out the rating information box
		ratingInfobox
			.stop()
			.animate({ opacity : 0 }, animationTime);
		
		// Restore all the rating to their original colours
		$("#rating li a").stop().animate({ backgroundColor : "#333" } , animationTime);
	});
	
	// Prevent the click event and show the rating
	$("#rating li a").click(function(e) {
		e.preventDefault();
		alert("You voted on item number " + ($(this).parent().index() + 1));
	});
});


(function(jQuery){

	// We override the animation for all of these color styles
	jQuery.each(['backgroundColor', 'borderBottomColor', 'borderLeftColor', 'borderRightColor', 'borderTopColor', 'color', 'outlineColor'], function(i,attr){
		jQuery.fx.step[attr] = function(fx){
			if ( fx.state == 0 ) {
				fx.start = getColor( fx.elem, attr );
				fx.end = getRGB( fx.end );
			}

			fx.elem.style[attr] = "rgb(" + [
				Math.max(Math.min( parseInt((fx.pos * (fx.end[0] - fx.start[0])) + fx.start[0]), 255), 0),
				Math.max(Math.min( parseInt((fx.pos * (fx.end[1] - fx.start[1])) + fx.start[1]), 255), 0),
				Math.max(Math.min( parseInt((fx.pos * (fx.end[2] - fx.start[2])) + fx.start[2]), 255), 0)
			].join(",") + ")";
		}
	});

	
	function getRGB(color) {
		var result;

		// Check if we're already dealing with an array of colors
		if ( color && color.constructor == Array && color.length == 3 )
			return color;

		// Look for rgb(num,num,num)
		if (result = /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(color))
			return [parseInt(result[1]), parseInt(result[2]), parseInt(result[3])];

		// Look for rgb(num%,num%,num%)
		if (result = /rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(color))
			return [parseFloat(result[1])*2.55, parseFloat(result[2])*2.55, parseFloat(result[3])*2.55];

		// Look for #a0b1c2
		if (result = /#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(color))
			return [parseInt(result[1],16), parseInt(result[2],16), parseInt(result[3],16)];

		// Look for #fff
		if (result = /#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(color))
			return [parseInt(result[1]+result[1],16), parseInt(result[2]+result[2],16), parseInt(result[3]+result[3],16)];

		// Otherwise, we're most likely dealing with a named color
		return colors[jQuery.trim(color).toLowerCase()];
	}
	
	function getColor(elem, attr) {
		var color;

		do {
			color = jQuery.curCSS(elem, attr);

			// Keep going until we find an element that has color, or we hit the body
			if ( color != '' && color != 'transparent' || jQuery.nodeName(elem, "body") )
				break; 

			attr = "backgroundColor";
		} while ( elem = elem.parentNode );

		return getRGB(color);
	};
	
	
})(jQuery);
</script>

<style type="text/css">
/* COMMON CLASSES */
.break { clear:both; }

/* WRAPPER */
#wrapper { width:600px; margin:40px auto; }

/* CONTENT */
#content { }
.info { padding:20px 30px; font-size:16px; color:#eee; }
.info a { color:#eee; }

/* RATING */
#rating { list-style:none; width:460px; margin:20px auto; }
#rating li { display:inline; float:left; }
#rating li a { display:block; width:60px; height:60px; margin:5px; border:1px solid #888; background-color:#333; text-indent:-9999px;
	-moz-box-shadow:0 0 5px #888; -moz-border-radius:40px; -webkit-box-shadow:0 0 5px #888; -webkit-border-radius:40px; -o-box-shadow:0 0 5px #888; -o-border-radius:40px; }

#ratinginfo { clear:left; width:350px; margin:120px auto; }
#ratinginfo p { text-align:center; background-image:url("../images/textbg.png"); font:20px Georgia,'Times New Roman',serif; padding:10px;
	-moz-box-shadow:0 0 5px #888; -moz-border-radius:40px; -webkit-box-shadow:0 0 5px #888; -webkit-border-radius:40px; -o-box-shadow:0 0 5px #888; -o-border-radius:40px; }
</style>
</head>
<body>


<div class="jumbotron text-center">
  <div class="fa-4x">
  
    <i class="fas fa-check" style="color:#2ECC71"></i>

  </div>
  
  <h1 class="display-3">Thank you</h1>
  <p class="lead"><strong>Your request have been sent correctly.</p>
  
  <hr>
  <p>
   <a href="http://127.0.0.1:8000/cravenation">Go back to Home!</a>
  </p>
</div>


<!-- div id="wrapper">
	<div id="content">
		<ul id="rating">
			<li><a href="#">This is just crap</a></li>
			<li><a href="#">Nothing too new </a></li>
			<li><a href="#">Not bad, I like it</a></li>
			<li><a href="#">I would like to see more of this</a></li>
			<li><a href="#">This is the best thing I've seen</a></li>
		</ul>
		</div>
</div -->

</body>
</html>