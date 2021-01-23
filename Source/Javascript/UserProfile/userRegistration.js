$(function() {
	$(":submit").click(function() {
		let UserData = {
			name: $("input[name='name']").val(),
			email: $("input[name='email']").val(),
			pw: $("input[name='pw']").val(),
			confirmpw: $("input[name='confirmpw']").val(),
			confirmage: $("input[name='adultconfirmation']").val()
		}

		let ManageRegistration = function(errors) {
			if(errors!=null) {
				$(".errori").html("")
				$.each(errors, function (i, val) { 
					$(".errori").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				$("main").html(`
				<h1>Ti sei registrato con successo! Benvenuto su Birrazzone!</h1>
				<form action="home.php">
					<input type="submit" value="Vai alla home" />
				</form>`);
			}
		}

		$.post("../../ApiAJAX/UserProfile/userRegistrationCheck.php", UserData, ManageRegistration, "json");
	});
});