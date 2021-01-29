$(function () {
	$("nav").html(`
		<ul>
			<li><a href="userNotifications.php">Notifiche</a></li>
			<li><a href="../ShoppingCart/userShoppingCart.php">Carrello</a></li>
			<li><a href="userProfileData.php">Dati&nbsp;Account</a></li>
			<li><a href="userAddress.php">Indirizzo</a></li>
			<li><a href="userOrders.php">Ordini</a></li>
			<li><a href="../../ApiAJAX/Utils/logOut.php">Log&nbsp;Out</a></li>
		</ul>`);

	if ($("header img[alt='Notification']").html()!=null) {
		$("nav > ul > li:first-of-type").addClass("notification");
	} else {
		$("nav > ul > li:first-of-type").removeClass("notification");
	}

	$("nav").hide();
});
