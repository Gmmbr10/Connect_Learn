<?php

class GrupoModel
{

  public function post()
  {

    $id_desafio = filter_input(INPUT_GET, "desafio", FILTER_DEFAULT);
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erros = [];

    if (empty($dados["equipe"])) {
      $erros[] = "Escreva o nome de sua equipe";
    }

    if (empty($dados["checkbox"])) {
      $erros[] = "Escolha um tipo para sua equipe";
    } else {

      if ($dados["checkbox"] == "privado" && empty($dados["senha"])) {
        $erros[] = "Escreva uma senha para entrar na sua equipe";
      }
    }

    if (!empty($erros)) {
      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    if ($dados["senha"]) {

      $senha = password_hash($dados["senha"], PASSWORD_DEFAULT);

      $query = "INSERT INTO grupos ( gru_nome , gru_id_fundador , gru_id_desafio , gru_tipo , gru_senha ) VALUES ( :nome , :fundador , :desafio , :tipo , :senha )";
      $cadastrar = $banco->getConexao()->prepare($query);

      $cadastrar->bindParam(":nome", $dados["nome"], PDO::PARAM_STR);
      $cadastrar->bindParam(":fundador", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);
      $cadastrar->bindParam(":desafio", $id_desafio, PDO::PARAM_INT);
      $cadastrar->bindParam(":tipo", 2, PDO::PARAM_INT);
      $cadastrar->bindParam(":senha", $senha, PDO::PARAM_STR);

      $cadastrar->execute();

      if ($cadastrar->rowCount()) {

        return true;
      }

      return ["Houve um erro durante o processo :("];
    }

    $query = "INSERT INTO grupos ( gru_nome , gru_id_fundador , gru_id_desafio , gru_tipo ) VALUES ( :nome , :fundador , :desafio , :tipo )";
    $cadastrar = $banco->getConexao()->prepare($query);

    $cadastrar->bindParam(":nome", $dados["nome"], PDO::PARAM_STR);
    $cadastrar->bindParam(":fundador", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);
    $cadastrar->bindParam(":desafio", $id_desafio, PDO::PARAM_INT);
    $cadastrar->bindParam(":tipo", 1, PDO::PARAM_INT);

    $cadastrar->execute();

    if ($cadastrar->rowCount()) {

      return true;
    }

    return ["Houve um erro durante o processo :("];
  }

  public function get($id_grupo = null)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    if (!empty($id_grupo)) {

      $query = "SELECT * FROM grupos WHERE gru_id = :id";
      $buscar = $banco->getConexao()->prepare($query);
      $buscar->bindParam(":id", $id_grupo, PDO::PARAM_INT);
      $buscar->execute();

      if ($buscar->rowCount()) {

        return $buscar->fetch(PDO::FETCH_ASSOC);
      }

      return ["Grupo não encontrado"];
    }

    $query = "SELECT * FROM grupos";
    $buscar = $banco->getConexao()->prepare($query);
    $buscar->execute();

    if ($buscar->rowCount()) {

      $grupos = "";

      while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {
        $grupos .= '<section class="box">
        <section class="row align-center justify-between">
          <p class="bold">
            ' . $linha["gru_nome"] . '
          </p>
  
          <a class="btn">Juntar</a>
        </section>
      </section>';
      }

      return $grupos;
    }

    return ["Nenhum grupo registrado"];
  }

  public function delete($id_grupo)
  {

    if ( empty($id_grupo) ) {
      return ["Insira o id do grupo"];
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "DELETE FROM grupos WHERE gru_id = :grupo AND gru_id_fundador = :usuario";
    $deletar = $banco->getConexao()->prepare($query);

    $deletar->bindParam(":grupo",$id_grupo,PDO::PARAM_INT);
    $deletar->bindParam(":usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

    $deletar->execute();

    if ( $deletar->rowCount() ) {

      return true;
    }

    return ["Houve um erro durante o processo :("];
    
  }
  
}
