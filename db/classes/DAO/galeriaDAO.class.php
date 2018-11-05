<?php
require_once ("conexao.class.php");
class galeriaDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function inserirFoto(galeria $entGaleria){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO galeria VALUES ('', :gal_img, :gal_titulo, :gal_desc)");
            $param = array(
                ":gal_img" => $entGaleria->getGal_img(),
                ":gal_titulo" => $entGaleria->getGal_titulo(),
                ":gal_desc" => $entGaleria->getGal_desc()
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 501: {$ex->getMessage()}";
        }
    }

    function atualizarFoto(galeria $entGaleria){
        try {
            $stmt = $this->pdo->prepare("UPDATE galeria SET gal_img = :gal_img, gal_titulo = :gal_titulo, gal_desc = :gal_desc WHERE gal_cod = :gal_cod");
            $param = array(
                ":gal_img" => $entGaleria->getGal_img(),
                ":gal_titulo" => $entGaleria->getGal_titulo(),
                ":gal_desc" => $entGaleria->getGal_desc(),
                ":gal_cod" => $entGaleria->getGal_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 502: {$ex->getMessage()}";
        }
    }

    function excluirFoto(galeria $entGaleria){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM galeria WHERE gal_cod = :gal_cod");
            $param = array(
                ":gal_cod" => $entGaleria->getGal_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 503: {$ex->getMessage()}";
        }
    }

    function contarFotos(){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM galeria ORDER BY :orderby DESC");
            $param = array(":orderby" => 'gal_cod');
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->rowCount();
                return $consulta;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 504: {$ex->getMessage()}";
        }
    }

    function pegarFoto($gal_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM galeria WHERE gal_cod = :gal_cod");
            $param = array(":gal_cod" => $gal_cod);
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


    function pegarFotos($limite, $quantpag){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM galeria ORDER BY gal_cod DESC LIMIT :limite, :quantpag");
            $param = array(":limite" => $limite, ":quantpag" => $quantpag);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $cel = $stmt->rowCount();
                $col = 1;
                $qtdcol = $quantpag;
                $celconstruida = 0;
                $colConstruida = 0;
                for ($a = 0; $a < $qtdcol; $a++) {
                    if ($col == 1) {
                        $celconstruida++;
                    }
                    if ($celconstruida <= $cel) {
                        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $gal_img = $dados['gal_img'];
                            $gal_titulo = $dados['gal_titulo'];
                            $gal_desc = $dados['gal_desc'];
                            echo '<div class="col-sm-4 mt-2">';
                                echo '<a href="#" style="text-decoration: none">';
                                    echo '<div class="card-header text-dark text-center" data-toggle="modal" data-target="#1">' . $gal_titulo . '</div>';
                                    if (file_exists('img/galeria/' . $gal_img) && !is_null($gal_img)) {
                                        echo '<img src="img/galeria/'. $gal_img . '" alt="' . $gal_titulo . '" class="img-thumbnail" data-toggle="modal" data-target="#1">';
                                    } else {
                                        echo '<img src="img/galeria/semfoto.jpg" class="img-thumbnail" alt="Sem foto" data-toggle="modal" data-target="#1" >';
                                    }
                                    echo '<div class="modal fade" id="1" tabindex="-1" role="dialog" aria-labelledby="2" aria-hidden="true">';
                                        echo '<div class="modal-dialog modal-dialog-centered" role="document">';
                                            echo '<div class="modal-content">';
                                                echo '<div class="modal-header">';
                                                    echo '<a href="index.php?&pg=foto&id=' . $dados['gal_cod'] . '">';
                                                        echo '<h5 class="modal-title text-dark" id="' . $dados['gal_cod'] . '">' . $gal_titulo . '</h5>';
                                                    echo '<a/>';
                                                    echo '<button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">';
                                                    echo '<a href="index.php?&pg=foto&id=' . $dados['gal_cod'] . '">';
                                                        echo '<span aria-hidden="true">&times;</span></button></div><div class="modal-body text-dark">';
                                                        if (file_exists('img/galeria/' . $gal_img) && !is_null($gal_img)) {
                                                            echo '<img src="img/galeria/'. $gal_img . '" alt="' . $gal_titulo . '" class="img-thumbnail" data-toggle="modal" data-target="#1">';
                                                        } else {
                                                            echo '<img src="img/galeria/semfoto.jpg" class="img-thumbnail" alt="Sem foto" data-toggle="modal" data-target="#1" >';
                                                        }
                                                        if(!is_null($gal_desc)){
                                                            echo  '<p class="text-center text-dark" style="text-decoration: none">' . $gal_desc . '</p>';
                                                        }
                                                    echo '</a>';
                                                    echo '<div class="modal-footer">';
                                                        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</a>';
                            echo '</div>';

                            $colConstruida++;
                            if($colConstruida == $qtdcol){
                                $colConstruida = 0;
                            }
                        }
                    }
                }
            }else{
                
            }
        }catch (PDOException $ex){
            echo "ERRO 506: {$ex->getMessage()}";
        }
    }
}