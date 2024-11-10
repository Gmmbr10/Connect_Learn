<?php

class RespostaModel {

  public function post()
  {

    $id_desafio = filter_input(INPUT_GET,"duvida",FILTER_DEFAULT);
    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $erros = [];

    if ( empty($dados["texto"]) ) {

      $erros[] = "Escreva sua resposta";

    }

    if ( empty($erros) ) {

      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "INSERT INTO respostas (res_texto,res_id_usuario,res_id_duvida) VALUES (:texto,:id_usuario,:id_duvida)";
    $cadastrar = $banco->getConexao()->prepare($query);

    $cadastrar->bindParam(":texto",$dados["texto"],PDO::PARAM_STR);
    $cadastrar->bindParam(":id_usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);
    $cadastrar->bindParam(":id_duvida",$id_desafio,PDO::PARAM_INT);

    $cadastrar->execute();

    if ( $cadastrar->rowCount() ) {

      return true;
    }

    return ["Houve um erro no processo :("];
    
  }

  public function putLike($id_resposta,$quantidadeAdicionar)
  {

    if ( empty($id_resposta) ) {

      return ["Selecione uma resposta"];
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    $query = "SELECT * FROM respostas WHERE res_id = :id_resposta";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->bindParam(":id_resposta",$id_resposta,PDO::PARAM_INT);

    $buscar->execute();

    $linha = $buscar->fetch(PDO::FETCH_ASSOC);

    if ( !$linha ) {

      return ["Resposta não encontrada"];
    }

    $quantidade_like = $quantidadeAdicionar + $linha["res_like"];

    $query = "UPDATE respostas SET res_like = :quantidade_like WHERE res_id = :id_resposta";
    $atualizar = $banco->getConexao()->prepare($query);

    $atualizar->bindParam(":quantidade_like",$quantidade_like,PDO::PARAM_INT);
    $atualizar->bindParam(":id_respota",$id_resposta,PDO::PARAM_INT);

    $atualizar->execute();

    if ( $atualizar->rowCount() ) {

      return true;
    }

    return ["Houve algum erro durante o processo :("];
    
  }

  public function path()
  {

    $id_resposta = filter_input(INPUT_GET, "resposta", FILTER_DEFAULT);
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erros = [];

    if (empty($dados["texto"])) {

      $erros[] = "Escreva a resposta";
    }

    if (!empty($erros)) {

      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "UPDATE respostas SET res_texto = :texto WHERE res_id = :id_resposta AND res_id_usuario = :id_usuario";
    $atualizar = $banco->getConexao()->prepare($query);

    $atualizar->bindParam(":texto", $dados["texto"], PDO::PARAM_STR);
    $atualizar->bindParam(":id_resposta", $id_resposta, PDO::PARAM_INT);
    $atualizar->bindParam(":id_usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

    $atualizar->execute();

    if ($atualizar->rowCount()) {

      return true;
    }

    return ["Houve um erro durante o processo :("];
  }

  public function delete($id_resposta)
  {

    if (empty($id_resposta)) {

      return ["Selecione a resposta"];
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "DELETE FROM respostas WHERE res_id = :id_resposta AND res_id_usuario = :id_usuario";
    $deletar = $banco->getConexao()->prepare($query);

    $deletar->bindParam(":id_resposta", $id_resposta, PDO::PARAM_INT);
    $deletar->bindParam(":id_usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

    $deletar->execute();

    if ($deletar->rowCount()) {

      return true;
    }

    return ["Houve um erro durante o processo"];
  }
  
}