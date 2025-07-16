
function LStock(param){

	$.ajax({
		url: "../libs/f.stock.php",
		type: "GET",
		data: {"action" : "LStock", "param" : param}
		
	}).done(function(response){
		
		var jsonData = JSON.parse(response);
		
			$('#tbl_stock').html(jsonData.rhtml);
		
	});

	
}


