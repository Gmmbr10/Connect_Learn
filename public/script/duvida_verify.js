const form = document.getElementById("duvida_form");

form.addEventListener("submit",(e)=>{
	e.preventDefault();

	const duvida = document.getElementById("input_duvida").value;
	const error_duvida = document.getElementById("error_duvida");

	let error = false;

	if ( duvida == "" ) {

		error_duvida.innerText = "Escreva sua dúvida";
		error = true;

	}

  if ( error == false ) {

    form.submit();
    
  }

});