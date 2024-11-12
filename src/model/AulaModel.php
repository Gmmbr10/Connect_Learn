<?php

class AulaModel {

  public function post()
  {

    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $erros = [];

    if ( empty($dados["titulo"]) ) {
      $erros[] = "Escreva o título da aula";
    }

    if ( empty($dados["conteudo"]) ) {
      $erros[] = "Escreva o conteúdo da aula";
    }

    if ( $dados["id_curso"] ) {

    }

    if ( !empty($erros) ) {
      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    $query = "INSERT INTO aulas ( aul_titulo , aul_conteudo , aul_url , aul_id_modulo ) VALUES ( :titulo , :conteudo , :url_video , :modulo )";
    $cadastrar = $banco->getConexao()->prepare($query);

    $cadastrar->bindParam(":titulo",$dados["titulo"],PDO::PARAM_STR);
    $cadastrar->bindParam(":conteudo",$dados["conteudo"],PDO::PARAM_STR);
    $cadastrar->bindParam(":url_video",$dados["video"],PDO::PARAM_STR);
    $cadastrar->bindParam(":modulo",$dados["id_curso"],PDO::PARAM_INT);

    $cadastrar->execute();

    if ( $cadastrar->rowCount() ) {

      return true;

    }

    return "Houve um erro durante o processo :(";
    
  }
  
}