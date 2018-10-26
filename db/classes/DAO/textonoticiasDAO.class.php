<?php
require_once ("conexao.class.php");
class textonoticiasDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(textonoticias $enttextonoticias) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO textonoticias VALUES (:not_cod, :text_texto)");
            $param = array(
                ":not_cod" => $enttextonoticias->getNot_cod(),
                ":text_texto" => $enttextonoticias->getText_texto()
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 201: {$ex->getMessage()}";
        }
    }
}