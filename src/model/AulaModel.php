<?php

class AulaModel
{

  public function post()
  {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $errors = [];

    if (empty($dados["titulo"])) {
      $errors[] = "Escreva o título da aula";
    }

    if (empty($dados["conteudo"])) {
      $errors[] = "Escreva o conteúdo da aula";
    }

    if (!empty($errors)) {
      return $errors;
    }

    require_once __DIR__ . "/../core/Banco.php";

    $banco = new Banco();
    $query = "INSERT INTO aulas ( aul_titulo , aul_conteudo , aul_id_modulo , aul_url ) VALUES ( :titulo , :conteudo , :modulo , :video )";
    $cadastrar = $banco->getConexao()->prepare($query);

    $cadastrar->bindParam(":titulo", $dados["titulo"], PDO::PARAM_STR);
    $cadastrar->bindParam(":conteudo", $dados["conteudo"], PDO::PARAM_STR);
    $cadastrar->bindParam(":modulo", $dados["id_modulo"], PDO::PARAM_STR);
    $cadastrar->bindParam(":video", $dados["link"], PDO::PARAM_STR);

    $cadastrar->execute();

    if ($cadastrar->rowCount()) {

      return true;
    }

    return false;
  }

  public function get($id_modulo = null)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    if ($_SESSION["usuario"]["usu_tipo"] == 2) {

      $query = "SELECT * FROM aulas INNER JOIN modulos ON aulas.aul_id_modulo = modulos.mod_id INNER JOIN cursos ON modulos.mod_id_curso = cursos.cur_id WHERE aul_id_modulo = :modulo AND cursos.cur_id_usuario = :usuario";
      $buscar = $banco->getConexao()->prepare($query);

      $buscar->bindParam(":modulo", $id_modulo, PDO::PARAM_INT);
      $buscar->bindParam(":usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

      $buscar->execute();

      if ($buscar->rowCount()) {

        $string = "";

        while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

          $string .= '<a href="./conteudos?action=visualizar&aula=' . $linha["aul_id"] . '" class="box flex align-center rounded p-2">' . $linha["aul_titulo"] . '</a>';
        }

        return $string;
      }

      return "Nenhuma aula encontrada";
    }

    return false;
  }

  public function getAula($id_aula = null)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    if ($_SESSION["usuario"]["usu_tipo"] == 2) {

      $query = "SELECT * FROM aulas INNER JOIN modulos ON aulas.aul_id_modulo = modulos.mod_id INNER JOIN cursos ON modulos.mod_id_curso = cursos.cur_id WHERE aul_id = :aula AND cursos.cur_id_usuario = :usuario";
      $buscar = $banco->getConexao()->prepare($query);

      $buscar->bindParam(":aula", $id_aula, PDO::PARAM_INT);
      $buscar->bindParam(":usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

      $buscar->execute();

      if ($buscar->rowCount()) {

        return $buscar->fetch(PDO::FETCH_ASSOC);
      }

      return "Aula não encontrada!";
    }

    $query = "SELECT * FROM aulas INNER JOIN modulos ON aulas.aul_id_modulo = modulos.mod_id INNER JOIN cursos ON modulos.mod_id_curso = cursos.cur_id WHERE aul_id = :aula";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->bindParam(":aula", $id_aula, PDO::PARAM_INT);

    $buscar->execute();

    if ($buscar->rowCount()) {

      return $buscar->fetch(PDO::FETCH_ASSOC);
    }

    return "Aula não encontrada!";
  }

  public function path()
  {

    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $errors = [];

    if ( empty($dados["titulo"]) ) {
      $errors[] = "Escreva o título da aula";
    }

    if ( empty($dados["conteudo"]) ) {
      $errors[] = "Escreva o conteúdo da aula";
    }
    
    if ( !empty($errors) ) {
      return $errors;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "UPDATE aulas SET aul_titulo=:titulo,aul_conteudo=:conteudo,aul_url=:video WHERE aul_id = :aula AND aul_id_modulo = :modulo";
    $atualizar = $banco->getConexao()->prepare($query);

    $atualizar->bindParam(":titulo",$dados["titulo"],PDO::PARAM_STR);
    $atualizar->bindParam(":conteudo",$dados["conteudo"],PDO::PARAM_STR);
    $atualizar->bindParam(":video",$dados["video"],PDO::PARAM_STR);
    $atualizar->bindParam(":aula",$dados["id_aula"],PDO::PARAM_INT);
    $atualizar->bindParam(":modulo",$dados["id_modulo"],PDO::PARAM_INT);

    $atualizar->execute();

    if ( $atualizar->rowCount() ) {

      return true;
    }

    return false;
    
  }

  public function delete($id_aula)
  {
    if ( empty($id_aula) ) {
      return "Selecione um aula!";
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "DELETE aulas FROM aulas INNER JOIN modulos ON aulas.aul_id_modulo = modulos.mod_id INNER JOIN cursos ON modulos.mod_id_curso = cursos.cur_id WHERE aul_id = :aula AND cursos.cur_id_usuario = :usuario";
    $deletar = $banco->getConexao()->prepare($query);

    $deletar->bindParam(":aula",$id_aula,PDO::PARAM_INT);
    $deletar->bindParam(":usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

    $deletar->execute();

    if ($deletar->rowCount()) {

      return true;
    }

    return false;
  }
}
