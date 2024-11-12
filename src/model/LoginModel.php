<?php

class LoginModel
{

  public function search()
  {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erros = [];

    if (empty($dados["email"])) {
      $erros[] = "Preencha o campo email!";
    }
    if (empty($dados["senha"])) {
      $erros[] = "Preencha o campo senha!";
    }

    if (!empty($erros)) {

      return $erros;
    }

    $usuario["email"] = $dados["email"];
    $usuario["senha"] = $dados["senha"];

    require_once __DIR__ . "/../core/Banco.php";

    $conexao = new Banco();
    $query = "SELECT * FROM usuarios LEFT JOIN arquivos ON usuarios.usu_id_foto = arquivos.arq_id WHERE usu_email = :email";
    $buscar = $conexao->getConexao()->prepare($query);

    $buscar->bindParam(":email", $usuario["email"], PDO::PARAM_STR);

    $buscar->execute();

    if ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

      if (password_verify($usuario["senha"], $linha["usu_senha"])) {

        session_start();
        $_SESSION["usuario"] = $linha;
        return true;
      } else {

        $erros[] = "Email ou senha inválido(s)!";
        return $erros;
      }
    } else {

      $erros[] = "Email ou senha inválido(s)!";
      return $erros;
    }
  }
}
