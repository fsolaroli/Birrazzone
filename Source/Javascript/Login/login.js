$(function() {
	$(":submit").click(function() {
		let login = null;
		let productId = null;
		let quantity = null;
		if($("p#loginFromCart").html() != null) {
			login = "cart";
		} else if($("p#loginFromProductPage").html() != null) {
			login = "productPage";
			let data = $("p#loginFromProductPage").text().split(" ");
			productId = data[0];
			quantity = data[1];
		}

		let LoginData = {
			email: $("input[name='email']").val(),
			pw: $("input[name='pw']").val(),
			login: login,
			productId: productId,
			quantity: quantity
		}
		
		let ManageLogin = function (data) {
			if (data[0] != null) {
				$(".errors").html("<p><strong>E-MAIL O PASSWORD ERRATI</strong></p>");
			} else {
				if (data[1] == "u") {
					if (data[2] == "profile") {
						window.location = "../UserProfile/userNotifications.php";
					} else if (data[2] == "cart") {
						window.location = "../ShoppingCart/userShoppingCart.php";
					} else if (data[2] == "productPage") {
						window.location = "../ProductPage/productPage.php?id=" + data[3] + "&quantity=" + data[4];
					}
				} else {
					window.location = "../SellerProfile/sellerNotifications.php";
				}
			}
		}

		$.post("../../ApiAJAX/Login/loginCheck.php", LoginData, ManageLogin, "json");
	});
});