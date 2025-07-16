
function LClosures(param){

	$.ajax({
		url: "../libs/f.closures.php",
		type: "GET",
		data: {"action" : "LClosures", "param" : param}
		
	}).done(function(response){
		
		////console.log(response);
		
		var jsonData = JSON.parse(response);
		
		
			$('#tbl_closures').html(jsonData.rhtml);
		
	});

	
}


function SaveClosure(idClosure,nameClosure,serialClosure,typeClosure,ptosClosure,estaClosure,mpioClosure,zoneClosure,latClosure,lonClosure,notesClosure){
	
	
	

	$.ajax({
		url: "../libs/f.closures.php",
		type: "GET",
		data: {"action" : "SaveClosure", "idClosure" : idClosure, "nameClosure" : nameClosure, "serialClosure" : serialClosure, "typeClosure" : typeClosure, "ptosClosure" : ptosClosure, "estaClosure" : estaClosure, "mpioClosure" : mpioClosure, "zoneClosure" : zoneClosure, "latClosure" : latClosure, "lonClosure" : lonClosure, "notesClosure" : notesClosure}
		
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



function fetch_data(param){
	var response = '';
	$.ajax({
		url: "../libs/f.closures.php",
		type: "GET",
		data: {"action" : "LClosuresMarks", "param" : param},
	  async: false,
	  success : function(text){
		response = text;
	  }
	});

	return response;

  }