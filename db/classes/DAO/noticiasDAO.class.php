<?php
require_once ("conexao.class.php");
class noticiasDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function inserirNoticia(noticias $entNoticias){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO noticias VALUES ('', :not_autor, :not_titulo, :not_subtitulo, :not_data, :not_hora, :not_img, :not_cat, :not_ativo)");
            $param = array(
                ":not_autor" => $entNoticias->getNot_autor(),
                ":not_titulo" => $entNoticias->getNot_titulo(),
                ":not_subtitulo" => $entNoticias->getNot_subtitulo(),
                ":not_data" => $entNoticias->getNot_data(),
                ":not_hora" => $entNoticias->getNot_hora(),
                ":not_img" => $entNoticias->getNot_img(),
                ":not_cat" => $entNoticias->getNot_cat(),
                ":not_ativo" => '0'
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 301: {$ex->getMessage()}";
        }
    }

    function pegarNoticia($not_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_cod = :not_cod");
            $param = array(":not_cod" => $not_cod);
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

    function pegarNoticiasAtivasOuNao($num){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_ativo = :not_ativo ORDER BY not_cod DESC");
            $param = array(":not_ativo" => $num);
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
            $stmt = $this->pdo->prepare("UPDATE noticias SET not_titulo = :not_titulo, not_subtitulo = :not_subtitulo, not_img = :not_img, not_cat = :not_cat, not_ativo = :not_ativo WHERE not_cod = :not_cod");
            $param = array(
                ":not_titulo" => $entNoticias->getNot_titulo(),
                ":not_subtitulo" => $entNoticias->getNot_subtitulo(),
                ":not_ativo" => $entNoticias->getNot_ativo(),
                ":not_img" => $entNoticias->getNot_img(),
                ":not_cat" => $entNoticias->getNot_cat(),
                ":not_cod" => $entNoticias->getNot_cod()
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

    function contarNoticiasAtivasOuNao($condicao){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_ativo = :not_ativo ORDER BY not_cod DESC");
            $param = array(":not_ativo" => $condicao);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->rowCount();
                return $consulta;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 307: {$ex->getMessage()}";
        }
    }

    function pegarTodasNoticias($limite, $quantpag){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_ativo = 1 ORDER BY not_cod DESC LIMIT :limite, :quantpag");
            $param = array(":limite" => $limite, ":quantpag" => $quantpag);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $cel = $stmt->rowCount();
                $col = 1;
                $qtdcol = $quantpag;
                $celconstruida = 0;
                $colConstruida = 0;
                echo '<table class="table">';        
                for ($a = 0; $a < $qtdcol; $a++) {
                    if ($col == 1) {
                        echo '<tr>';
                        $celconstruida++;
                    }
                    if ($celconstruida <= $cel) {
                        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $not_titulo = $dados['not_titulo'];
                            $not_subtitulo = $dados['not_subtitulo'];
                            echo '<td>';
                            echo '<a class="text-uppercase font-weight-bold text-dark" href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '">' . $not_titulo . '</a>';
                            if($not_subtitulo !== '' && $not_subtitulo !== ' ' && $not_subtitulo !== NULL){
                                echo '<br/><a class="text-dark" href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '">' . $not_subtitulo . '</a>';
                            }
                            echo '</td>';
                            echo '</tr>';

                            $colConstruida++;
                            if($colConstruida == $qtdcol){
                                $colConstruida = 0;
                            }
                        }
                    }
                }
            echo '</table>';
            }else{
                
            }
        }catch (PDOException $ex){
            echo "ERRO 308: {$ex->getMessage()}";
        }
    }
}