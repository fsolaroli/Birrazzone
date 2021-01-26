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
		$_SESSION["addressId"] = null;
		$_SESSION["Scadenza"] = null;
		$_SESSION["NomeTitolare"] = null;
		$_SESSION["CVV"] = null;
		$_SESSION["NumeroCarta"] = null;
		$_SESSION["PrezzoCarrello"] = null;
		$.post("../../ApiAJAX/ShoppingCart/setSessionVar.php");
		window.location = "../ShoppingCart/orderConcluded.php";
	});

});