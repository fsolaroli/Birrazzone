$(function () {
	$("nav").html(`
		<ul>
			<li><a href="adminNotifications.php">Notifiche</a></li>
			<li><a href="breweryList.php">Birrifici</a></li>
			<li><a href="../../ApiAJAX/Utils/adminLogOut.php">Log&nbsp;Out</a></li>
		</ul>`);

	if ($("header img[alt='Notification']").html()!=null) {
		$("nav > ul > li:first-of-type").addClass("notification");
	} else {
		$("nav > ul > li:first-of-type").removeClass("notification");
	}

	$("nav").hide();
});
