
function LStations(param,iddevice){

	$.ajax({
		url: "../libs/f.stations.php",
		type: "GET",
		data: {"action" : "LStations", "param" : param, "iddevice" : iddevice}
		
	}).done(function(response){
		
		
		var jsonData = JSON.parse(response);
		
		

			$('#tbl_stations').html(jsonData.rhtml);

		
	});

	
}



function LDevicesSelect(iddevice,param){

	$.ajax({
		url: "../libs/f.devices.php",
		type: "GET",
		data: {"action" : "LDevices2", "param" : param, "idsite" : "0"}
		
	}).done(function(response){
		
		////alert(response);
		
		var jsonData = JSON.parse(response);
	

	$('#selectDevices').append($('<option>').text("Todos los Equipos").attr('value', "0"));
		
	$(jsonData["data"]).each(function(){
	
  

  	$('#selectDevices').append($('<option>').text(this.NameDev).attr('value', this.iddev));
	
	
});
		
		///selecciona el valor que se le indique
		$('#selectDevices').val(iddevice);

		$("#selectDevices").trigger("chosen:updated");
			
	
	});
	
}


