$(function () {
	$("ul > li > div > img[alt*='expande']").click(function (e) { 
		let notificationId = $(this).attr("alt").split(" ")[1];

		$("ul > li#" + notificationId + " > div:nth-of-type(2)").show();
		$(this).hide();
		$("ul > li > div > img[alt*='collapse']").show();		
	});
	
	$("ul > li > div > img[alt*='collapse']").click(function (e) { 
		let notificationId = $(this).attr("alt").split(" ")[1];

		$("ul > li#" + notificationId + " > div:nth-of-type(2)").hide();
		$(this).hide();
		$("ul > li > div > img[alt*='expande']").show();
	});

	$("ul > li > div > button").click(function (e) { 
		$.post("../../ApiAJAX/Utils/readNotification.php", { notificationId: $(this).attr("id").split(" ")[1]},
			function () {
				location.reload();
			}
		);
		
	});

})