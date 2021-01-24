$(function() {
	$("main").click(function (e) {
		$("#deleteAccount").removeAttr("disabled");
		$("#deleteAccountConfermation").hide("slide");
	});

	$("#deleteAccount").click(function(e) {
		e.stopPropagation();
		$("#deleteAccountConfermation").show("slide");
		$(this).attr("disabled", "true");
	});

	$("#deleteAccountConfermation").click(function (e) { 
		$.post("../../ApiAJAX/AdminProfile/deleteBrewery.php", function() {
			$("main").html(`
				<h2>Birrificio cancellato</h2>
				<a href="../../Site/AdminProfile/breweryList.php""><button>OK</button></a>
			`);
		});	
	});
})