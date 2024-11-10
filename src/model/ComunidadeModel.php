<?php

class ComunidadeModel {

  public function post()
  {

    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $erros = [];

    if (empty($dados["nome"])) {

      $erros[] = "Escreva o nome da comunidade";
      
    }

    if (empty($dados["link"])) {

      $erros[] = "Insira o link do discord de sua comunidade";
      
    }

    if ( !empty($erros) ) {

      return $erros;

    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "INSERT INTO comunidades ( com_nome , com_link , com_id_fundador ) VALUES ( :nome , :com_link , :id )";
    $cadastrar = $banco->getConexao()->prepare($query);

    $cadastrar->bindParam(":nome",$dados["nome"],PDO::PARAM_STR);
    $cadastrar->bindParam(":com_link",$dados["link"],PDO::PARAM_STR);
    $cadastrar->bindParam(":id",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

    $cadastrar->execute();

    if ( $cadastrar->rowCount() ) {

      return true;
    }

    return ["Houve um problema durante o processo :("];
    
  }

  public function get()
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "SELECT * FROM comunidades INNER JOIN usuarios ON comunidades.com_id_fundador = usuarios.usu_id";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->execute();

    if ( $buscar->rowCount() ) {

      return true;
    }

    return ["Houve um erro durante o processo :("];
    
  }

  public function path()
  {

    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $erros = [];

    if ( empty($dados["nome"]) ) {
      $erros[] = "Escreva o nome da comunidade";
    }

    if ( empty($dados["link"]) ) {
      $erros[] = "Cole o link de convite da comunidade";
    }

    if ( !empty($erros) ) {
      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "UPDATE comunidades SET com_nome = :nome , com_link = :link WHERE com_id = :comunidade AND com_id_fundador = :usuario";
    $atualizar = $banco->getConexao()->prepare($query);

    $atualizar->bindParam(":nome",$dados["nome"],PDO::PARAM_STR);
    $atualizar->bindParam(":link",$dados["link"],PDO::PARAM_STR);
    $atualizar->bindParam(":comunidade",$dados["id_comunidade"],PDO::PARAM_INT);
    $atualizar->bindParam(":usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

    $atualizar->execute();

    if ( $atualizar->rowCount() ) {
      return true;
    }

    return ["Houve um erro durante o processo :("];
    
  }

  public function delete($id_comunidade)
  {

    if ( empty($id_comunidade) ) {

      return ["Selecione uma comunidade"];
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "DELETE FROM comunidades WHERE com_id = :comunidade AND com_id_fundador = :fundador";
    $deletar = $banco->getConexao()->prepare($query);

    $deletar->bindParam(":comunidade",$id_comunidade,PDO::PARAM_INT);
    $deletar->bindParam(":fundador",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

    $deletar->execute();

    if ( $deletar->rowCount() ) {

      return true;
    }

    return ["Houve um erro durante o processo :("];
    
  }
  
}