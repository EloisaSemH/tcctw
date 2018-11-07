<?php
require_once ("conexao.class.php");
class comentarioDAO{
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function enviarComentario(comentario $entComentario){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO comentario VALUES ('', :com_not_cod, :com_us_cod, :com_texto, :com_data, :com_hora)");
            $param = array(
                ":com_not_cod" => $entComentario->getCom_not_cod(),
                ":com_us_cod" => $entComentario->getCom_us_cod(),
                ":com_texto" => $entComentario->getCom_texto(),
                ":com_data" => $entComentario->getCom_data(),
                ":com_hora" => $entComentario->getCom_hora()
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 601: {$ex->getMessage()}";
        }
    }

    function atualizarNoticia(comentario $entComentario){
        try {
            $stmt = $this->pdo->prepare("UPDATE comentario SET com_titulo = :com_titulo, com_subtitulo = :com_subtitulo, com_img = :com_img, com_cat = :com_cat, com_not_cod = :com_not_cod WHERE com_cod = :com_cod");
            $param = array(
                ":com_titulo" => $entComentario->getCom_titulo(),
                ":com_subtitulo" => $entComentario->getCom_subtitulo(),
                ":com_img" => $entComentario->getCom_img(),
                ":com_cat" => $entComentario->getCom_cat(),
                ":com_not_cod" => $entComentario->getCom_not_cod(),
                ":com_cod" => $entComentario->getCom_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 604: {$ex->getMessage()}";
        }
    }

    function excluirComentario(comentario $entComentario){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM comentario WHERE com_cod = :com_cod");
            $param = array(
                ":com_cod" => $entComentario->getCom_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 605: {$ex->getMessage()}";
        }
    }

    function contarNumeroComentarios($not_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM comentario WHERE com_not_cod = :not_cod");
            $param = array(":not_cod" => $not_cod);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->rowCount();
                return $consulta;
            }else{
                return 0;
            }
        } catch (PDOException $ex) {
            echo "ERRO 307: {$ex->getMessage()}";
        }
    }

    function pegarComentarios($not_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM comentario WHERE com_not_cod = :not_cod ORDER BY com_cod DESC");
            $param = array(":not_cod" => $not_cod);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                // $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                $num = 0;
                while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $num++;
                    $retorno["$num"]['com_cod'] = $dados['com_cod'];
                    $retorno["$num"]['com_not_cod'] = $dados['com_not_cod'];
                    $retorno["$num"]['com_us_cod'] = $dados['com_us_cod'];
                    $retorno["$num"]['com_texto'] = $dados['com_texto'];
                    $retorno["$num"]['com_data'] = $dados['com_data'];
                    $retorno["$num"]['com_hora'] = $dados['com_hora'];
                }
                return $retorno;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 302: {$ex->getMessage()}";
        }
    }

}