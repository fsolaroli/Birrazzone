function generateBrewery(dataBrewery){
	let list = "";
	for(let i=0; i < dataBrewery.length; i++){
		let brewery= `<li><span></span><span>` + dataBrewery[i]["NomeBirrificio"] + `</span><button class="` + dataBrewery[i]["IdBirrificio"] + `">Visualizza</button></li>`;
		list += brewery;
	}
	return list;
}

$(function(){
	$.getJSON("../../ApiAJAX/AdminProfile/api-breweries.php", function(data){
		let brewery = "";
		if(data.length == 0){
			brewery = `<h2>Non ci sono birrifici iscritti al momento</h2>`;
		}else{
			brewery = generateBrewery(data);
		}
		$("ul#brewerylist").append(brewery);
	});
	$("#brewerylist button").click(function(e) {
		e.preventDefault();
		window.location = "singleBrewery.php?id=" + $(this).attr("class").split(" ")[1];	
	});
});
