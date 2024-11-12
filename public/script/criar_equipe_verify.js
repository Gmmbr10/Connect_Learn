const form = document.getElementById("form_criar_equipe");

form.addEventListener("submit",(e)=>{

  e.preventDefault();

  const equipe = document.getElementById("input_equipe").value;
  const error_equipe = document.getElementById("error_equipe");

  const senha = document.getElementById("input_senha").value;
  const error_senha = document.getElementById("error_senha");

  const tipo_equipe_pub = document.getElementById("input_visibilidade_pub").checked;
  const tipo_equipe_pri = document.getElementById("input_visibilidade_pri").checked;
  const error_tipo_equipe = document.getElementById("error_visibilidade");

  let error = false;
  
  if ( equipe == "" ) {

    error_equipe.innerText = "Insira o nome da equipe";
    error = true;

  }

  if ( tipo_equipe_pri == false && tipo_equipe_pub == false ) {

    error_tipo_equipe.innerText = "Selecione público ou privado";
    error = true;

  }

  if ( tipo_equipe_pri == true) {
    
    if ( senha == "" ) {

      error_senha.innerText = "Escreva a senha para entrar em sua equipe";
      error = true;
    }
  }

  if ( error == false ) {

    form.submit();

  }
  
});