$(function() {
	$(":file").change(function (e) {
		uploadImage("Birre");
	});
	if($("a.show") != null) {
		let show = 0;
		let shortDescriptionLenght = 50;
		let description = $("#fullDescription").text();
		$(".description > p").append("...");
		$("a.show").click(function (e) { 
			if (show == 0) {
				$(".description > p").text(description);
				$(this).text("Mostra meno");
				show = 1;
			} else {
				$(".description > p").text(description.substr(0, shortDescriptionLenght) + "...");
				$(this).text("Mostra tutto");
				show = 0;
			}
		});
	}

	$("div.product").click(function (e) { 
		console.log($(this).attr("id"));		
	});
});