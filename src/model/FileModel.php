<?php

class FileModel
{

  public function post($file)
  {

    $foto = $file;
    $error = [];

    if ($foto["size"] == 0) {

      $error[] = "Escolha uma imagem";
    }

    if (count($error) == 0) {

      $extensao = str_replace("image/", "", $foto["type"]);

      $extensoes = ["png", "jpg", "jpeg"];

      if (!in_array($extensao, $extensoes)) {

        $error[] = "Utilize uma das extensões a seguir: png, jpg ou jpeg";
      }

      if (count($error) == 0) {

        $nomeImagem = md5(uniqid(time())) . "." . $extensao;

        $caminhoImagem = __DIR__ . "/../view/fotos/" . $nomeImagem;
        
        if ( move_uploaded_file($foto["tmp_name"], $caminhoImagem) ) {
          
          $caminhoImagem = "{include_path}src/view/fotos/" . $nomeImagem;
          require_once __DIR__ . "/../core/Banco.php";
          $banco = new Banco();
          $query = "INSERT INTO arquivos ( arq_id_usuario , arq_caminho ) VALUES ( :usuario , :caminho )";
          $cadastrar = $banco->getConexao()->prepare($query);

          $cadastrar->bindParam(":usuario",$_SESSION["usuario"]["usu_id"],PDO::PARAM_INT);
          $cadastrar->bindParam(":caminho",$caminhoImagem,PDO::PARAM_STR);

          $cadastrar->execute();

          if ( $cadastrar->rowCount() ) {

            return $this->Get($caminhoImagem);

          }

          return "Houve um erro durante o processo :(";

        }

        return "Houve um erro durante o processo de upload :(";

      }

      return $error;
    }

    return $error;
  }

  private function Get($caminho)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "SELECT * FROM arquivos WHERE arq_caminho = :caminho";
    $retornar = $banco->getConexao()->prepare($query);

    $retornar->bindParam(":caminho",$caminho,PDO::PARAM_STR);

    $retornar->execute();

    return $retornar->fetch(PDO::FETCH_ASSOC);
    
  }

  public function path($id_file,$foto)
  {

    require_once __DIR__ . "/../core/Banco.php";
    $banco = new Banco();
    $query = "SELECT * FROM arquivos WHERE arq_id = :id";
    $retornar = $banco->getConexao()->prepare($query);

    $retornar->bindParam(":id",$id_file,PDO::PARAM_STR);

    $retornar->execute();

    $arquivo = str_replace("{include_path}",__DIR__ . "/",$retornar->fetch(PDO::FETCH_ASSOC)["arq_caminho"]);
    
    var_dump($arquivo);
    var_dump($foto);
    move_uploaded_file($foto["tmp_name"], $arquivo);
    
  }
  
}
