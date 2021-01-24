$(function () {
	$("aside").html(`
		<ul>
			<li><a href="userNotifications.php"><button class="buttonMenu">Notifiche</button></a><img id="Aside" src="../../../../Immagini/Icone/Notification.png" alt="Notification"/></li>
			<li><a href="userProfileData.php"><button class="buttonMenu">Dati&nbsp;Account</button></a></li>
			<li><a href="userAddress.php"><button class="buttonMenu">Indirizzo</button></a></li>
			<li><a href="userOrders.php"><button class="buttonMenu">Ordini</button></a></li>
			<li><a href="../../ApiAJAX/Utils/logOut.php"><button class"logOut">Log Out</button></a></li>
		</ul>`);

	if ($("header img[alt='Notification']").html()!=null) {
		$("aside > ul > li:first-of-type > img").show();
	} else {
		$("aside > ul > li:first-of-type > img").hide();
	}

	$("aside").hide();
});
