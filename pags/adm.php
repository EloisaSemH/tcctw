<?php
if ($_SESSION['logado'] != 3) {
    ?>
    <script type="text/javascript">
        alert("Desculpe, você não tem permissão para acessar o painel de administração");
        document.location.href = "index.php";
    </script>
    <?php
}

require_once ("db/classes/DAO/usuarioDAO.class.php");
$usuarioDAO = new usuarioDAO();

$dados = $usuarioDAO->pegarInfos($_SESSION['cod_usuario']);

if($dados['us_sexo'] == 'f'){
    $sexo = 'a';
}else{
    $sexo = 'o';    
}

?>

<div class="container mt-4">
    <div class="card">
        <div class="card-body text-justify">
            Página de Administração
            <a href="index.php?&pg=logout"><img src="imgs/sair.png" alt="sair" class="float-right "></a>
        </div>
    </div>
    <div class="card">
        <div class="container text-center text-md-left mt-2">
            <div class="row mt-3 text-secondary">
                <!-- Sobre -->
                <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                <h6><a class="text-uppercase font-weight-bold text-dark" href="?&pg=usuariopg"><?php echo $dados['us_nome']; ?></a></h6>
                <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>Bem vind<?php echo $sexo; ?> a página de administração, Webmaster.</p>
                </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-2">
                <!-- Noticias -->
                <h6 class="text-uppercase font-weight-bold text-dark">Noticias</h6>
                <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p><a class="text-secondary" href="index.php?&pg=noticiaspendentes">Notícias pendentes</a></p>
                <p><a class="text-secondary" href="index.php?&pg=encontrarnoticia">Encontrar notícia</a></p>
            </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-2">
                <!-- Usuários -->
                <h6 class="text-uppercase font-weight-bold text-dark">Usuários</h6>
                <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p><a class="text-secondary" href="index.php?&pg=editarusuario">Editar usuário</a></p>
                </div>
            </div>
        </div>
    </div>
</div>