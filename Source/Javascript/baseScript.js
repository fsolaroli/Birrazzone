function hideSearchBar(event) {
	if (event.deltaY < -5) {
		// Scroll up
		$("div.search").show("slide");
	} else if (event.deltaY > 5) {
		// Scroll down
		$("div.search").hide("slide");
	}
}

function showAside() {
	if($("aside").is(":hidden")) {
		$("aside").show('slide');
	} else {
		$("aside").hide('slide');
	}
}

$(function() {
	document.onwheel = hideSearchBar;

	$("div.scroll").click(function (e) { 
		$("aside").hide('slide');
	});

	$("header img[alt='Menu']").click(function(e) {
		showAside();
	});
});
