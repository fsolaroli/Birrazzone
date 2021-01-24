function generateBrewery(dataBrewery){
	let list = "";
	for(let i=0; i < dataBrewery.length; i++){
		let brewery= `
		<li>
			${dataBrewery[i]["NomeBirrificio"]} <a href="singleBrewery.php?id=${dataBrewery[i]["Idbirrificio"]}"><button>Visualizza</button> </a>
		</li>
		`;
		list += brewery;
	}
	return list;
}

$(document).ready(function(){
	$.getJSON("../../ApiAJAX/AdminProfile/api-breweries.php", function(data){
		let brewery = "";
		if(data.length == 0){
			brewery = `<h2>Non ci sono birrifici iscritti al momento</h2>`;
		}else{
			brewery = generateBrewery(data);
		}
		$("ul#brewerylist").append(brewery);
	});
});
