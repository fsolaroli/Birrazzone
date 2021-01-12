$(function() {
	$("main").click(function (e) { 
		$("div.alert").html("");	
	});
	$("#deleteAccount").click(function(e) {
		e.stopPropagation();
		$("div.alert").html(`
			<h2>Elimina account</h2>
			<button id="deleteAccountConfermation" class="delete">Conferma eliminazione account</button>
		`);
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