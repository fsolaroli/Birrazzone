$(function() {
	console.log("sono vivo")
	$(":submit[name='add']").click(function(e) {
		$.post("../../ApiAJAX/ProductPage/addBeerToCart.php",
			{	
				BeerQt: $("input[name='quantity']").val(),
				IdProduct: $("#productId").text()
			}, function(data){
				if(error == null){
					window.location = "../ShoppingCart/shoppingCart.php";
				} else {
					$(".errors").html("<p><strong>QUANTITA' NON VALIDA, INSERISCI UNA Q.TA TRA 0 E "+val+"</strong></p>");
				}
			});
	});

	$(":submit[name='toLogin']").click(function (e) {
		e.preventDefault();
		window.location = "../Login/login.php?productId=" + $("#productId").text() + ",quantity=" + $("input[name='quantity']").val();
	});
});