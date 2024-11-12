const form = document.getElementById("form_suporte");

form.addEventListener("submit",(e)=>{
  e.preventDefault();

  const email = document.getElementById("input_email").value;
  const error_email = document.getElementById("error_email");

  const assunto = document.getElementById("input_assunto").value;
  const error_assunto = document.getElementById("error_assunto");

  let error = false;

  if ( email == "" ) {

    error_email.innerText = "Preencha o campo email";
    error = true;
  }

  if ( assunto == "" ) {

    error_assunto.innerText = "Preencha o campo assunto";
    error = true;
  }

  if ( error == false ) {
    form.submit();
  }
  
});