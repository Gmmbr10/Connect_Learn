<?php

class UsuarioModel
{

  public function deletar()
  {

    $id_usuario = $_SESSION["usuario"]["usu_id"];

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    $query = "DELETE FROM usuarios WHERE usu_id =:id;";
    $deletar = $banco->getConexao()->prepare($query);
    $deletar->bindParam(":id", $id_usuario, PDO::PARAM_INT);
    $deletar->execute();

    return true;
  }

  public function atualizar()
  {

    $id_usuario = $_SESSION["usuario"]["usu_id"];
    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $erros = [];

    if ( empty($dados["nome"]) ) {
      $erros[] = "Escreva o seu nome completo!";
    }

    if ( empty($dados["email"]) ) {
      $erros[] = "Insira um email";
    }

    if ( !empty($erros) ) {
      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "UPDATE usuarios SET usu_nome=:nome,usu_email=:email,usu_tel=:telefone WHERE usu_id = :usuario";
    $atualizar = $banco->getConexao()->prepare($query);
    $dados["telefone"] = ( empty($dados["telefone"]) ) ? null : $dados["telefone"];
    
    $atualizar->bindParam(":nome",$dados["nome"],PDO::PARAM_STR);
    $atualizar->bindParam(":email",$dados["email"],PDO::PARAM_STR);
    $atualizar->bindParam(":telefone",$dados["telefone"],PDO::PARAM_STR);
    $atualizar->bindParam(":usuario",$id_usuario,PDO::PARAM_INT);
    
    $atualizar->execute();
    
    if ( $atualizar->rowCount() ) {
      $_SESSION["usuario"]["usu_nome"] = $dados["nome"];
      $_SESSION["usuario"]["usu_email"] = $dados["email"];
      $_SESSION["usuario"]["usu_tel"] = $dados["telefone"];
      
      return true;
    }

    return "Houve um erro durante o processo :(";
    
  }

  public function atualizarSenha()
  {

    $id_usuario = $_SESSION["usuario"]["usu_id"];
    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $erros = [];

    if ( empty($dados["senha"]) ) {
      $erros[] = "Escreva a nova senha";
    }

    if ( empty($dados["confirmar_senha"]) ) {
      $erros[] = "Confirme sua senha";
    }

    if ( $dados["senha"] != $dados["confirmar_senha"] ) {
      $erros[] = "As senhas devem ser iguais";
    }

    if ( !empty($erros) ) {
      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "UPDATE usuarios SET usu_senha=:senha WHERE usu_id = :usuario";
    $atualizar = $banco->getConexao()->prepare($query);
    $senha = password_hash($dados["senha"],PASSWORD_DEFAULT);
    
    $atualizar->bindParam(":senha",$senha,PDO::PARAM_STR);
    $atualizar->bindParam(":usuario",$id_usuario,PDO::PARAM_STR);
    
    $atualizar->execute();
    
    if ( $atualizar->rowCount() ) {
      $_SESSION["usuario"]["usu_senha"] = $senha;
      
      return true;
    }

    return "Houve um erro durante o processo :(";
    
  }

  public function atualizarFoto($id_foto)
  {

    $id_usuario = $_SESSION["usuario"]["usu_id"];

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    $query = "UPDATE usuarios SET usu_id_foto = :id WHERE usu_id =:usuario";
    $atualizar = $banco->getConexao()->prepare($query);
    $atualizar->bindParam(":id", $id_foto, PDO::PARAM_INT);
    $atualizar->bindParam(":usuario", $id_usuario, PDO::PARAM_INT);
    $atualizar->execute();

    return true;
    
  }
}
