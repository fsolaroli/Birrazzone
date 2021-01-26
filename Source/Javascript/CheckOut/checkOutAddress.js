$(function() {

	$("[class=modify]").click(function() {
		window.location = "../ShoppingCart/modifyCheckOutAddress.php";
	});

	$("[class=back]").click(function() {
		$_SESSION["addressId"] = null;
		$_SESSION["Scadenza"] = null;
		$_SESSION["NomeTitolare"] = null;
		$_SESSION["CVV"] = null;
		$_SESSION["NumeroCarta"] = null;
		$_SESSION["PrezzoCarrello"] = null;
		window.location = "../ShoppingCart/userShoppingCart.php";
	});
	
	$("[class=forward]").click(function() {
		window.location = "../ShoppingCart/checkOutPayment.php";
	});

});