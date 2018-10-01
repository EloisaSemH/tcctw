<?php
    //Setando a linguagem e localização
    setlocale(LC_ALL, 'pt_BR');
    //Setando a localização do fuso horário
    date_default_timezone_set('America/Sao_Paulo');

    session_start();

    @$pag = $_GET['pg'];
    
    // if(isset($_SESSION['logado'])){
    //     $_SESSION['logado'] = 0;
    // }

    echo $_SESSION['logado'];

    if ($pag =='erro1') {
        ?>
        <script type="text/javascript">
            alert("Você não tem permissão para acessar o painel!");
            document.location.href = "index.php";
        </script>
        <?php
    }

    if ($pag == 'logout') {
        ?>
        <script type="text/javascript">
            alert("Até breve!");
        </script>
        <?php
        $_SESSION['logado'] = 0;
    }

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
    }elseif($pag == 'painel'){
        include('pags/painel.php');
    }elseif($pag == 'adm'){
        include('pags/adm.php');
    }else{
        include('pags/inicio.php');
    }

    include('pags/rodape.php');
    include('pags/js.php');
?>