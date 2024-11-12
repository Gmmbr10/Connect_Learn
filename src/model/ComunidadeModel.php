<?php

class ComunidadeModel
{

  public function post()
  {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erros = [];

    if (empty($dados["comunidade"])) {

      $erros[] = "Escreva o nome da comunidade";
    }

    if (empty($dados["link"])) {

      $erros[] = "Insira o link do discord de sua comunidade";
    }

    if (!empty($erros)) {

      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "INSERT INTO comunidades ( com_nome , com_link , com_id_fundador ) VALUES ( :nome , :com_link , :id )";
    $cadastrar = $banco->getConexao()->prepare($query);

    $cadastrar->bindParam(":nome", $dados["comunidade"], PDO::PARAM_STR);
    $cadastrar->bindParam(":com_link", $dados["link"], PDO::PARAM_STR);
    $cadastrar->bindParam(":id", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

    $cadastrar->execute();

    if ($cadastrar->rowCount()) {

      return true;
    }

    return "Houve um problema durante o processo :(";
  }

  public function get($id_comunidade = null)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();

    if ( $id_comunidade != null ) {

      $query = "SELECT * FROM comunidades WHERE com_id = :comunidade AND com_id_fundador = :usuario";
      $buscar = $banco->getConexao()->prepare($query);

      $buscar->bindParam(":comunidade",$id_comunidade,PDO::PARAM_INT);
      $buscar->bindParam(":usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);

      $buscar->execute();

      if ($buscar->rowCount()) {

        return $buscar->fetch(PDO::FETCH_ASSOC);

      }

      return "Comunidade não encontrada!";

    }

    if ($_SESSION["usuario"]["usu_tipo"] == 1) {

      $query = "SELECT * FROM comunidades INNER JOIN usuarios ON comunidades.com_id_fundador = usuarios.usu_id";
      $buscar = $banco->getConexao()->prepare($query);

      $buscar->execute();

      if ($buscar->rowCount()) {

        $string = "";

        while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

          $string .= '
            <section class="box">
            <header>
              <p>' . $linha["com_nome"] . '</p>
            </header>
            <main>
              <span>
                <a href="' . $linha["com_link"] . '" class="btn" target="__blank">Entrar</a>
              </span>
            </main>
          </section>
          ';
        }

        return $string;
      }

      return "Nenhuma comunidade registrada";
    }

    $query = "SELECT * FROM comunidades INNER JOIN usuarios ON comunidades.com_id_fundador = usuarios.usu_id";
    $buscar = $banco->getConexao()->prepare($query);

    $buscar->execute();

    if ($buscar->rowCount()) {

      $string = "";

      while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

        $string .= '
        <section class="box">
        <header class="row gap-2">
          ' . $linha["com_nome"] . '
        </header>
        <main>
          <span>
            <a href="' . $linha["com_link"] . '" class="btn">Abrir comunidade</a>
          </span>
          <span>
            <a href="{include_path}teacher/comunidades?action=editar&comunidade=' . $linha["com_id"] . '" class="btn">Editar</a>
          </span>
          <span>
            <a href="{include_path}teacher/comunidades?action=deletar&comunidade=' . $linha["com_id"] . '" class="btn btn-error">Deletar</a>
          </span>
        </main>
      </section>
      ';
      }

      return $string;
    }

    return "Nenhuma comunidade registrada";
  }

  public function path()
  {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erros = [];

    if (empty($dados["comunidade"])) {
      $erros[] = "Escreva o nome da comunidade";
    }

    if (empty($dados["link"])) {
      $erros[] = "Cole o link de convite da comunidade";
    }

    if (!empty($erros)) {
      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "UPDATE comunidades SET com_nome = :nome , com_link = :link WHERE com_id = :comunidade AND com_id_fundador = :usuario";
    $atualizar = $banco->getConexao()->prepare($query);

    $atualizar->bindParam(":nome", $dados["comunidade"], PDO::PARAM_STR);
    $atualizar->bindParam(":link", $dados["link"], PDO::PARAM_STR);
    $atualizar->bindParam(":comunidade", $dados["id_comunidade"], PDO::PARAM_INT);
    $atualizar->bindParam(":usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

    $atualizar->execute();

    if ($atualizar->rowCount()) {
      return true;
    }

    return "Houve um erro durante o processo :(";
  }

  public function delete($id_comunidade)
  {

    if (empty($id_comunidade)) {

      return "Selecione uma comunidade";
    }

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "DELETE FROM comunidades WHERE com_id = :comunidade AND com_id_fundador = :fundador";
    $deletar = $banco->getConexao()->prepare($query);

    $deletar->bindParam(":comunidade", $id_comunidade, PDO::PARAM_INT);
    $deletar->bindParam(":fundador", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

    $deletar->execute();

    if ($deletar->rowCount()) {

      return true;
    }

    return "Houve um erro durante o processo :(";
  }
}
