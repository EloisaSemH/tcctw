<?php
    //Setando a linguagem e localização
    setlocale(LC_ALL, 'pt_BR');
    //Setando a localização do fuso horário
    date_default_timezone_set('America/Sao_Paulo');

    session_start();
    require_once ("db/classes/DAO/usuarioDAO.class.php");
    $usuarioDAO = new usuarioDAO();

    if (isset($_SESSION['logado']) == 1) {
        ?>
        <script type="text/javascript">
            document.location.href = "painel.php";
        </script>
        <?php
    }

    @$pag = $_GET['pg'];

    include('pags/cabecalho.php');

    if($pag == 'inicio'){
        include('pags/inicio.php');
    }elseif($pag == 'contato'){
        include('pags/contato.php');
    }elseif($pag == 'galeria'){
        include('pags/galeria.php');
    }elseif($pag == 'login'){
        include('pags/login.php');
    }elseif($pag == 'cadastro'){
        include('pags/cadastro.php');
    }elseif($pag == 'eventos'){
        include('pags/eventos.php');
    }else{
        include('pags/inicio.php');
    }

    include('pags/rodape.php');
?>