$(function() {
	$(":submit").click(function() {
		let login = false;
		if($("p#loginFromCart").html() != null) {
			login = true;
		}

		let LoginData = {
			email: $("input[name='email']").val(),
			pw: $("input[name='pw']").val(),
			loginFromCart: login
		}

		console.log(JSON.stringify(LoginData))
		
		let ManageLogin = function (data) {
			if (data[0] != null) {
				$(".errors").html("<p><strong>E-MAIL O PASSWORD ERRATI</strong></p>");
			} else {
				if (data[1] == "u" && data[2] == "profile") {
					window.location = "../UserProfile/userNotifications.php";
				} else if (data[1] == "u" && data[2] == "cart") {
					window.location = "../ShoppingCart/userShoppingCart.php";
				} else {
					window.location = "../SellerProfile/sellerNotifications.php";
				}
			}
		}

		$.post("../../ApiAJAX/Login/loginCheck.php", LoginData, ManageLogin, "json");
	});
});