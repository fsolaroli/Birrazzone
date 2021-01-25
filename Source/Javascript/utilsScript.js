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
		$("ul > li > div > img[alt*='collapse']").show();		
	});
	
	$("ul > li > div > img[alt*='collapse']").click(function (e) { 
		let notificationId = $(this).attr("alt").split(" ")[1];

		$("ul > li#" + notificationId + " > div:nth-of-type(2)").hide("slide");
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
}

	function manageAdminNotification() {

		$("ul > li > div:nth-of-type(2)").hide();
	
		$("ul > li > div > img[alt*='expande']").click(function (e) { 
			let notificationId = $(this).attr("alt").split(" ")[1];
	
			$("ul > li#" + notificationId + " > div:nth-of-type(2)").show("slide");
			$(this).hide();
			$("ul > li > div > img[alt*='collapse']").show();		
		});
		
		$("ul > li > div > img[alt*='collapse']").click(function (e) { 
			let notificationId = $(this).attr("alt").split(" ")[1];
	
			$("ul > li#" + notificationId + " > div:nth-of-type(2)").hide("slide");
			$(this).hide();
			$("ul > li > div > img[alt*='expande']").show();
		});
	
		$("ul > li > div > button.accept").click(function (e) { 
			$.post("../../ApiAJAX/Utils/acceptSellerRequest.php", { IdBirrificio: $(this).attr("id").split(" ")[1],
																	EmailBirrificio: $(this).attr("class").split(" ")[1]},
				function (token) {
					console.log(`http://localhost/Progetto/Source/Php/Site/SellerProfile/sellerRegistrationConfermation.php?token=`+token);
					location.reload();
				}, "json");
		});

		$("ul > li > div > button.delete").click(function (e) { 
			$.post("../../ApiAJAX/Utils/refuseSellerRequest.php", { IdBirrificio: $(this).attr("id").split(" ")[1]},
				function () {
					location.reload();
				});
		});
}