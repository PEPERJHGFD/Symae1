
function LSites(param){

	$.ajax({
		url: "../libs/f.sites.php",
		type: "GET",
		data: {"action" : "LSites", "param" : param}
		
	}).done(function(response){
		
		
		var jsonData = JSON.parse(response);
		
		
			$('#tbl_sites').html(jsonData.rhtml);
		
	});

	
}


function SaveSite(idSite,nameSite,typeSite,locaSite,mpioSite,edoSite,latSite,lonSite){
	
	
	
	$.ajax({
		url: "../libs/f.sites.php",
		type: "GET",
		data: {"action" : "SaveSite", "idSite" : idSite, "nameSite" : nameSite, "typeSite" : typeSite, "locaSite" : locaSite, "mpioSite" : mpioSite, "edoSite" : edoSite, "latSite" : latSite, "lonSite" : lonSite}
		
	}).done(function(response){
		
	
		
		
		var jsonData = JSON.parse(response);
		
		if (jsonData.code === "0") {
			
			$.alert({
    title: 'Respuesta',
				type: 'green',
    content: jsonData.dcode,
				buttons: {

					Cerrar: {
						text: 'Cerrar',
						btnClass: 'btn-blue',
						action: function(){
							
							parent.location.reload();

						}}





        
    }
});
			
			
			
			
			
		}else{
			
			
			$.alert({
    title: 'Error',
				type: 'red',
    content: jsonData.dcode,
				buttons: {
        Cerrar: function(){

			parent.location.reload();
        }
    }
});
			
		}
		
		
	});
	
	
	
	
	
}

