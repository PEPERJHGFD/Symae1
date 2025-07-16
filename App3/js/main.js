



//// perfiles de velocidad

function LProfileSpeed(){

	$.ajax({
		url: "../libs/f.a.php",
		type: "GET",
		data: {"action" : "LProfileSpeed"}
		
	}).done(function(response){
		
		

		var jsonData = JSON.parse(response);
	

		

	$(jsonData["data"]).each(function(){
	
  $('#profileSecret').append($('<option>').text(this.Name).attr('value', this.Name));

 

	});

		//selecciona el primer valor
		$("#profileSecret").prop('selectedIndex',0);
		
		
		
		$("#profileSecret").trigger("chosen:updated");
		
		
		
	});
	
}



/////



function DoLogin(login,pass){

	$.ajax({
		url: "../libs/f.a.php",
		type: "GET",
		data: {"action" : "DoLogin", "login" : login, "pass" : pass}
		
	}).done(function(respuesta){
		
		
		var jsonData = JSON.parse(respuesta);
		
		
		
		if (jsonData.code === "0") {
			
			location.href = 'index.php';
			
		}else{
			
			
			var rhtml='<br><div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonData.dcode+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			
			

			$('#DError').html(rhtml);
			
			
			
			
		}
		
		
	});


	
	

	
}




function ShowStats(){


	$.ajax({
		url: "../libs/f.a.php",
		type: "GET",
		data: {"action" : "GetStats"}
		
	}).done(function(respuesta){
		
		
		var jsonData = JSON.parse(respuesta);

		$('#activeClients').text(jsonData.activeClients);
		$('#suspendedClients').text(jsonData.suspendedClients);
		$('#activeUsers').text(jsonData.activeUsers);

		$('#activeSites').text(jsonData.activeSites);
		$('#activeDevices').text(jsonData.activeDevices);


		
		

		
		
	});




		
}