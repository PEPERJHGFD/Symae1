
function LONTAutofind(){

	$.ajax({
		url: "../libs/f.ontautofind.php",
		type: "GET",
		data: {"action" : "LONTAutofind"}
		
	}).done(function(response){
		
		var jsonData = JSON.parse(response);

			$('#tbl_ontautofind').html(jsonData.rhtml);

	});

	
}






