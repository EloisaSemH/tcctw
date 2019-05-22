<?php
    setlocale(LC_ALL, 'pt_BR');
    date_default_timezone_set('America/Sao_Paulo');

    session_start();

    @$pag = $_GET['pg'];
    if($pag == NULL || $pag == ''){
        if(!isset($_SESSION['logado'])){
            $_SESSION['logado'] = 0;
            $_SESSION['cod_usuario'] = '';
        }
        ?>
        <script type="text/javascript">
            document.location.href = "index.php?&pg=!";
        </script>
        <?php
    }

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
            document.location.href = "index.php?&pg=!";
        </script>
        <?php
        $_SESSION['logado'] = 0;
    }

    include('pags/cabecalho.php');
    include('pags/menu.php');

    switch($pag) {
        //Menu
        case 'inicio':
            include('pags/inicio.php');
            break;
        case 'galeria':
            include('pags/galeria.php');
            break;
        case 'eventos':
            include('pags/eventos.php');
            break;
        case 'noticias':
            include('pags/noticias.php');
            break;
        // case 'contato':
        //     include('pags/contato.php');
        //     break;
        case 'login':
            include('pags/login.php');
            break;
        case 'cadastro':
            include('pags/cadastro.php');
            break;
        case 'pesquisar':
            include('pags/pesquisar.php');
            break;
        //Login
        case 'recuperarsenha':
            include('pags/recuperarsenha.php');
            break;
        case 'redefinirsenha':
            include('pags/redefinirsenha.php');
            break;
        case 'adm':
            include('pags/adm.php');
            break;
        //Noticias
        case 'noticia':
            include('pags/noticia.php');
            break;
        case 'publicarnoticia':
            include('pags/publicarnoticia.php');
            break;
        case 'noticiaspendentes':
            include('pags/noticiaspendentes.php');
            break;
        case 'editarnoticia':
            include('pags/editarnoticia.php');
            break;
        //Usuário
        case 'todosusuarios':
            include('pags/todosusuarios.php');
            break;
        case 'editarusuario':
            include('pags/editarusuario.php');
            break;
        case 'editandousuario':
            include('pags/editandousuario.php');
            break;
        case 'usuariopg':
            include('pags/usuariopg.php');
            break;
        //Galeria
        case 'publicarfoto':
            include('pags/publicarfoto.php');
            break;
        case 'editarfoto':
            include('pags/editarfoto.php');
            break;
        case 'foto':
            include('pags/foto.php');
            break;
        default:
            include('pags/inicio.php');
            break;
    }

    include('pags/rodape.php');
?>
