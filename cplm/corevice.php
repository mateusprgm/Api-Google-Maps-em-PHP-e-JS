
<?php $crs = "cplm/resultado.php";?>
<script>

function cmphr(hora1){

    hora1 = hora1.split(":");
    var d = new Date();
    var data1 = new Date(d.getFullYear(), d.getMonth(), d.getDate(), hora1[0], hora1[1]);
    var hora = new Date(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), d.getMinutes()); 

    return data1 < hora;
};
var customLabel = {
    restaurant: {
      label: 'R'
    },
  bar: {
    label: 'B'
  }
};

var infoL; 
var lati;
var map;
var directionsService = new google.maps.DirectionsService();
var info = new google.maps.InfoWindow({maxWidth: 200});
var nomeService;
displayObject = false;
pos = '';
possss = '';

function getPosUser(){
	limit = false; 
	inconsistencia = false;
	//se a variavel estiver setada
	
    

	if (navigator.geolocation) {
	     navigator.geolocation.getCurrentPosition(function(position) {
	     	marker.setMap(null);
	        pos = {
	          lat: position.coords.latitude,
	          lng: position.coords.longitude
	        };

	        

	        var position = new google.maps.LatLng(pos.lat, pos.lng);
	        marker = new google.maps.Marker({
			title: 'VOCÊ',
			icon: 'icons/marker.png',
			position: position});

			if((pos.lat != possss.lat) || (pos.lng != possss.lng)){ 
		    	info.setContent('Location found.');
	        	map.setCenter(marker.position);
	        	inconsistencia = true;
		    }

		    marker.setMap(map);

	        possss = {
	          lat: pos.lat,
	          lng: pos.lng
	        };

			//marker.setMap(map);
	        

	        


		}, 
		function() {
		        handleLocationError(true, infoWindow, map.getCenter());
		});

	}else{
		handleLocationError(false, infoWindow, map.getCenter());
	}
}

setInterval ( function () {
    getPosUser();
}, 10000 );


var marker = new google.maps.Marker({
 title: 'VOCÊ'
});

function initialize() {
	  var options = {
			 zoom: 15,
			center: marker.position,
			mapTypeId: google.maps.MapTypeId.ROADMAP
			
			
	  };
	  map = new google.maps.Map($('#map_content')[0], options);


	  google.maps.event.addListener(marker, 'click', function() {

	  }); 
	  var infoWindow = new google.maps.InfoWindow;
	  downloadUrl('<?php echo $crs;?>', function(data) {
		  var xml = data.responseXML;
		  var markers = xml.documentElement.getElementsByTagName('marker');
		  Array.prototype.forEach.call(markers, function(markerElem) {
			  var name = markerElem.getAttribute('name');
			  var pedido = markerElem.getAttribute('pedido');
			  var servico = markerElem.getAttribute('servico');
			  var permissao = markerElem.getAttribute('permissao');
			  var promocao = markerElem.getAttribute('promocao');
			  var descricao = markerElem.getAttribute('descricao');
			  var promodesc = markerElem.getAttribute('promodesc');
			  var timeopen = markerElem.getAttribute('timeopen');
			  var timeclose = markerElem.getAttribute('timeclose');
			  var cel = markerElem.getAttribute('cel');
			  var type = "b";
			  var local = markerElem.getAttribute('local');
			  local = local.split(",");
			  var lat = local[0]; 
			  var lng = local[1];
			  var point = new google.maps.LatLng(lat, lng);    
			  var infowincontent = document.createElement('div');
			  var strong = document.createElement('strong');
			  strong.style.cssText = "font-size: 18px;";
			  var strong1 = document.createElement('text');
			  strong1.style.cssText = "font-size: 18px;";
			  strong.textContent = name 
			  infowincontent.appendChild(strong);
			  infowincontent.appendChild(document.createElement('br'));

			  if(permissao != ''){
			  	 strong1.textContent = 'Tel: '+cel
			   	 infowincontent.appendChild(strong1);
				 infowincontent.appendChild(document.createElement('br'));
			  }
			  
			  var text = document.createElement('text');
			  text.style.cssText = "font-size: 18px;";
			  text.textContent = 'Seguimento: '+servico
			  infowincontent.appendChild(text);
			  infowincontent.appendChild(document.createElement('br'));

			  if(descricao != ''){
			  	  var desctext = document.createElement('text');
				  desctext.style.cssText = "font-size: 18px;";
				  desctext.textContent = 'Descrição: '+descricao
				  infowincontent.appendChild(desctext);
				  infowincontent.appendChild(document.createElement('br'));
			  }
			  
			  if(promodesc != ''){
			  	  var descpromo = document.createElement('text');
				  descpromo.style.cssText = "font-size: 18px;";
				  descpromo.textContent = 'Promoções: '+promodesc
				  infowincontent.appendChild(descpromo);
				  infowincontent.appendChild(document.createElement('br'));
			  }
			  

			  var icon = customLabel[type] || {};
			  if(pedido != 'on'){
			  	 if (cmphr(timeopen) && !cmphr(timeclose)){
			  		 icon = 'icons/aberto.png';
			  	 }else{
			  		 icon = 'icons/fechado.png';
			  	 };
			  }else{
			  	 icon = 'icons/p.png';
			  };


			  if(promo != '' && promo == 'APENAS SERVIÇOS') { 
			  		if(pedido == ''){
						restrict();
			  		}
					 
			  }else
			  if(promo != '' && promo == 'PEDIDO DE SERVIÇO') { 
			  		if(pedido != ''){
	  					if(abrt != ''){
	  						if (cmphr(timeopen) && !cmphr(timeclose)){
						  		if(servico == "<?php echo $servicoF;?>"){
								 	criarMarkers();			
								}else if("<?php echo $servicoF?>" == ''){
								 	criarMarkers();
								};
						}}
						else{
							
							if(servico == "<?php echo $servicoF;?>"){
							 	criarMarkers();			
							}else if("<?php echo $servicoF?>" == ''){
							 	criarMarkers();
							};
						}
			  		} 
			  }else
			  if(promo != '' && promo != 'PEDIDO DE SERVIÇO') { 
			  		if(promocao != ''){
	  					restrict();
			  		}
			  }else 
			  	restrict();


			function criarMarkers(){
				var marker = new google.maps.Marker({
				     map: map,
				     position: point,
					 icon : icon,
					 title: servico
				});
				marker.addListener('click', function() {
				    infoWindow.setContent(infowincontent);
				    infoWindow.open(map, marker);
				    document.getElementById("info").value = marker.position;
				    nomeService = servico;
				    $('#submit').click();
				    marker.setAnimation(google.maps.Animation.BOUNCE);
			  	});

			};

			function restrict(){
				if(abrt != ''){
				if(pedido == ''){ 

						
					
					if (cmphr(timeopen) && !cmphr(timeclose)){
				  		if(servico == "<?php echo $servicoF;?>"){
						 	criarMarkers();			
						}else if("<?php echo $servicoF?>" == ''){
						 	criarMarkers();
						};
					}}}
					else{
						
						if(servico == "<?php echo $servicoF;?>"){
						 	criarMarkers();			
						}else if("<?php echo $servicoF?>" == ''){
						 	criarMarkers();
						};
					}
			}

		});
	});
}
function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() {}

function addMarker(location, map) {
    var marker = new google.maps.Marker({
      position: location,
      label: labels[labelIndex++ % labels.length],
      map: map
    });
}
$('#selecionar').click(function(){
	var form = $("#form_route");
	form.submit();
});
var tempo;
$(document).ready(function() {  	
	$('#submit').click(function() {
		stopInterval = setInterval ( function () {
			direcUser();
		}, 1000 );
directionsDisplay = false;

function direcUser(){
		route1 = false;
		

		infoL = document.getElementById("info").value;
		infoL = infoL.substr(0,(infoL.length - 1));
		infoL = infoL.substr(1,(infoL.length - 1));

		info.close();

		    
	

		directionsDisplay = new google.maps.DirectionsRenderer({

			polylineOptions: {
		      	strokeColor: '#00B3FD',
				strokeOpacity: 0.8,
				strokeWeight: 5,
				title: 'oi'
				
				
		    }

		}
		);
		var request = {
				origin: marker.position,
				destination: infoL,
				travelMode: google.maps.DirectionsTravelMode.DRIVING,
				unitSystem: google.maps.UnitSystem.METRIC  
		};
		 //console.log(request.unitSystem);

		infoL = infoL.split(",");
			  var la = infoL[0]; 
			  var ln = infoL[1];

		 var positionDest = new google.maps.LatLng(la, ln);
		 distance = google.maps.geometry.spherical.computeDistanceBetween(marker.position, positionDest);
		 distt = ((distance.toFixed(0))/1000)+" ";
		 distt = distt.split(".");
		 dg1 = distt[0];
		 dg2 = distt[1];
		 dres = "";
		

		if(dg1 == 0){
			dres = dg2+" m";
		}else{
			dg2 = dg2.substring(0,1);
			dres = dg1+","+dg2+" Km";
		}
	

		document.getElementById('dres').innerHTML = dres;

		
			    
			
		//directionsDisplay.setMap(null); 


		directionsService.route(request, function(response, status) {	
		// clear direction from the map
	
			if (status == google.maps.DirectionsStatus.OK) {

				directionsDisplay.setOptions( { suppressMarkers: true } );
				
				if(inconsistencia == true){ 
			    	directionsDisplay.setMap(map);
			    	stopInterval = setInterval ( function () {
						direcUser();
					}, 1000 );
			    }else{ 
			    	
			    	if(route1 == false){
			    		directionsDisplay.setMap(map);
			    		route1 = true;
			    		console.log("é igual");
			    		clearInterval(stopInterval);
			    	}
			    	
			    }
				

				directionsDisplay.setDirections(response);
				if(displayObject){
			        displayObject.setMap(null);
			    }

				displayObject = directionsDisplay;
				//console.log(displayObject);
			}	

		});
}
		return false;
	});	
	$('#servico').change(function(){
		var form = $("#form_servicos");
		form.submit();
	});	
	$('#servicoOnline').change(function(){
		var form = $("#form_servicos");
		form.submit();
	});
	$('#servicoPromo').change(function(){
		var form = $("#form_servicos");
		form.submit();
	});
	
});
function exal(){
	var senha;
	senha =  document.getElementById('senha').value;
	document.getElementById('senha1').value = '';
	document.getElementById('senha1').value = senha;
	document.getElementById('senha2').value = senha;

	var login;
	login =  document.getElementById('login').value;
	document.getElementById('login1').value = '';
	document.getElementById('login1').value = login;
	document.getElementById('login2').value = login;
	

}

</script>