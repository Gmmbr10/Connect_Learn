const sigin_form = document.getElementById("sigin_form");

sigin_form.addEventListener("submit", (e) => {
	e.preventDefault();

	const input_nome = document.getElementById("input_nome").value;
	const error_nome = document.getElementById("error_nome");

	const input_sobrenome = document.getElementById("input_sobrenome").value;
	const error_sobrenome = document.getElementById("error_sobrenome");

	const input_email = document.getElementById("input_email").value;
	const error_email = document.getElementById("error_email");

	const input_telefone = document.getElementById("input_telefone").value;
	const error_telefone = document.getElementById("error_telefone");
	
	const input_senha = document.getElementById("input_senha").value;
	const error_senha = document.getElementById("error_senha");
	
	const input_confirmar_senha = document.getElementById("input_confirmar_senha").value;
	const error_confirmar_senha = document.getElementById("error_confirmar_senha");

	const error_tipo_usuario = document.getElementById("error_tipo_usuario");
	const array_input_tipo_usuario = document.querySelectorAll("input[type=radio]");
	let input_tipo_usuario = "";

	const input_termos_uso = document.getElementById("input_termos_uso").checked;
	const error_termos_uso = document.getElementById("error_termos_uso");

	for ( let i = 0 ; i < array_input_tipo_usuario.length ; i++ ) {

		if ( array_input_tipo_usuario[i].checked != "" ) {

			input_tipo_usuario = array_input_tipo_usuario[i].value;
			break;

		}

	}

	let error = false;

	if ( input_nome == "" ) {

		error_nome.innerText = "Preencha o campo nome";
		error = true;

	}

	if ( input_sobrenome == "" ) {

		error_sobrenome.innerText = "Preencha o campo sobrenome";
		error = true;

	}

	if ( input_tipo_usuario == "" ) {

		error_tipo_usuario.innerText = "Selecione o seu tipo de usuário";
		error = true;

	}

	if ( input_email == "" ) {

		error_email.innerText = "Preencha o campo email";
		error = true;

	}

	if ( input_telefone == "" ) {

		error_telefone.innerText = "Preencha o campo telefone";
		error = true;

	}

	if ( input_senha == "" ) {

		error_senha.innerText = "Preencha o campo senha";
		error = true;

	}

	if ( input_confirmar_senha == "" ) {

		error_confirmar_senha.innerText = "Preencha o campo confirmar senha";
		error = true;

	} else if ( input_senha != input_confirmar_senha ) {

		error_senha.innerText = "As senhas devem ser iguais";
		error_confirmar_senha.innerText = "As senhas devem ser iguais";
		error = true;

	}

	if ( input_termos_uso == false ) {

		error_termos_uso.innerText = "É necessário aceitar os termos de uso para prosseguir";
		error = true;

	}

});