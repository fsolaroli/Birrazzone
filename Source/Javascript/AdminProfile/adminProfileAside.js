$(function () {
	$("aside").html(`
		<ul>
			<li><a href="adminNotifications.php">Notifiche</a></li>
			<li><a href="breweryList.php">Birrifici</a></li>
			<li><a href="../../ApiAJAX/Utils/adminLogOut.php">Log&nbsp;Out</a></li>
		</ul>`);

	if ($("header img[alt='Notification']").html()!=null) {
		$("aside > ul > li:first-of-type").addClass("notification");
	} else {
		$("aside > ul > li:first-of-type").removeClass("notification");
	}

	$("aside").hide();
});
