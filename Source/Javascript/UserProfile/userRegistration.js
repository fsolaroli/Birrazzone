$(function() {
	$(":submit").click(function() {
		let UserData = {
			name: $("input[name='name']").val(),
			email: $("input[name='email']").val(),
			pw: $("input[name='pw']").val(),
			confirmpw: $("input[name='confirmpw']").val(),
			confirmage: $("input[name='adultconfirmation']").val().checked
		}

		let ManageRegistration = function(errors) {
			if(errors!=null) {
				$(".errors").html("")
				$.each(errors, function (i, val) { 
					$(".errors").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				$("main").html(`
				<h1>Ti sei registrato con successo! Benvenuto su Birrazzone!</h1>
				<form action="../Home/home.php">
					<input type="submit" value="Vai alla home" />
				</form>`);
			}
		}

		$.post("../../ApiAJAX/UserProfile/userRegistrationCheck.php", UserData, ManageRegistration, "json");
	});
});