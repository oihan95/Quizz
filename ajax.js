xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function(){
	if ((xhttp.readyState==4)&&(xhttp.status==200 )){ 
		document.getElementById("galderak").innerHTML= xhttp.responseText;
	}
};

function ikusiGalderak(){
	if(document.getElementById('galderak').style.display == 'block'){
		document.getElementById('galderak').style.display = 'none';
	}else{
		document.getElementById('galderak').style.display = 'block'; 
		xhttp.open("GET","showmyquizzes.php", true);
		xhttp.send();
	}
}