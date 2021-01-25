$(function(){

	$("button#add").click(function(e) {
		$("input#qt").attr("value", function(i, val) {
			$.post("../../ApiAJAX/ProductPage/addBeerToCart.php",{	BeerQt: val,
																	MaxQt: $(this).attr("max"),
																	IdProduct: $("button#add").attr("id").split(" ")[1]}, 
																	function(data){
					if(data){
						window.location = "../ShoppingCart/shoppingCart.php";
					}else{
						$(".errors").html("<p><strong>QUANTITA' NON VALIDA, INSERISCI UNA Q.TA TRA 0 E "+val+"</strong></p>");
					}
			});
		});
	});

});