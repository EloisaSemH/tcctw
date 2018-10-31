<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x" href="img/icone.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script type="text/javascript" src="js/script.js"></script>
    <title>Italianos em Itu</title>
  </head>
  <body>
<!-- O bagulho do topo, que pesquisa e tals -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php?&pg=inicio"><img src="img/Logo.png" height="50px" width="50px" alt="Logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active mx-auto">
              <a class="nav-link" href="index.php?&pg=inicio">Início <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item mx-auto">
              <a class="nav-link" href="index.php?&pg=galeria">Galeria</a>
          </li>
          <li class="nav-item mx-auto">
              <a class="nav-link" href="index.php?&pg=eventos">Eventos</a>
          </li>
          <li class="nav-item mx-auto">
              <a class="nav-link" href="index.php?&pg=noticias">Noticias</a>
          </li>
          <li class="nav-item mx-auto">
              <a class="nav-link" href="index.php?&pg=contato">Contato</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar">
          <button class="btn btn-outline-success my-2 my-sm-0 mx-auto" type="submit">Pesquisar</button>
        </form>

        <?php
          if ($_SESSION['logado'] == 1) {
            // Usuário comum
            ?>
            <form class="form-inline my-2 my-lg-0 ml-4">
              <a class="btn btn-success my-2 my-sm-0" href="index.php?&pg=painel">Painel de usuário</a>
              <a class="nav-link"  href="index.php?&pg=logout">Sair</a>
            </form>
            <?php
          }elseif ($_SESSION['logado'] == 2){
            // Usuário postador
            // Gisele é a mais linda
            ?>
          <form class="form-inline my-2 my-lg-0 ml-4">
              <a class="btn btn-success my-2 my-sm-0" href="index.php?&pg=postador">Painel de postagem</a>
              <a class="nav-link"  href="index.php?&pg=logout">Sair</a>
          </form>
          <?php
          }elseif ($_SESSION['logado'] == 3){
            // Webmaster
          ?>
          <form class="form-inline my-2 my-lg-0 ml-4">
              <a class="btn btn-success" href="index.php?&pg=adm">Painel administrador</a>
              <a class="nav-link"  href="index.php?&pg=logout">Sair</a>
          </form>
        <?php }else{ 
          // Normal ?>
          <form class="form-inline my-2 my-lg-0 ml-4">
              <a class="btn btn-success my-2 mr-2 my-sm-0" href="index.php?&pg=login">Entrar</a>
              <a class="btn btn-success my-2 my-sm-0" href="index.php?&pg=cadastro">Cadastre-se</a>
            </form>
        <?php } ?>
      </div>
    </nav>