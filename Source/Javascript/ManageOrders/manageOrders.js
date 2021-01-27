$(function() {
	$("button").click(function() {

		orderId = $(this).attr("class").split(" ")[1];

		let LoginData = {
			orderId: orderId
		}
		
		let ManageLogin = function (data) {
			$("li#" + orderId + " > div:first-of-type > p:nth-of-type(2) > span:last-of-type").text(data["Code"]);
			if (data["Code"] == "CONSEGNATO") {
				$("li#" + orderId).hide();
			}
		}

		console.log(LoginData)

		$.post("../../ApiAJAX/ManageOrders/advanceOrders.php", LoginData, ManageLogin, "json");
	});
});