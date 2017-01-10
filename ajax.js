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