const UPLOAD_DIR = "../../../../Uploads/";

function uploadImage(destination) {
	let formData = new FormData();
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