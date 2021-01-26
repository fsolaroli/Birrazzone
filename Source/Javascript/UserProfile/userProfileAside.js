$(function () {
	$("aside").html(`
		<ul>
			<li><a href="userNotifications.php"><button class="buttonMenu">Notifiche</button></a></li>
			<li><a href="../ShoppingCart/userShoppingCart.php"><button class="buttonMenu">Carrello</button></a></li>
			<li><a href="userProfileData.php"><button class="buttonMenu">Dati&nbsp;Account</button></a></li>
			<li><a href="userAddress.php"><button class="buttonMenu">Indirizzo</button></a></li>
			<li><a href="userOrders.php"><button class="buttonMenu">Ordini</button></a></li>
			<li><a href="../../ApiAJAX/Utils/logOut.php"><button class="logOut">Log Out</button></a></li>
		</ul>`);

	if ($("header img[alt='Notification']").html()!=null) {
		$("aside > ul > li:first-of-type").addClass("notification");
	} else {
		$("aside > ul > li:first-of-type").removeClass("notification");
	}

	$("aside").hide();
});
