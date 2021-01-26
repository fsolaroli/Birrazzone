$(function() {
	$(":submit[name='add']").click(function(e) {
		$.post("../../ApiAJAX/ProductPage/addBeerToCart.php",
			{	
				BeerQt: $("input[name='quantity']").val(),
				IdProduct: $("#productId").text()
			}, function(error){
				if(error != null){
					$(".errors").html("<p><strong>QUANTITA' NON VALIDA</strong></p>");
				} else {
					window.location="../ShoppingCart/userShoppingCart.php"
				}
			}, "json"
		);
	});

	$(":submit[name='toLogin']").click(function (e) {
		e.preventDefault();
		window.location = "../Login/login.php?productId=" + $("#productId").text() + ",quantity=" + $("input[name='quantity']").val();
	});
});