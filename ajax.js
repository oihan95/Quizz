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
	var xhttp5 = new XMLHttpRequest();
	xhttp5.onreadystatechange = function(){
		if ((xhttp5.readyState==4)&&(xhttp5.status==200 )){
			document.getElementById("laukia").innerHTML= xhttp5.responseText;
		}
	};
	var erregistro = document.getElementById('insertquestion');
	var galdera = insertquestion.galdera.value;
	var erantzun = insertquestion.erantzuna.value;
	var level = insertquestion.maila.value;

	var param = "question="+galdera+"&answer="+erantzun+"&level="+level;

	xhttp5.open("GET","InsertQuestion.php?"+param, true);
	xhttp5.send();
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

	function refresh(){
		galderakkontatu();
		setInterval(galderakkontatu(),5000);
	}
}

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