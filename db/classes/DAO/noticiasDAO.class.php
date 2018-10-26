<?php
require_once ("conexao.class.php");
class noticiasDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function inserirNoticia(noticias $entNoticias){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO noticias VALUES ('', :not_autor, :not_titulo, :not_subtitulo, :not_data, :not_hora, :not_img, :not_ativo)");
            $param = array(
                ":not_autor" => $entNoticias->getNot_autor(),
                ":not_titulo" => $entNoticias->getNot_titulo(),
                ":not_subtitulo" => $entNoticias->getNot_subtitulo(),
                ":not_data" => $entNoticias->getNot_data(),
                ":not_hora" => $entNoticias->getNot_hora(),
                ":not_img" => $entNoticias->getNot_img(),
                ":not_ativo" => '0'
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 301: {$ex->getMessage()}";
        }
    }

    function pegarNoticias($condicao){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias :condicao ORDER BY id DESC");
            $param = array(":condicao" => $condicao);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 302: {$ex->getMessage()}";
        }
    }

    function pegarNoticiasAtivas(){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_ativo = :not_ativo ORDER BY id DESC LIMIT 15");
            $param = array(":not_ativo" => 1);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 303: {$ex->getMessage()}";
        }
    }

    function atualizarNoticia(noticias $entNoticias){
        try {
            $stmt = $this->pdo->prepare("UPDATE noticias SET not_titulo = :not_titulo, not_subtitulo = :not_subtitulo, not_data = :not_data, not_hora = :not_hora, not_ativo = :not_ativo WHERE not_cod = :not_cod");
            $param = array(
                ":not_titulo" => $entNoticias->getNot_titulo(),
                ":not_subtitulo" => $entNoticias->getNot_subitulo(),
                ":not_data" => date("Y/m/d"),
                ":not_hora" => date("H:i:s"),
                ":not_ativo" => $entNoticias->getNot_ativo(),
                ":not_cod" => $entNoticias->getNot_cod(),
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 304: {$ex->getMessage()}";
        }
    }

    function excluirNoticias(noticias $entNoticias){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM noticias WHERE not_cod = :not_cod");
            $param = array(
                ":not_cod" => $entNoticias->getNot_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 305: {$ex->getMessage()}";
        }
    }

    function consultarCodNotDataHora($not_data, $not_hora) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_data = :not_data AND not_hora = :not_hora");
            $param = array(":not_data" => $not_data, ":not_hora" => $not_hora);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta['not_cod'];
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 306: {$ex->getMessage()}";
        }
    }
}