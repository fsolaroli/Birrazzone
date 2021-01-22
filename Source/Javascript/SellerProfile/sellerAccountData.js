$(function() {
	$("main").click(function (e) {
		$("div.delete").hide();
	});
	$("#deleteAccount").click(function(e) {
		e.stopPropagation();
		$("div.delete").show();
		$("#deleteAccountConfermation").click(function() { 
			$.post("../ApiAJAX/SellerProfile/deleteSellerAccount.php", function() {
				$("main > section").html(`
					<h2>Account cancellato</h2>
					<a href="home.php"><button>OK</button></a>
				`);
			});				
		});
	});	
})