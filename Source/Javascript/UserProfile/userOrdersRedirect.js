$(function() {
	$("ul.orders > li > div > button.modify").click(function() {
		let orderId = $(this).attr("id");
		window.location = "userSelectedOrder.php?orderId=" + orderId;
	});
})
