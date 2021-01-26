$(function() {

	$("[class=undo]").click(function() {
		$.post("../../ApiAJAX/ShoppingCart/cancelOrder.php");
		window.location = "../ShoppingCart/userShoppingCart.php";
	});

});