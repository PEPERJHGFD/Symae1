
function SaveUsuPass(id,pass){

	$.ajax({
		url: "../libs/f.users.php",
		type: "GET",
		data: {"action" : "SaveUsuPass", "id" : id, "pass" : pass}
		
	}).done(function(response){
		
	
		
		
		var jsonData = JSON.parse(response);
		
		if (jsonData.code === "0") {
			
			$.alert({
    title: 'Respuesta',
				type: 'green',
    content: jsonData.dcode,
				buttons: {
        ok: function(){
			parent.location.reload();
        }
    }
});
			
			
			
			
			
		}else{
			
			
			One.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: jsonData.dcode});
			
		}
		
		
	});
	
	
	
}


function SaveUsuEdit(id,nom,ape,correo,tel,nivel){
	
	$.ajax({
		url: "../libs/f.users.php",
		type: "GET",
		data: {"action" : "SaveUsuEdit", "id" : id, "nom" : nom, "ape" : ape, "correo" : correo, "tel" : tel, "nivel" : nivel}
		
	}).done(function(response){
		
	
		
		
		var jsonData = JSON.parse(response);
		
		if (jsonData.code === "0") {
			
			$.alert({
    title: 'Respuesta',
				type: 'green',
    content: jsonData.dcode,
				buttons: {
        ok: function(){
			parent.location.reload();
        }
    }
});
			
			
			
			
			
		}else{
			
			
			One.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: jsonData.dcode});
			
		}
		
		
	});
	
	
}



function GetUsu(id){
	
	
	$.ajax({
		url: "../libs/f.users.php",
		type: "GET",
		data: {"action" : "GetUsu", "id" : id}
		
	}).done(function(response){
		
		
		var jsonData = JSON.parse(response);
		
		$('#txt-usu-id').val(jsonData.id);
		$('#txt-usu-nom').val(jsonData.nom);
		$('#txt-usu-ape').val(jsonData.ape);
		$('#txt-usu-correo').val(jsonData.correo);
		$('#txt-usu-tel').val(jsonData.tel);
		$('#txt-usu-login').val(jsonData.login);
		
		
		var n1="";
		var n2="";
		var n3="";
		var n4="";
		
		switch(jsonData.nivel){
				
			case '1':
				n1="selected";
				break;
				
				case '2':
				n2="selected";
				break;
				
				case '3':
				n3="selected";
				break;
				
				case '4':
				n4="selected";
				break;
				
						   }
		
		 var shtml='<label for="sel-usu-nivel">Nivel</label>'+
                                        '<select class="custom-select" id="sel-usu-nivel" name="sel-usu-nivel" size="1">'+
                                            '<option value="1" '+n1+'>Adminisrador</option>'+
                                            '<option value="2" '+n2+'>Supervisor</option>'+
                                            '<option value="3" '+n3+'>Oficina</option>'+
                                            '<option value="4" '+n4+'>Ventas</option>'+
                                        '</select>';
		
			$('#Dsel-nivel').html(shtml);
		
		
	});	
			
}


function SaveUsu(nom,ape,correo,tel,nivel,login,pass){
	
	$.ajax({
		url: "../libs/f.users.php",
		type: "GET",
		data: {"action" : "SaveUsu", "nom" : nom, "ape" : ape, "correo" : correo, "tel" : tel, "nivel" : nivel, "login" : login, "pass" : pass}
		
	}).done(function(response){
		
		var jsonData = JSON.parse(response);
		
		if (jsonData.code === "0") {
			
			$.alert({
    title: 'Respuesta',
				type: 'green',
    content: jsonData.dcode,
				buttons: {
        ok: function(){
			parent.location.reload();
        }
    }
});
			
			
			
			
			
		}else{
			
			
			One.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: jsonData.dcode});
			
		}
		
		
	});
	
	
}

function LUsers(param){

	$.ajax({
		url: "../libs/f.users.php",
		type: "GET",
		data: {"action" : "LUsers", "param" : param}
		
	}).done(function(response){
		
		
		var jsonData = JSON.parse(response);
		
		
		
			$('#tbl_users').html(jsonData.rhtml);
		
	});
	
}
