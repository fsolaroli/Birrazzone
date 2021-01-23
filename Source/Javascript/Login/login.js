$(function() {
	$(":submit").click(function() {
		let LoginData = {
			email: $("input[name='email']").val(),
			pw: $("input[name='pw']").val()
		}
		
		let ManageLogin = function (data) {
			if (data[0] != null) {
				$(".error").html("<p><strong>Attenzione, e-mail o password errati</strong></p>");
			} else {
				if (data[1] === "u") {
					window.location = "../UserProfile/userNotifications.php";
				} else {
					window.location = "../SellerProfile/sellerNotifications.php";
				}
			}
		}

		$.post("../../ApiAJAX/Login/loginCheck.php", LoginData, ManageLogin, "json");
	});
});