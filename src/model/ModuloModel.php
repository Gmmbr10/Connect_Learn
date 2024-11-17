<?php

class ModuloModel
{

  public function post()
  {

    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $errors = [];

    if (empty($data["modulo"])) {
      $errors[] = "Escreva o nome do módulo";
    }

    if (empty($data["id_curso"])) {
      $errors[] = "Escolha um curso";
    }

    if (!empty($errors)) {
      return $errors;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "INSERT INTO modulos ( mod_nome , mod_id_curso ) VALUES ( :nome , :curso )";
    $cadastrar = $banco->getConexao()->prepare($query);

    $cadastrar->bindParam(":nome", $data["modulo"], PDO::PARAM_STR);
    $cadastrar->bindParam(":curso", $data["id_curso"], PDO::PARAM_INT);

    $cadastrar->execute();

    if ($cadastrar->rowCount()) {
      return true;
    }

    return "Houve um erro durante o cadastro :(";
  }

  public function get($id_curso = null)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    if ($_SESSION["usuario"]["usu_tipo"] == 2) {

      $query = "SELECT * FROM modulos INNER JOIN cursos ON modulos.mod_id_curso = cursos.cur_id WHERE mod_id_curso = :curso AND cursos.cur_id_usuario = :usuario";
      $buscar = $banco->getConexao()->prepare($query);
      
      $buscar->bindParam(":curso", $id_curso, PDO::PARAM_INT);
      $buscar->bindParam(":usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);
      
      $buscar->execute();
      
      if ($buscar->rowCount()) {
        
        $string = "";
        
        while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {
          
          $string .= '<a href="./conteudos?action=visualizar&modulo='. $linha["mod_id"] .'" class="box">
            <p>'. $linha["mod_nome"] .'</p>
          </a>';
        }
        
        return $string;
      }
      
      return "Nenhum módulo encontrado";
    }
    
    $query = "SELECT * FROM modulos WHERE mod_id_curso = :curso";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->bindParam(":curso", $id_curso, PDO::PARAM_INT);

    $buscar->execute();

    if ($buscar->rowCount()) {

      $string = "";

      while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

        $string .= "<p>" . $linha["mod_nome"] . "</p>";
      }

      return $string;
    }

    return "Nenhum módulo encontrado";
  }

  public function getModulo($id_modulo = null)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    if ($_SESSION["usuario"]["usu_tipo"] == 2) {

      $query = "SELECT * FROM modulos INNER JOIN cursos ON modulos.mod_id_curso = cursos.cur_id WHERE mod_id = :modulo AND cursos.cur_id_usuario = :usuario";
      $buscar = $banco->getConexao()->prepare($query);
      
      $buscar->bindParam(":modulo", $id_modulo, PDO::PARAM_INT);
      $buscar->bindParam(":usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);
      
      $buscar->execute();
      
      if ($buscar->rowCount()) {
        
        return $buscar->fetch(PDO::FETCH_ASSOC);
      }
      
      return "Nenhum módulo encontrado";
    }
    
    $query = "SELECT * FROM modulos WHERE mod_id = :modulo";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->bindParam(":modulo", $id_modulo, PDO::PARAM_INT);

    $buscar->execute();

    if ($buscar->rowCount()) {

      $string = "";

      while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

        $string .= "<p>" . $linha["mod_nome"] . "</p>";
      }

      return $string;
    }

    return "Nenhum módulo encontrado";
  }

  public function path()
  {

    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $errors = [];

    if ( empty($dados["modulo"]) ) {
      $errors[] = "Escreva o nome do modulo";
    }

    if ( !empty($errors) ) {
      return $errors;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    $query = "UPDATE modulos SET mod_nome=:nome WHERE mod_id = :modulo";
    $atualizar = $banco->getConexao()->prepare($query);

    $atualizar->bindParam(":nome",$dados["modulo"],PDO::PARAM_STR);
    $atualizar->bindParam(":modulo",$dados["id_modulo"],PDO::PARAM_INT);

    $atualizar->execute();

    if ( $atualizar->rowCount() ) {

      return true;
    }

    return false;
    
  }

  public function delete($id_modulo)
  {
    if ( empty($id_modulo) ) {
      return "Selecione um modulo!";
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "DELETE FROM modulos WHERE mod_id = :modulo";
    $deletar = $banco->getConexao()->prepare($query);

    $deletar->bindParam(":modulo",$id_modulo,PDO::PARAM_INT);

    $deletar->execute();

    if ($deletar->rowCount()) {

      return true;
    }

    return false;
  }
}
