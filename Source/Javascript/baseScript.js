function hideSearchBar(event) {
	if (event.deltaY < -5) {
		// Scroll up
		$("div.search").show("slide");
	} else if (event.deltaY > 5) {
		// Scroll down
		$("div.search").hide("slide");
	}
}

function shownav() {
	if($("nav").is(":hidden")) {
		$("nav").show('slide');
	} else {
		$("nav").hide('slide');
	}
}

$(function() {
	document.onwheel = hideSearchBar;

	$("div.scroll").click(function (e) { 
		$("nav").hide('slide');
	});

	$("header img[alt='Menu']").click(function(e) {
		shownav();
	});
});
