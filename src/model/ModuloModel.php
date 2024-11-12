<?php

class ModuloModel
{

  public function post()
  {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erros = [];

    if (empty($dados["modulo"])) {
      $erros[] = "Escreva o nome do módulo";
    }

    if ($dados["id_curso"] == 0 || empty($dados["id_curso"])) {
      $erros[] = "Escolha um curso válido";
    }

    if (!empty($erros)) {
      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "INSERT INTO modulos ( mod_nome , mod_id_curso ) VALUES ( :nome , :curso )";
    $cadastrar = $banco->getConexao()->prepare($query);

    $cadastrar->bindParam(":curso", $dados["id_curso"], PDO::PARAM_INT);
    $cadastrar->bindParam(":nome", $dados["modulo"], PDO::PARAM_STR);

    $cadastrar->execute();

    if ($cadastrar->rowCount()) {

      return true;
    }

    return "Houve um erro durante o processo :(";
  }

  public function get($id_curso = null)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    if ($_SESSION["usuario"]["usu_tipo"] != 2) {
      return;
    }

    $query = "SELECT * FROM modulos INNER JOIN cursos ON modulos.mod_id_curso = cursos.cur_id";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->execute();

    if ($buscar->rowCount()) {

      $string = "";

      while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

        $string .= '<option value="' . $linha["mod_id"] . '">' . $linha["cur_nome"] . ' - ' . $linha["mod_nome"] . '</option>';
      }

      return $string;
    }

    return '<option value="0">Nenhum curso criado</option>';
  }

  public function getCursos()
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    if ($_SESSION["usuario"]["usu_tipo"] != 2) {
      return;
    }

    $query = "SELECT * FROM cursos WHERE cur_id_usuario = :usuario";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->bindParam(":usuario", $_SESSION["usuario"]["usu_tipo"], PDO::PARAM_INT);

    $buscar->execute();

    if ($buscar->rowCount()) {

      $string = "";

      while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

        $string .= '<option value="' . $linha["cur_id"] . '">' . $linha["cur_nome"] . '</option>';
      }

      return $string;
    }

    return '<option value="0">Nenhum curso criado</option>';
  }
}
