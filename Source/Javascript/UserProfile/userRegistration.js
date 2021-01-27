$(function() {
	$(":submit").click(function() {
		let UserData = {
			name: $("input[name='name']").val(),
			email: $("input[name='email']").val(),
			pw: $("input[name='pw']").val(),
			confirmpw: $("input[name='confirmpw']").val(),
			confirmage: $("input[name='adultconfirmation']:checked").val()
		}

		let ManageRegistration = function(errors) {
			if(errors!=null) {
				$(".errors > ul").html("")
				$.each(errors, function (i, val) { 
					$(".errors > ul").append("<li><strong>"+val+"</strong></li>");	 
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