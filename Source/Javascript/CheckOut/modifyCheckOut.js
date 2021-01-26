$(function() {

	$("[class=modifyAddress]").click(function() {
		window.location = "../ShoppingCart/modifyCheckOutAddress.php";
	});

	$("[class=modifyPayment]").click(function() {
		window.location = "../ShoppingCart/checkOutPayment.php";
	});
	
	$("[class=undo]").click(function() {
		window.location = "../ShoppingCart/userShoppingCart.php";
	});

	$("[class=conclude]").click(function() {
		$.post("../../ApiAJAX/ShoppingCart/setSessionVar.php");
		window.location = "../ShoppingCart/orderConcluded.php";
	});

});