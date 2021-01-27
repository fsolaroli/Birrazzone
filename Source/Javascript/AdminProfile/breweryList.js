
$(function(){

	$("ul#brewerylist > li > button").click(function(e) {
		window.location = "singleBrewery.php?id="+$(this).attr("class");	
	});
});
