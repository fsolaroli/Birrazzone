$(function() {
	$("button").click(function() {
		let OrderData = $("h2").text().split(" ")[1]
		let ManageOrder = function(errors) {
			if(errors!=null) {
				$(".errors").append("<p><strong>"+val+"</strong></p>");	 
			} else {
				window.location = "userShoppingCart.php";
			}
		}

		$.post("../../ApiAJAX/UserProfile/userSelectedOrderCheck.php", OrderData, ManageOrder, "json");
	});
});