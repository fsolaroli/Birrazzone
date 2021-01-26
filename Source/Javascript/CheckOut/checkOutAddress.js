$(function() {

	$("[class=modify]").click(function() {
		window.location = "../ShoppingCart/modifyCheckOutAddress.php";
	});

	$("[class=back]").click(function() {
		window.location = "../ShoppingCart/userShoppingCart.php";
	});
	
	$("[class=forward]").click(function() {
		window.location = "../ShoppingCart/checkOutPayment.php";
	});

});