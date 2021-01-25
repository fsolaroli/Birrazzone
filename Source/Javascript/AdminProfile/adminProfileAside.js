$(function () {
	$("aside").html(`
		<ul>
			<li><a href="breweryList.php"><button class="buttonMenu">Birrifici</button></a></li>
			<li><a href="adminNotifications.php"><button class="buttonMenu">Notifiche</button></a></li>
			<li><a href="../../ApiAJAX/Utils/adminLogOut.php"><button class="buttonMenu">Log Out</button></a></li>
		</ul>`);

	$("aside").hide();
});
