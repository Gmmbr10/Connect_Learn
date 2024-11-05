<?php

class Banco
{

  private static $usuario = "root";
  private static $senha = "root";
  private static $conexao = null;

  private static function Conectar()
  {

    try {

      if (self::$conexao == null) {

        self::$conexao = new PDO(
          "mysql:host=db;dbname=connect_learn",
          self::$usuario,self::$senha
        );
      }
    } catch (Exception $exeption) {

      echo "Error: " . $exeption;
      die();
    }
    return self::$conexao;
  }

  public function getConexao()
  {
    return self::Conectar();
  }
}
