$(function() {
	$("main").click(function (e) {
		$("#deleteAddress").removeAttr("disabled");
		$("#deleteAddressConfermation").hide("slide");
	});

	$("#deleteAddress").click(function(e) {
		e.stopPropagation();
		$("#deleteAddressConfermation").show("slide");
		$(this).attr("disabled", "true");
	});

	$("#deleteAddressConfermation").click(function (e) { 
		$.post("../../ApiAJAX/UserProfile/deleteAddress.php", function() {
			$("main").html(`
				<h2>Indirizzo cancellato</h2>
				<a href="../UserProfile/userAddress.php"><button>OK</button></a>
			`);
		});	
	});

	$(".modify").click(function() {
		window.location = "modifyUserAddress.php";
	});
})