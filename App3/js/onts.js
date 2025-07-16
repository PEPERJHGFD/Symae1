
function LONTs(param,iddevice){

	$("#spinner-div").show();

	$.ajax({
		url: "../libs/f.onts.php",
		type: "GET",
		data: {"action" : "LONTs", "param" : param, "iddevice" : iddevice},
		complete: function(){
			$("#spinner-div").hide();
		  },
		
	}).done(function(response){
		
		
		var jsonData = JSON.parse(response);
		
		

			$('#tbl_onts').html(jsonData.rhtml);

		
	});

	
}



function LDevicesSelectONT(iddevice,param){

	$.ajax({
		url: "../libs/f.devices.php",
		type: "GET",
		data: {"action" : "LDevices2", "param" : param, "idsite" : "0"}
		
	}).done(function(response){
		
		////alert(response);
		
		var jsonData = JSON.parse(response);
	

	$('#selectDevicesONT').append($('<option>').text("Todos los Equipos").attr('value', "0"));
		
	$(jsonData["data"]).each(function(){
	
  

  	$('#selectDevicesONT').append($('<option>').text(this.NameDev).attr('value', this.iddev));
	
	
});
		
		///selecciona el valor que se le indique
		$('#selectDevicesONT').val(iddevice);

		$("#selectDevicesONT").trigger("chosen:updated");
			
	
	});
	
}


