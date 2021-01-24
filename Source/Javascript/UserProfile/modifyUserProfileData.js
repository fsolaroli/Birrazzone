$(function() {
	$(":submit[name='update']").click(function() {
		let UserData = {
			name: $("input[name='name']").val(),
			email: $("input[name='email']").val(),
			pw: $("input[name='pw']").val(),
			confirmpw: $("input[name='confirmpw']").val()
		}

		let ManageUpdate = function(errors) {
			if(errors!=null) {
				$(".errors").html("")
				$.each(errors, function (i, val) { 
					$(".errors").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				$("main").html(`
				<h1>Dati aggiornati con successo!</h1>
				<form action="userProfileData.php">
					<input type="submit" value="Torna al profilo" />
				</form>`);
			}
		}

		$.post("../../ApiAJAX/UserProfile/modifyUserProfileDataCheck.php", UserData, ManageUpdate, "json");
	});

	$(":submit[name='undo']").click(function() {
		window.location = "userProfileData.php";
	});
});