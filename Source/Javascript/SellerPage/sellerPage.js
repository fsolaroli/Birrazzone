$(function() {
	$(":file").change(function (e) {
		uploadImage("Birre");
	});
	if($("a") != null) {
		$("a.show").click(function (e) { 
			$("p#shortDescription").hide();
			$("p#fullDescription").show();
			$("a.show").hide();
			$("a.hide").show();
		});
		$("a.hide").click(function (e) { 
			$("p#shortDescription").show();
			$("p#fullDescription").hide();
			$("a.show").show();
			$("a.hide").hide();			
		});
	}

	$("div.product").click(function (e) { 
		console.log($(this).attr("id"));		
	});
});