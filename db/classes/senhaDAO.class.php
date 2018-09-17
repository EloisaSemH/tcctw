<?php

require_once ("conexao.class.php");

class senhaDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(senha $entSenha) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO senha VALUES (:us_cod, :se_senha)");
            $param = array(
                ":us_cod" => $entSenha->getUs_cod(),
                ":se_senha" => md5($entSenha->getSe_senha())
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 01: {$ex->getMessage()}";
        }
    }

}
