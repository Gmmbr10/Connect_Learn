<?php

class CursoModel
{

  public function post()
  {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erros = [];

    if (empty($dados["curso"])) {

      $erros[] = "Escreva o nome do curso";
    }

    if (empty($dados["tema"])) {

      $erros[] = "Selecione um núcleo";
    }

    switch ($dados["tema"]) {
      case "1":
      case "2":
      case "3":
        break;
      default:
        $erros[] = "Selecione um núcleo válido";
        break;
    }

    if (!empty($erros)) {

      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "INSERT INTO cursos ( cur_nome , cur_tema , cur_id_usuario ) VALUES ( :nome , :tema, :id )";
    $cadastrar = $banco->getConexao()->prepare($query);

    $cadastrar->bindParam(":nome", $dados["curso"], PDO::PARAM_STR);
    $cadastrar->bindParam(":tema", $dados["tema"], PDO::PARAM_INT);
    $cadastrar->bindParam(":id", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

    $cadastrar->execute();

    if ($cadastrar->rowCount()) {

      return true;
    }

    return "Houve um problema durante o processo :(";
  }

  public function path()
  {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erros = [];

    if (empty($dados["curso"])) {

      $erros[] = "Escreva o nome do curso";
    }

    if (empty($dados["tema"])) {

      $erros[] = "Selecione um núcleo";
    }

    switch ($dados["tema"]) {
      case "1":
      case "2":
      case "3":
        break;
      default:
        $erros[] = "Selecione um núcleo válido";
        break;
    }

    if (!empty($erros)) {

      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "UPDATE cursos SET cur_nome = :nome , cur_tema = :tema WHERE cur_id = :curso AND cur_id_usuario = :usuario";
    $atualizar = $banco->getConexao()->prepare($query);

    $atualizar->bindParam(":nome", $dados["nome"], PDO::PARAM_STR);
    $atualizar->bindParam(":tema", $dados["tema"], PDO::PARAM_INT);
    $atualizar->bindParam(":curso", $dados["id"], PDO::PARAM_INT);
    $atualizar->bindParam(":usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

    $atualizar->execute();

    if ($atualizar->rowCount()) {

      return true;
    }

    return "Houve um problema durante o processo :(";
  }

  public function delete($id_curso)
  {

    if (empty($id_curso)) {

      return "Selecione uma curso";
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "DELETE FROM cursos WHERE cur_id = :curso AND cur_id_usuario = :usuario";
    $deletar = $banco->getConexao()->prepare($query);

    $deletar->bindParam(":curso", $id_curso, PDO::PARAM_INT);
    $deletar->bindParam(":usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

    $deletar->execute();

    if ($deletar->rowCount()) {

      return true;
    }

    return "Houve um erro durante o processo :(";
  }

  public function get($id_curso_tema = null)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    if ($_SESSION["usuario"]["usu_tipo"] == 1 && $id_curso_tema) {

      $query = "SELECT * FROM cursos WHERE cur_tema = :tema";
      $buscar = $banco->getConexao()->prepare($query);

      $buscar->bindParam(":tema",$id_curso_tema,PDO::PARAM_INT);

      $buscar->execute();

      if ($buscar->rowCount()) {

        $string = "";

        while ( $linha = $buscar->fetch(PDO::FETCH_ASSOC) )
        {
          $string .= '<section class="box">

            <div class="row p-4"></div>

            <p class="bold">
              '. $linha["cur_nome"] .'
            </p>
            
          </section>';
        }
        
        return $string;
      }

      return "Nenhum registro encontrado";
    }

    if (!empty($id_curso_tema)) {
      $query = "SELECT * FROM cursos INNER JOIN usuarios ON cursos.cur_id_usuario = usuarios.usu_id WHERE cur_id = :curso";
      $buscar = $banco->getConexao()->prepare($query);

      $buscar->bindParam(":curso", $id_curso_tema, PDO::PARAM_INT);

      $buscar->execute();

      if ($buscar->rowCount()) {

        $dados = [];

        while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {
          $dados[] = $linha;
        }

        return $dados;
      }

      return "Nenhum registro encontrado";
    }

    if ($_SESSION["usuario"]["usu_tipo"] == 2) {

      $query = "SELECT * FROM cursos WHERE cur_id_usuario = :usuario";
      $buscar = $banco->getConexao()->prepare($query);

      $buscar->bindParam(":usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

      $buscar->execute();

      if ($buscar->rowCount()) {

        $string = "";

        while ( $linha = $buscar->fetch(PDO::FETCH_ASSOC) )
        {
          $string .= '<section class="box">

            <div class="row p-4"></div>

            <p class="bold">
              '. $linha["cur_nome"] .'
            </p>
            
          </section>';
        }
        
        return $string;
      }

      return "Nenhum registro encontrado";
    }

    $query = "SELECT * FROM cursos INNER JOIN usuarios ON cursos.cur_id_usuario = usuarios.usu_id";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->execute();

    if ($buscar->rowCount()) {

      return true;
    }

    return "Nenhum registro encontrado";
  }
}
