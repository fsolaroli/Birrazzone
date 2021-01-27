const UPLOAD_DIR = "../../../../Uploads/";

function uploadImage(destination) {
	let formData = new FormData();
	if ($(":file")[0].files["length"] == 0) {
		$("form > ul > li > img").attr("src", "");
	} else {
		formData.append("image", $(":file")[0].files[0]);
		formData.append("destination", destination);
		$.ajax({
			url : '../../ApiAJAX/Utils/imageUpload.php',
			type : 'POST',
			data : formData,
			processData: false,  // tell jQuery not to process the data
			contentType: false,  // tell jQuery not to set contentType
			success : function (data) {
				data = JSON.parse(data);
				if (data["Errors"].length != 0) {
					$(".imageErrors").html("");
					data["Errors"].forEach(error => {
						$(".imageErrors").append("<p><strong>" + error + "</strong></p>");	 
					});
				} else {
					$("form > ul > li > img").attr("src", UPLOAD_DIR + destination + "/" + data["Name"]);
					$("form > ul > li > img").show();
				}
			}
		});
	}
}

function manageNotification() {

	$("ul > li > div:nth-of-type(2)").hide();

	$("ul > li > div > img[alt*='expande']").click(function (e) { 
		let notificationId = $(this).attr("alt").split(" ")[1];

		$("ul > li#" + notificationId + " > div:nth-of-type(2)").show("slide");
		$(this).hide();
		$("ul > li#" + notificationId + " > div > img[alt*='collapse']").show();		
	});
	
	$("ul > li > div > img[alt*='collapse']").click(function (e) { 
		let notificationId = $(this).attr("alt").split(" ")[1];

		$("ul > li#" + notificationId + " > div:nth-of-type(2)").hide("slide");
		$(this).hide();
		$("ul > li#" + notificationId + " > div > img[alt*='expande']").show();
	});

	$("ul > li > div > button").click(function (e) { 
		notificationId = $(this).attr("class").split(" ")[1];
		$.post("../../ApiAJAX/Utils/readNotification.php", { notificationId: notificationId},
			function () {
				$("li#" + notificationId).hide();
			}
		);
	});
}

function manageAdminNotification() {

	$("ul > li > div:nth-of-type(2)").hide();

	$("ul > li > div > img[alt*='expande']").click(function (e) { 
		let notificationId = $(this).attr("alt").split(" ")[1];

		$("ul > li#" + notificationId + " > div:nth-of-type(2)").show("slide");
		$(this).hide();
		$("ul > li#" + notificationId + " > div > img[alt*='collapse']").show();		
	});
	
	$("ul > li > div > img[alt*='collapse']").click(function (e) { 
		let notificationId = $(this).attr("alt").split(" ")[1];

		$("ul > li#" + notificationId + " > div:nth-of-type(2)").hide("slide");
		$(this).hide();
		$("ul > li#" + notificationId + " > div > img[alt*='expande']").show();
	});

	$("ul > li > button.accept").click(function (e) { 
		let id = $(this).attr("class").split(" ")[1];
		console.log($("li#" + id + " > div:nth-of-type(2) > ul > li:nth-of-type(2) > span:nth-of-type(2)").text());
		$.post("../../ApiAJAX/Utils/acceptSellerRequest.php", { IdBirrificio: id , EmailBirrificio: $("li#" + id + " > div:nth-of-type(2) > ul > li:nth-of-type(2) > span:nth-of-type(2)").text() },
			function (token) {
				console.log("http://localhost/Progetto/Source/Php/Site/SellerProfile/sellerRegistrationConfermation.php?token="+token);
			}, "json");
		$("li#" + id).hide();
	});

	$("ul > li > button.reject").click(function (e) {
		let id = $(this).attr("class").split(" ")[1];
		$.post("../../ApiAJAX/Utils/refuseSellerRequest.php", { IdBirrificio: id},
			function () {
				$("li#" + id).hide();
			});
	});
}