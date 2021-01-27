$(function() {
	$("ul.orders > li > div > button.modify").click(function() {
		let orderId = $(this).attr("class").split(" ")[1];
		window.location = "userSelectedOrder.php?orderId=" + orderId;
	});
})
