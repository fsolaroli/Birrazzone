const UPLOAD_DIR = "../../../Immagini/";

function hideSearchBar(event) {
	if (event.deltaY < 0) {
		// Scroll up
		$("div.search").show("slide");
	}
	else {
		// Scroll down
		$("div.search").hide("slide");
	}
}


$(function() {
	document.onwheel = hideSearchBar;
});
