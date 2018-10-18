<?php
require_once ("conexao.class.php");
class usuarioDAO {

    private $us_email;

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(usuario $entUsuario) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO usuario VALUES ('', :us_nome, :us_email, :us_sexo, :us_data, :us_hora, :us_ip, :us_tipo)");
            $param = array(
                ":us_nome" => $entUsuario->getUs_nome(),
                ":us_email" => $entUsuario->getUs_email(),
                ":us_sexo" => $entUsuario->getUs_sexo(),
                ":us_data" => date("Y/m/d"),
                ":us_hora" => date("H:i:s"),
                ":us_ip" => $_SERVER["REMOTE_ADDR"],
                ":us_tipo" => '1'
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 01: {$ex->getMessage()}";
        }
    }

    function consultarCodUsuario($us_email) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE us_email = :us_email");
            $param = array(":us_email" => $us_email);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta['us_cod'];
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 02: {$ex->getMessage()}";
        }
    }

    function consultarEmail($us_email) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE us_email = :us_email");
            $param = array(":us_email" => $us_email);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        } catch (PDOException $ex) {
            echo "ERRO 03: {$ex->getMessage()}";
        }
    }
    
    function login($us_email, $se_senha) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario INNER JOIN senha ON senha.usuario_us_cod = usuario.us_cod WHERE usuario.us_email = :us_email AND senha.se_senha = :se_senha");
            $param = array(
                ":us_email" => $us_email,
                ":se_senha" => md5($se_senha)
            );
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){

                $this->us_email = $us_email;

                return TRUE;
            }else{
                return FALSE;
            }
        } catch (PDOException $ex) {
            echo "ERRO 04: {$ex->getMessage()}";
        }
    }

    function consultarTipoUsuario($us_email) {
        try {
            $stmt = $this->pdo->prepare("SELECT us_tipo FROM usuario WHERE us_email = :us_email");
            $param = array(":us_email" => $us_email);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta['us_tipo'];
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 05: {$ex->getMessage()}";
        }
    }

    function pegarInfos($us_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE us_cod = :us_cod");
            $param = array(":us_cod" => $us_cod);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 06: {$ex->getMessage()}";
        }
    }

    function atualizarUsuario(usuario $entUsuario){
        try {
            $stmt = $this->pdo->prepare("UPDATE usuario SET us_nome = :us_nome, us_email = :us_email, us_sexo = :us_sexo, us_tipo = :us_tipo WHERE us_cod = :us_cod");
            $param = array(
                ":us_nome" => $entUsuario->getUs_nome(),
                ":us_email" => $entUsuario->getUs_email(),
                ":us_sexo" => $entUsuario->getUs_sexo(),
                ":us_tipo" => $entUsuario->getUs_tipo(),
                ":us_cod" => $entUsuario->getUs_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 07: {$ex->getMessage()}";
        }
    }

    function excluirUsuario(usuario $entUsuario){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE us_cod = :us_cod");
            $param = array(
                ":us_cod" => $entUsuario->getUs_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 08: {$ex->getMessage()}";
        }
    }
}
?>