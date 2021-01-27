$(function() {

	$("ul.sellerProducts > li > div > button.modify").click(function (e) { 
		window.location = "productPage.php?productId=" + $(this).attr("id");
	});

	$("section > button.modify").click(function (e) { 
		window.location = "newProduct.php";
	});

});