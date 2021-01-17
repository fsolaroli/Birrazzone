function hideSearchBar(event) {
	if (event.deltaY < -5) {
		// Scroll up
		$("div.search").show("slide");
	} else if (event.deltaY > 5) {
		// Scroll down
		$("div.search").hide("slide");
	}
}

$(function() {
	document.onwheel = hideSearchBar;
});
