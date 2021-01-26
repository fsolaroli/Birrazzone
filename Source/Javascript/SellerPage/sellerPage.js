let shortDescriptionLenght = 50;

$(function() {
	$(":file").change(function (e) {
		uploadImage("Birre");
	});
	if($("a.show").html() != null) {
		let show = 0;
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

	$("ul.products > li").click(function (e) {
		window.location="../ProductPage/productPage.php?id=" + $(this).attr("id");
	});
});