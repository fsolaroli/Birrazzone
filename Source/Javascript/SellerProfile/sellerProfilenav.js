function setnav() {
	$("nav").html(`
		<ul>
			<li><a href="sellerNotifications.php">Notifiche</a></li>
			<li><a href="sellerAccountData.php">Dati&nbsp;Account</a></li>
			<li><a href="sellerProfileData.php">Dati&nbsp;Birrificio</a></li>
			<li><a href="sellerProducts.php">Prodotti</a></li>
			<li><a href="../../ApiAJAX/Utils/logOut.php">Log&nbsp;Out</a></li>
		</ul>
	`);

	if ($("header img[alt='Notification']").html()!=null) {
		$("nav > ul > li:first-of-type").addClass("notification");
	} else {
		$("nav > ul > li:first-of-type").removeClass("notification");
	}
	$("nav").hide();

}

$(function () {
	setnav();
});
