<?php

class DuvidaModel
{

  public function post()
  {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erros = [];

    if (empty($dados["conteudo"])) {

      $erros[0] = "Escreva sua dúvida";
    }

    if (!empty($erros)) {

      return $erros;
    }

    require_once __DIR__ . "/../core/Banco.php";

    $conexao = new Banco();
    $query = "INSERT INTO duvidas (duv_texto,duv_id_usuario) VALUES (:texto,:id_usuario)";
    $cadastrar = $conexao->getConexao()->prepare($query);

    $cadastrar->bindParam(":texto", $dados["conteudo"], PDO::PARAM_STR);
    $cadastrar->bindParam(":id_usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

    $cadastrar->execute();

    if ($cadastrar->rowCount()) {

      return true;
    } else {

      $erros[2] = "Houve algum erro durante o cadastro :(";

      return $erros;
    }
  }

  public function get($id_duvida = null)
  {

    require_once __DIR__ . "/../core/Banco.php";

    $conexao = new Banco();

    if ( $id_duvida != null ) {

      $query = "SELECT * FROM duvidas INNER JOIN usuarios ON duvidas.duv_id_usuario = usuarios.usu_id WHERE duv_id = :id_duvida";
      $buscar_duvida = $conexao->getConexao()->prepare($query);

      $buscar_duvida->bindParam(":id_duvida",$id_duvida,PDO::PARAM_INT);

      $buscar_duvida->execute();

      if ( $duvida = $buscar_duvida->fetch(PDO::FETCH_ASSOC) ) {

        $respostas = "";

        $query = "SELECT * FROM respostas INNER JOIN usuarios ON respostas.res_id_usuario = usuarios.usu_id WHERE res_id_duvida = :id_duvida";
        $buscar_respostas = $conexao->getConexao()->prepare($query);

        $buscar_respostas->bindParam(":id_duvida",$duvida["duv_id"],PDO::PARAM_INT);

        $buscar_respostas->execute();

        if ( $buscar_respostas->rowCount() ) {

          while ( $linha = $buscar_respostas->fetch(PDO::FETCH_ASSOC) ) {

            $respostas .= '<section class="box rounded">

              <header class="bg-primary">'. $linha["usu_nome"] .'</header>

              <main>'. $linha["res_texto"] .'</main>
            
            </section>';
            
          }
          
        } else {

          $respostas = '<p class="alert">Nenhuma resposta encontrada</p>';
          
        }

        return ["duvida"=>$duvida,"respostas"=>$respostas];

      }
      
      return false;

    }
    
    $query = "SELECT * FROM duvidas INNER JOIN usuarios ON duvidas.duv_id_usuario = usuarios.usu_id WHERE NOT duv_id_usuario = :id_usuario";
    $buscar = $conexao->getConexao()->prepare($query);

    $buscar->bindParam(":id_usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

    $buscar->execute();

    $outras_duvidas = "";
    $minhas_duvidas = "";

    if ($buscar->rowCount()) {

      while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

        $outras_duvidas .= '<a href="duvidas?action=responder&duvida='. $linha["duv_id"] .'" class="box">

        <header class="bg-primary row gap-1 align-center">
          <i class="fa-solid fa-user profile"></i>
          <p class="bold">' . $linha["usu_nome"] . '</p>
        </header>

        <main>

          ' . $linha["duv_texto"] . '

        </main>

      </a>';
      }
    } else {

      $outras_duvidas = "Nenhuma dúvida encontrado";
    }

    $query = "SELECT *, COUNT(respostas.res_id) AS num_respostas FROM duvidas LEFT JOIN respostas ON duvidas.duv_id = respostas.res_id_duvida WHERE duv_id_usuario = :id_usuario GROUP BY duv_id";
    $buscar = $conexao->getConexao()->prepare($query);

    $buscar->bindParam(":id_usuario", $_SESSION["usuario"]["usu_id"], PDO::PARAM_INT);

    $buscar->execute();

    if ($buscar->rowCount()) {

      while ($linha = $buscar->fetch(PDO::FETCH_ASSOC)) {

        $minhas_duvidas .= '<a href="duvidas?action=ver respostas&duvida='. $linha["duv_id"] .'" class="box">
        <header class="bg-primary">
          <p>
            <span class="bold">Respostas:</span>
            ' . $linha["num_respostas"] . '
          </p>
        </header>
        <main>
          ' . $linha["duv_texto"] . '
        </main>
      </a>';
      }
    } else {

      $minhas_duvidas = "Você ainda não enviou dúvidas";
    }

    return ["minhas" => $minhas_duvidas, "outras" => $outras_duvidas];
  }
}
