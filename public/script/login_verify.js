const form = document.getElementById("login_form");

form.addEventListener("submit",(e)=>{
	e.preventDefault();

	const input_email = document.getElementById("input_email").value;
	const error_input_email = document.getElementById("error_input_email");

	const input_senha = document.getElementById("input_senha").value;
	const error_input_senha = document.getElementById("error_input_senha");

	let error = false;

	if ( input_email == "" ) {

		error_input_email.innerText = "Preencha o campo email";
		error = true;

	}

	if ( input_senha == "" ) {

		error_input_senha.innerText = "Preencha o campo senha";
		error = true;

	}

});