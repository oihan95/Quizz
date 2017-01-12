function ikusiGalderak(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("laukia").innerHTML= xhttp.responseText;
		}
	};
	xhttp.open("GET","showmyquizzes.php", true);
	xhttp.send();
}

function gehituformularioa(){
	var xhttp2 = new XMLHttpRequest();
	xhttp2.onreadystatechange = function(){
		if ((xhttp2.readyState==4)&&(xhttp2.status==200 )){
			document.getElementById("laukia").innerHTML= xhttp2.responseText;
		}
	};
	xhttp2.open("GET","addform.php", true);
	xhttp2.send();
}

function ikusieditatzekogalderak(){
	var xhttp3 = new XMLHttpRequest();
	xhttp3.onreadystatechange = function(){
		if ((xhttp3.readyState==4)&&(xhttp3.status==200 )){
			document.getElementById("laukia").innerHTML= xhttp3.responseText;
		}
	};
	xhttp3.open("GET","showmyqyuizzestoedit.php", true);
	xhttp3.send();
}

function ikusigaldera(id){
	var xhttp4 = new XMLHttpRequest();
	xhttp4.onreadystatechange = function(){
		if ((xhttp4.readyState==4)&&(xhttp4.status==200 )){
			document.getElementById("laukia").innerHTML= xhttp4.responseText;
		}
	};
	xhttp4.open("GET","showspequizz.php?q="+id, true);
	xhttp4.send();
}

function gehitugaldera(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("error").innerHTML= xhttp.responseText;
		}
	};
	var erregistro = document.getElementById('insertquestion');
	var galdera = insertquestion.galdera.value;
	var erantzun = insertquestion.erantzuna.value;
	var level = insertquestion.maila.value;

	var param = "question="+galdera+"&answer="+erantzun+"&level="+level;

	xhttp.open("GET","InsertQuestion.php?"+param, true);
	xhttp.send();
}

function galderakkontatu(){
	var xhttp6 = new XMLHttpRequest();
	xhttp6.onreadystatechange = function(){
		if ((xhttp6.readyState==4)&&(xhttp6.status==200 )){
			document.getElementById("kont").innerHTML= xhttp6.responseText;
		}
	};
	xhttp6.open("GET","countQuizzes.php", true);
	xhttp6.send();
		
}

setInterval(galderakkontatu,5000);

function aztertuposta(eposta){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("soapMail").innerHTML= xhttp.responseText;
		}
	};

	xhttp.open("GET","soapEmail.php?eposta="+eposta, true);
	xhttp.send();	
}

function aztertupasahitza(pass){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("soapPass").innerHTML= xhttp.responseText;
		}
	};
	xhttp.open("GET","egiaztatuPasahitza.php?pass="+pass, true);
	xhttp.send();	
}

function showuser(){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("user").innerHTML= xhttp.responseText;
		}
	};
	xhttp.open("GET","session.php", true);
	xhttp.send();
}

function aztertuticketa(zenb){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("soapTicket").innerHTML= xhttp.responseText;
		}
	};

	xhttp.open("GET","egiaztatuTicketa.php?ticket="+zenb, true);
	xhttp.send();
}

function ikusiGalderaGuztiak(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("laukia").innerHTML= xhttp.responseText;
		}
	};
	xhttp.open("GET","showquizzes.php", true);
	xhttp.send();
}

function editatugaldera(id){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("laukia").innerHTML= xhttp.responseText;
		}
	};
	xhttp.open("GET","editquizz.php?q="+id, true);
	xhttp.send();
}

function balidatulogin(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			if ((xhttp.responseText.localeCompare('reviewingQuizes.php'))==0) {
				window.location.href="reviewingQuizes.php";
			}else if((xhttp.responseText.localeCompare('handlingQuizes.php'))==0){
				window.location.href="handlingQuizes.php";
			}else{
				document.getElementById("laukia").innerHTML= xhttp.responseText;
			}
			
		}
	};
	var r = document.getElementById('login');
	var posta = r.posta.value;
	var pasahitza = r.pasahitza.value;
	var param = posta+"&p="+pasahitza;

	xhttp.open("GET","signin.php?e="+param, true);
	xhttp.send();
}

function ikusiIkasleak(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("laukia").innerHTML= xhttp.responseText;
		}
	};
	xhttp.open("GET","addgetuserform.php", true);
	xhttp.send();
}

function ikusixmlgalderak(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("laukia").innerHTML= xhttp.responseText;
		}
	};
	xhttp.open("GET","seeXMLQuestions.php", true);
	xhttp.send();
}

function ikusixslgalderak(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("laukia").innerHTML= xhttp.responseText;
		}
	};
	xhttp.open("GET","transformatugalderak.php", true);
	xhttp.send();
}

function pasahitzahaztua(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("login").innerHTML= xhttp.responseText;
		}
	};
	xhttp.open("GET","addemailform.php", true);
	xhttp.send();
}

function aldatupass(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("laukia").innerHTML= xhttp.responseText;
		}
	};
	var r = document.getElementById('passform');
	var pass = r.pass.value;
	var pass2 = r.pass2.value;
	if (pass == null || pass == "") {
		alert("Pasahitza ezin da hutsik egon");
	}else{
		if (pass!=pass2) {
			alert("Pasahitzak ez dira berdinak");
		}else{
			xhttp.open("GET","aldatupass.php?p="+pass, true);
			xhttp.send();
		}
	}
}

function bidalimail(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("bat").innerHTML= xhttp.responseText;
		}
	};
	var r = document.getElementById('mailform');
	var posta = r.mail.value;

	xhttp.open("GET","bidalimail.php?p="+posta, true);
	xhttp.send();
}

function gordealdaketa(id){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("error").innerHTML= xhttp.responseText;
		}
	};

	var r = document.getElementById('editquestion');
	var q = r.galdera.value;
	var a = r.erantzuna.value;
	var l = r.maila.value;

	var param = "q="+q+"&a="+a+"&id="+id+"&l="+l;

	xhttp.open("GET","updatequizz.php?"+param, true);
	xhttp.send();
}

function initMap() {
	var map = new google.maps.Map(document.getElementById('erab'), {
		center: {lat: -34.397, lng: 150.644},
		zoom: 6
	});
	var infoWindow = new google.maps.InfoWindow({map: map});

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};

			infoWindow.setPosition(pos);
			infoWindow.setContent('Zu hemen zaude');
			map.setCenter(pos);
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
	} else {
		handleLocationError(false, infoWindow, map.getCenter());
	}
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}

function getserverlocation(){
	
}