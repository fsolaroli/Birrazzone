$(function() {
	$("main").click(function (e) {
		$("#deleteAccount").removeAttr("disabled");
		$("#deleteAccountConfermation").hide("slide");
	});

	$("button.singleProduct").click(function(e){
		let ProductId = $(this).attr("id");
		window.location = "../../Site/AdminProfile/singleProduct.php?id="+ProductId;
	});

	$("#deleteAccount").click(function(e) {
		e.stopPropagation();
		$("#deleteAccountConfermation").show("slide");
		$(this).attr("disabled", "true");
	});

	$("#deleteAccountConfermation").click(function (e) { 
		let IdBirrificio = $("p").attr("id");
		$.post("../../ApiAJAX/AdminProfile/deleteBrewery.php", {IdBirrificio} ,function() {
			$("main").html(`
				<h2>Birrificio cancellato</h2>
				<button>OK</button>
				`);
			$("button").click(function() {
				window.location = "../../Site/AdminProfile/breweryList.php";
			})
		});	
	});
})