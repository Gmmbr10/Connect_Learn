<?php

class ConteudoModel
{

  public function getCursos($tema)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "SELECT * FROM cursos INNER JOIN usuarios ON cursos.cur_id_usuario = usuarios.usu_id WHERE cur_tema = :tema";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->bindParam(":tema", $tema, PDO::PARAM_INT);

    $buscar->execute();

    if ($buscar->rowCount()) {

      $string = "";

      while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

        $string .= '<a class="box-2 rounded flex justify-center align-center" href="{include_path}student/conteudos?action=visualizar&curso=' . $linha["cur_id"] . '">' . $linha["cur_nome"] . '</a>';
      }

      return $string;
    }

    return "Nenhum curso encontrado";
  }

  public function getCurso($id_curso)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "SELECT * FROM cursos INNER JOIN usuarios ON cursos.cur_id_usuario = usuarios.usu_id WHERE cur_id = :curso";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->bindParam(":curso", $id_curso, PDO::PARAM_INT);

    $buscar->execute();

    if ($buscar->rowCount()) {

      $string = [];

      $linha = $buscar->fetch(PDO::FETCH_ASSOC);

      $string["curso"] = $linha;

      $query = "SELECT * FROM modulos WHERE mod_id_curso = :curso";
      $buscar = $banco->getConexao()->prepare($query);

      $buscar->bindParam(":curso", $string["curso"]["cur_id"], PDO::PARAM_INT);

      $buscar->execute();

      if ($buscar->rowCount()) {

        $string["modulo"] = "";

        while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

          $query = "SELECT * FROM aulas WHERE aul_id_modulo = :modulo";
          $buscarAula = $banco->getConexao()->prepare($query);

          $buscarAula->bindParam(":modulo", $linha["mod_id"], PDO::PARAM_INT);

          $buscarAula->execute();

          if ( $buscarAula->rowCount() ) {

            $string["modulo"] .= "<details><summary class=\"p-2\">". $linha["mod_nome"] ."</summary><section>";
            
            while( $linhaAula = $buscarAula->fetch(PDO::FETCH_ASSOC) ){

              $string["modulo"] .= '<a href="./conteudos?action=visualizar&aula='. $linhaAula["aul_id"] .'" class="p-2">'. $linhaAula["aul_titulo"] .'</a>';
              
            }

            $string["modulo"] .= "</section></details>";

          } else {

            $string["modulo"] .= "<p>Nenhuma aula encontrada para este módulo</p>";
          }

        }

        return $string;
      }

      $string["modulo"] = "Nenhum módulo encontrado!";

      return $string;
    }

    return false;
  }

  public function getAula($id_aula)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    $query = "SELECT * FROM aulas INNER JOIN modulos ON aulas.aul_id_modulo = modulos.mod_id INNER JOIN cursos ON modulos.mod_id_curso = cursos.cur_id WHERE aulas.aul_id = :aula";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->bindParam(":aula",$id_aula,PDO::PARAM_INT);

    $buscar->execute();

    if ( $buscar->rowCount() ) {

      return $buscar->fetch(PDO::FETCH_ASSOC);
    }

    return false;
    
  }
}
