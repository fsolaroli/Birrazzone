$(function() {
	$(":submit").click(function() {
		let LoginData = {
			email: $("input[name='email']").val(),
			pw: $("input[name='pw']").val()
		}
		
		let ManageLogin = function (error) {
			if (error != null) {
				$(".error").html("<p><strong>Attenzione, e-mail o password errati</strong></p>");
			} else {
				Windows.location("../../Site/Home/home.php");
			}
		}

		$.post("../../ApiAJAX/Login/loginCheck.php", LoginData, ManageLogin, "json");
	});
});