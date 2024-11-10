<?php

class SiginModel {

  public function post()
  {

    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $erros = [];

    if ( empty($dados["nome"]) ) {
      $erros[] = "Preencha o campo nome!";
    }

    if ( empty($dados["sobrenome"]) ) {
      $erros[] = "Preencha o campo sobrenome!";
    }

    if ( empty($dados["email"]) ) {
      $erros[] = "Preencha o campo email!";
    }
    if ( empty($dados["senha"]) ) {
      $erros[] = "Preencha o campo senha!";
    }

    if ( empty($dados["confirmar_senha"]) ) {
      $erros[] = "Preencha o campo confirmar senha!";
    } else if ( $dados["senha"] != $dados["confirmar_senha"] ) {
      $erros[] = "As senhas devem ser iguais!";
      $erros[] = "As senhas devem ser iguais!";
    }

    if ( empty($dados["tipo_usuario"]) ) {
      $erros[] = "Selecione um tipo de usuário!";
    }

    if ( empty($dados["termos"]) || $dados["termos"] != "on" ) {
      $erros[] = "Aceite os termos!";
    }

    if ( !empty($erros) ) {

      return $erros;
    }

    $usuario = [];
    $usuario["nome"] = $dados["nome"] . " " . $dados["sobrenome"];
    $usuario["email"] = $dados["email"];
    $usuario["telefone"] = ( empty($dados["telefone"]) ) ? null : $dados["telefone"];
    $usuario["senha"] = password_hash($dados["senha"],PASSWORD_DEFAULT);
    $usuario["tipo"] = ( $dados["tipo_usuario"] != "professor" ) ? 1 : 2;

    require_once __DIR__ . "/../core/Banco.php";

    $conexao = new Banco();
    $query = "INSERT INTO usuarios (usu_nome,usu_email,usu_senha,usu_tipo,usu_tel) values (:nome,:email,:senha,:tipo,:telefone)";
    $cadastrar = $conexao->getConexao()->prepare($query);

    $cadastrar->bindParam(":nome",$usuario["nome"],PDO::PARAM_STR);
    $cadastrar->bindParam(":email",$usuario["email"],PDO::PARAM_STR);
    $cadastrar->bindParam(":senha",$usuario["senha"],PDO::PARAM_STR);
    $cadastrar->bindParam(":tipo",$usuario["tipo"],PDO::PARAM_INT);
    $cadastrar->bindParam(":telefone",$usuario["telefone"],PDO::PARAM_STR);

    $cadastrar->execute();

    if ($cadastrar->rowCount()) {

      return true;
      
    } else {

      $erros[] = "Houve algum erro durante o cadastro :(";
      
      return $erros;
      
    }
  }
  
}