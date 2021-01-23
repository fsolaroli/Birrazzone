$(function() {
	$("main").click(function (e) {
		$("#deleteAccount").show();
		$("#deleteAccountConfermation").hide();
	});

	$("#deleteAccount").click(function(e) {
		e.stopPropagation();
		$("#deleteAccountConfermation").show();
		$(this).hide();
	});

	$("#deleteAccountConfermation").click(function (e) { 
		$.post("../ApiAJAX/SellerProfile/deleteSellerAccount.php", function() {
			$("main > section").html(`
				<h2>Account cancellato</h2>
				<a href="home.php"><button>OK</button></a>
			`);
		});	
	});
})