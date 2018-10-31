<?php
    setlocale(LC_ALL, 'pt_BR');
    date_default_timezone_set('America/Sao_Paulo');

    session_start();

    @$pag = $_GET['pg'];
    if($pag == NULL || $pag == ''){
        if(!isset($_SESSION['logado'])){
            $_SESSION['logado'] = 0;
        }
        ?>
        <script type="text/javascript">
            document.location.href = "index.php?&pg=!";
        </script>
        <?php
    }

    // echo $_SESSION['logado'];

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
    } #Menu
    elseif($pag == 'contato'){
        include('pags/contato.php');
    }elseif($pag == 'galeria'){
        include('pags/galeria.php');
    }elseif($pag == 'login'){
        include('pags/login.php');
    }elseif($pag == 'cadastro'){
        include('pags/cadastro.php');
    }elseif($pag == 'noticias'){
        include('pags/noticias.php');
    }elseif($pag == 'eventos'){
        include('pags/eventos.php');
    } #Login
    elseif($pag == 'painel'){
        include('pags/painel.php');
    }elseif($pag == 'adm'){
        include('pags/adm.php');
    }elseif($pag == 'postador'){
        include('pags/postador.php');
    } #admin
    elseif($pag == 'publicarnoticia'){
        include('pags/publicarnoticia.php');
    }elseif($pag == 'editarusuario'){
        include('pags/editarusuario.php');
    }elseif($pag == 'noticiaspendentes'){
        include('pags/noticiaspendentes.php');
    }elseif($pag == 'Editar usuário'){
        include('pags/Editar usuário.php');
    }elseif($pag == 'editandousuario'){
        include('pags/editandousuario.php');
    }elseif($pag == 'usuariopg'){
        include('pags/usuariopg.php');
    // }elseif($pag == ''){
    //     include('pags/.php');
    }elseif($pag == 'noticia'){
    include('pags/noticia.php');
    }else{
        include('pags/inicio.php');
}
    include('pags/rodape.php');
?>