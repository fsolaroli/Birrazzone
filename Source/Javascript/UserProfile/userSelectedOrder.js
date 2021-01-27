$(function() {
	$("div.redo-order > button").click(function() {
		let OrderData = {
			orderId: $("h2").text().split(" ")[1]
		}
		let ManageOrder = function(errors) {
			if(errors!=null) {
				$(".errors > ul").html("<li><strong>"+errors+"</strong></li>");	 
			} else {
				window.location = "../ShoppingCart/userShoppingCart.php";
			}
		}

		$.post("../../ApiAJAX/UserProfile/userSelectedOrderCheck.php", OrderData, ManageOrder, "json");
	});
});