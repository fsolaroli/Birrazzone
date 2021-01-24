$(function() {
	$(":submit[name='update']").click(function() {
		let UserData = {
			via: $("input[name='Via']").val(),
			citta: $("input[name='Citta']").val(),
			provincia: $("input[name='Provincia']").val(),
			cap: $("input[name='CAP']").val()
		}

		let ManageUpdate = function(errors) {
			if(errors!=null) {
				$(".errors").html("")
				$.each(errors, function (i, val) { 
					$(".errors").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				$("main").html(`
				<h1>Indirizzo aggiornato con successo!</h1>
				<form action="userAddress.php">
					<input type="submit" value="Torna al profilo" />
				</form>`);
			}
		}

		$.post("../../ApiAJAX/UserProfile/modifyUserAddressCheck.php", UserData, ManageUpdate, "json");
	});

	$(":submit[name='undo']").click(function() {
		window.location = "userAddress.php";
	});
});