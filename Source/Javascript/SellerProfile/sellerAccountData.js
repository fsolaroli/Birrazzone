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
		$.post("../../ApiAJAX/SellerProfile/deleteSellerAccount.php", function() {
			$("main").html(`
				<h2>Account cancellato</h2>
				<a href="../Home/home.php"><button>OK</button></a>
			`);
		});	
	});

	$("button.modify").click(function (e) { 
		window.location="modifySellerAccountData.php";
	});
})