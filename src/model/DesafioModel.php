<?php

class DesafioModel
{
  public function post($id_foto)
  {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erros = [];

    if (empty($dados["desafio"])) {
      $erros[] = "Preencha o campo do título do desafio!";
    }

    if (empty($dados["conteudo"])) {
      $erros[] = "Escreva uma descrição para o desafio!";
    }

    if (empty($dados["link"])) {
      $erros[] = "Cole o link do discord de seu desafio!";
    }

    if (empty($id_foto)) {
      $erros[] = "Insira uma imagem";
    }

    if (!empty($erros)) {

      return $erros;
    }

    $desafio["desafio"] = $dados["desafio"];
    $desafio["descricao"] = $dados["conteudo"];
    $desafio["url"] = $dados["link"];
    $desafio["usuario"] = $_SESSION["usuario"]["usu_id"];

    require_once __DIR__ . "/../core/Banco.php";

    $conexao = new Banco();
    $query = "INSERT INTO desafios (des_titulo,des_descricao,des_id_usuario,des_url,des_id_foto) VALUE (:titulo,:descricao,:id_usuario,:discord,:foto)";
    $cadastrar = $conexao->getConexao()->prepare($query);

    $cadastrar->bindParam(":titulo", $desafio["desafio"], PDO::PARAM_STR);
    $cadastrar->bindParam(":descricao", $desafio["descricao"], PDO::PARAM_STR);
    $cadastrar->bindParam(":discord", $desafio["url"], PDO::PARAM_STR);
    $cadastrar->bindParam(":id_usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);
    $cadastrar->bindParam(":foto", $id_foto, PDO::PARAM_INT);

    $cadastrar->execute();

    if ($cadastrar->rowCount()) {

      return true;
    } else {

      $erros[] = "Houve algum erro durante o cadastro :(";

      return $erros;
    }
  }

  public function get($id_desafio = null)
  {

    require_once(__DIR__ . "/../core/Banco.php");
    $conexao = new Banco();

    if ($id_desafio != null) {

      $query = "SELECT * FROM desafios INNER JOIN usuarios ON desafios.des_id_usuario = usuarios.usu_id INNER JOIN arquivos ON desafios.des_id_foto = arquivos.arq_id WHERE des_id = :id_desafio";
      $buscar = $conexao->getConexao()->prepare($query);

      $buscar->bindParam(":id_desafio", $id_desafio, PDO::PARAM_INT);

      $buscar->execute();

      if ($buscar->rowCount()) {

        return $buscar->fetch(PDO::FETCH_ASSOC);
      }

      return false;
    }

    $query = "SELECT * FROM desafios INNER JOIN usuarios ON desafios.des_id_usuario = usuarios.usu_id INNER JOIN arquivos ON desafios.des_id_foto = arquivos.arq_id";
    $buscar = $conexao->getConexao()->prepare($query);

    $buscar->execute();

    if ($buscar->rowCount()) {

      $string = "";

      while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {
        $string .= '<a href="desafios?action=visualizar&desafio='. $linha["des_id"] .'" class="box-2">
        <header>
          <img src="'. $linha["arq_caminho"] .'">
        </header>
        <main>
          '. $linha["des_titulo"] .'
        </main>
      </a>';
      }

      return $string;
    }

    return false;
  }

  public function path()
  {

    $id_desafio = filter_input(INPUT_GET,"desafio",FILTER_DEFAULT);
    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $erros = [];

    if ( empty($dados["desafio"]) ) {

      $erros[] = "Escreva o título do desafio";

    }

    if ( empty($dados["conteudo"]) ) {

      $erros[] = "Escreva a descrição do desafio";

    }

    if ( empty($dados["link"]) ) {

      $erros[] = "Cole o link do discord";

    }

    if ( !empty($erros) ) {

      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "UPDATE desafios SET des_titulo = :titulo,des_descricao = :descricao,des_url = :discord WHERE des_id = :id_desafio AND des_id_usuario = :id_usuario";
    $atualizar = $banco->getConexao()->prepare($query);

    $atualizar->bindParam(":titulo",$dados["desafio"],PDO::PARAM_STR);
    $atualizar->bindParam(":descricao",$dados["conteudo"],PDO::PARAM_STR);
    $atualizar->bindParam(":discord",$dados["link"],PDO::PARAM_STR);
    $atualizar->bindParam(":id_desafio",$id_desafio,PDO::PARAM_INT);
    $atualizar->bindParam(":id_usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

    $atualizar->execute();

    if ( $atualizar->rowCount() ) {

      return true;
    }

    return "Houve um erro durante o processo :(";
    
  }

  public function delete($id_desafio)
  {

    if ( empty($id_desafio) ) {

      return "Selecione o desafio";
    }
    
    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "DELETE FROM desafios WHERE des_id = :id_desafio AND des_id_usuario = :id_usuario";
    $deletar = $banco->getConexao()->prepare($query);

    $deletar->bindParam(":id_desafio",$id_desafio,PDO::PARAM_INT);
    $deletar->bindParam(":id_usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

    $deletar->execute();

    if ($deletar->rowCount()) {

      return true;
    }

    return "Houve um erro durante o processo";
  }
}
