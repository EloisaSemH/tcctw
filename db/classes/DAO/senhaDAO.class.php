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
            echo "ERRO 201: {$ex->getMessage()}";
        }
    }

    function verificacaoSenha($senha, $repSenha) {
        if ($senha == '' || $repSenha == '') {
            echo "<script language='javascript' type='text/javascript'>alert('Por favor, digite sua senha');window.location.href='#';</script>!";
        } else {
            if ($senha != $repSenha) {
                echo "<script language='javascript' type='text/javascript'>alert('As senhas digitadas não correspondem');window.location.href='#';</script>!";
            } else {
                $verificacao = TRUE;
                return $verificacao;
            }
        }
    }

    public function redefinirSenha($us_cod, $se_senha) {
        try {
            $stmt = $this->pdo->prepare("UPDATE senha set se_senha = :se_senha WHERE usuario_us_cod = :us_cod");

            $param = array(
                ":us_cod" => $us_cod,
                ":se_senha" => md5($se_senha)
            );
            
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 203: {$ex->getMessage()}";
        }
    }
}