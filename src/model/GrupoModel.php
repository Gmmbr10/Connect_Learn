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
      $tipo = 2;

      $cadastrar->bindParam(":nome", $dados["equipe"], PDO::PARAM_STR);
      $cadastrar->bindParam(":fundador", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);
      $cadastrar->bindParam(":desafio", $id_desafio, PDO::PARAM_INT);
      $cadastrar->bindParam(":tipo", $tipo, PDO::PARAM_INT);
      $cadastrar->bindParam(":senha", $senha, PDO::PARAM_STR);

      $cadastrar->execute();

      if ($cadastrar->rowCount()) {

        return true;
      }

      return ["Houve um erro durante o processo :("];
    }

    $query = "INSERT INTO grupos ( gru_nome , gru_id_fundador , gru_id_desafio , gru_tipo ) VALUES ( :nome , :fundador , :desafio , :tipo )";
    $cadastrar = $banco->getConexao()->prepare($query);
    $tipo = 1;

    $cadastrar->bindParam(":nome", $dados["equipe"], PDO::PARAM_STR);
    $cadastrar->bindParam(":fundador", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);
    $cadastrar->bindParam(":desafio", $id_desafio, PDO::PARAM_INT);
    $cadastrar->bindParam(":tipo", $tipo, PDO::PARAM_INT);

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

      return "Grupo não encontrado";
    }

    $desafio = filter_input(INPUT_GET,"desafio",FILTER_DEFAULT);
    $query = "SELECT * FROM grupos WHERE gru_id_desafio = :desafio";
    $buscar = $banco->getConexao()->prepare($query);
    $buscar->bindParam(":desafio", $desafio ,PDO::PARAM_INT);
    $buscar->execute();

    if ($buscar->rowCount()) {

      $grupos = "";

      while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {
        $grupos .= '<section class="box">
        <section class="row align-center justify-between">
          <p class="bold">
            ' . $linha["gru_nome"] . '
          </p>

          <input type="hidden" name="id_equipe" value="' . $linha["gru_id"] . '">
  
          <button type="submit" class="btn">Juntar</button>
        </section>
      </section>';
      }

      return $grupos;
    }

    return "Nenhum grupo registrado";
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

  public function juntar()
  {

    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

    if ( empty($dados["id_equipe"]) ) {
      return "Escolha uma equipe válida";
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "INSERT INTO usuarios_grupos VALUES ( :grupo , :usuario )";
    $juntar = $banco->getConexao()->prepare($query);

    $juntar->bindParam(":grupo",$dados["id_equipe"],PDO::PARAM_INT);
    $juntar->bindParam(":usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

    $juntar->execute();

    if ( $juntar->rowCount() ) {

      return true;
    }

    return "Houve um erro durante o processo :(";
  }
  
}
