function setAside() {
	$("aside").html(`
		<ul>
			<li><a href="sellerNotifications.php"><button class="buttonMenu">Notifiche</button></a><img src="../../../../Immagini/Icone/Notification.png" alt="Notification"/></li>
			<li><a href="sellerAccountData.php"><button class="buttonMenu">Dati Account</button></a></li>
			<li><a href="sellerProfileData.php"><button class="buttonMenu">Dati Birrificio</button></a></li>
			<li><a href="sellerProducts.php"><button class="buttonMenu">Prodotti</button></a></li>
			<li><a href="../../ApiAJAX/Utils/logOut.php"><button class"logOut">Log Out</button></a></li>
		</ul>
	`);
	if ($("header > img[alt='Notification']").html()!=null) {
		$("aside > ul > li:first-of-type > img").show();
	} else {
		$("aside > ul > li:first-of-type > img").hide();
	}
	$("aside").hide();

}

function showAside() {
	if($("aside").is(":hidden")) {
		$("aside").show('slide'); //TODOMAYBE add animations
	} else {
		$("aside").hide('slide');
	}
}

$(function () {
	setAside();
	$("header > img[alt='Menu']").click(showAside);
});
