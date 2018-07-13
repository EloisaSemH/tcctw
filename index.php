<?php
//index
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