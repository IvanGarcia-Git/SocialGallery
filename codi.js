/////////////////////FUNCION PARA LOGIN//////////////////////

function login(){
	var user = document.getElementById('user').value;
	var password = document.getElementById('password').value;

	if (user == '' && password == '') {
		document.getElementById('mensaje').innerHTML = 'El campo user y password son obligatorios';
		document.getElementById('mensaje').style.display = 'block';
		document.getElementById('user').style.border = '1px solid #FF0000';
		document.getElementById('password').style.border = '1px solid #FF0000';
		return false;
	}else if(user == ''){
		document.getElementById('mensaje').innerHTML = 'El campo user es obligatorio';
		document.getElementById('mensaje').style.display = 'block';
		document.getElementById('user').style.border = '1px solid #FF0000';
		document.getElementById('password').style.border = '1px solid #ccc';
		return false;
	}else if(password == ''){
		document.getElementById('mensaje').innerHTML = 'El campo password es obligatorio';
		document.getElementById('mensaje').style.display = 'block';
		document.getElementById('user').style.border = '1px solid #ccc';
		document.getElementById('password').style.border = '1px solid #FF0000';
		return false;
	}else{
		return true;
	}
}

//////////////////////FUNCION PARA SUBIR IMG////////////////////////////

function subirimg(){
	var tituloimg = document.getElementById('tituloimg').value;
	var linkimg = document.getElementById('linkimg').value;

	if (tituloimg == '' && linkimg == '') {
		document.getElementById('mensaje').innerHTML = 'El campo user y password son obligatorios';
		document.getElementById('mensaje').style.display = 'block';
		document.getElementById('tituloimg').style.border = '1px solid #FF0000';
		document.getElementById('linkimg').style.border = '1px solid #FF0000';
		return false;
	}else if(tituloimg == ''){
		document.getElementById('mensaje').innerHTML = 'El campo user es obligatorio';
		document.getElementById('mensaje').style.display = 'block';
		document.getElementById('tituloimg').style.border = '1px solid #FF0000';
		document.getElementById('linkimg').style.border = '1px solid #ccc';
		return false;
	}else if(linkimg == ''){
		document.getElementById('mensaje').innerHTML = 'El campo password es obligatorio';
		document.getElementById('mensaje').style.display = 'block';
		document.getElementById('tituloimg').style.border = '1px solid #ccc';
		document.getElementById('linkimg').style.border = '1px solid #FF0000';
		return false;
	}else{
		return true;
	}
}