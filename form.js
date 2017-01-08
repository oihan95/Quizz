function ikusBalioak(){
	var sAux="";
	var frm=document.getElementById("erregistro");
	var ok = balidatu(frm);
	if (ok) {
		for(i=0;i<frm.elements.length-1;i++){
			sAux +="IZENA: " + frm.elements[i].name+"";
			sAux +=" BALIOA: " + frm.elements[i].value+"\n";
		}
		alert(sAux);
		return true;
	} else {
		return false;
	}
}

var irudiaikusi = function(event) {
	var reader = new FileReader();
	reader.onload = function(){
		var irudia = document.getElementById('irudia');
		irudia.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
};

function balidatu(erregistro){
	var iz = erregistro.izena.value;
	if (iz == null || iz == "") {
		alert("Izena ezin da hutsik egon");
		return false;
	}

	var abi1 = erregistro.abi1.value;
	if (abi1 == null || abi1 == "") {
		alert("Lehenengo abizena ezin da hutsik egon");
		return false;
	}

	var abi2 = erregistro.abi2.value;
	if (abi2 == null || abi2 == "") {
		alert("Bigarren abizena ezin da hutsik egon");
		return false;
	}

	var post = erregistro.posta.value;
	if (post == null || post == "") {
		alert("E-posta ezin da hutsik egon");
		return false;
	}else{
		var testpost = /[a-z]+[0-9]{3}@ikasle.ehu.[eus|es]/;
		if(!testpost.test(post)){
			alert("Posta elektronikoaren formatua ondorengoa izan behar da: karaktereak + 3 zenbaki + @ikasle.ehu + .eus edo .es");
			return false;
		}
	}

	var pass = erregistro.pasahitza.value;
	if (pass == null || pass == "") {
		alert("Pasahitza ezin da hutsik egon");
		return false;
	}else{
		if (pass.length < 6) {
		alert("Pasahitzak gutxienez 6 karaktere izan behar ditu");
		return false;
		}
	}

	var telf = erregistro.telf.value;
	if (telf == null || telf == "") {
		alert("Telefono zenbakia ezin da hutsik egon");
		return false;
	}else{
		var testtelf = /[0-9]{9}/;
		if(!testtelf.test(telf)){
			alert("Telefonoa 9 zenbakiz osatuta egon behar da");
			return false;
		}
	}
	return true;
}

function bistaratu(elem){
	if (elem.value == "OT"){
		document.getElementById('specialityOther').style.visibility = "visible";
	}else{
		document.getElementById('specialityOther').style.visibility = "hidden";
	}
}