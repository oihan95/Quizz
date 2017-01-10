xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function(){
	if ((xhttp.readyState==4)&&(xhttp.status==200 )){ 
		document.getElementById("galderak").innerHTML= xhttp.responseText;
	}
};

function ikusiGalderak(){
	if(document.getElementById('txtHint').style.display == 'block'){
		document.getElementById('txtHint').style.display = 'none';
	}else{
		document.getElementById('txtHint').style.display = 'block'; 
		xhttp.open("GET","showmyquizzes.php", true);
		xhttp.send();
	}
}