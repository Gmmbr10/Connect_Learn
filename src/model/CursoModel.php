<?php

class CursoModel {

  public function post()
  {

    $data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $errors = [];

    if ( empty($data["curso"]) ) {
      $errors[] = "Escreva o nome do curso";
    }

    if ( !empty($errors) ) {
      return $errors;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "INSERT INTO cursos ( cur_nome , cur_tema , cur_id_usuario ) VALUES ( :nome , :tema , :usuario )";
    $cadastrar = $banco->getConexao()->prepare($query);

    $cadastrar->bindParam(":nome",$data["curso"],PDO::PARAM_STR);
    $cadastrar->bindParam(":tema",$data["area"],PDO::PARAM_INT);
    $cadastrar->bindParam(":usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

    $cadastrar->execute();

    if ( $cadastrar->rowCount() ) {

      return true;
    }

    return "Houve um erro durante o processo :(";
    
  }

  public function get($id_curso = null)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    if ( $id_curso != null ) {

      $query = "SELECT * FROM cursos WHERE cur_id = :curso AND cur_id_usuario = :usuario";
      $buscar = $banco->getConexao()->prepare($query);

      $buscar->bindParam(":curso",$id_curso,PDO::PARAM_INT);
      $buscar->bindParam(":usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

      $buscar->execute();

      if ( $buscar->rowCount() ) {

        return $buscar->fetch(PDO::FETCH_ASSOC);
      }

      return false;

    }

    $query = "SELECT * FROM cursos WHERE cur_id_usuario = :usuario";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->bindParam(":usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_STR);

    $buscar->execute();

    if ( $buscar->rowCount() ) {

      $string = "";

      while ( $linha = $buscar->fetch(PDO::FETCH_ASSOC) ) {
        
        $string .= '<a class="box-2" href="{include_path}teacher/conteudos?action=visualizar&curso='. $linha["cur_id"] .'">'. $linha["cur_nome"] .'</a>';
        
      }

      return $string;

    }

    return '<p>Nenhum curso encontrado</p>';
    
  }

  public function path()
  {

    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $errors = [];

    if ( empty($dados["curso"]) ) {
      $errors[] = "Escreva o nome do curso";
    }

    if ( empty($dados["tema"]) ) {
      $errors[] = "Selecione um tema para o curso";
    }

    if ( !empty($errors) ) {
      return $errors;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    $query = "UPDATE cursos SET cur_nome=:nome,cur_tema=:tema WHERE cur_id = :curso";
    $atualizar = $banco->getConexao()->prepare($query);

    $atualizar->bindParam(":nome",$dados["curso"],PDO::PARAM_STR);
    $atualizar->bindParam(":tema",$dados["tema"],PDO::PARAM_INT);
    $atualizar->bindParam(":curso",$dados["id_curso"],PDO::PARAM_INT);

    $atualizar->execute();

    if ( $atualizar->rowCount() ) {

      return true;
    }

    return false;
    
  }

  public function delete($id_curso)
  {

    if ( empty($id_curso) ) {
      return "Selecione um curso!";
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "DELETE FROM cursos WHERE cur_id = :curso AND cur_id_usuario = :usuario";
    $deletar = $banco->getConexao()->prepare($query);

    $deletar->bindParam(":curso",$id_curso,PDO::PARAM_INT);
    $deletar->bindParam(":usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

    $deletar->execute();

    if ($deletar->rowCount()) {

      return true;
    }

    return false;
  }
  
}