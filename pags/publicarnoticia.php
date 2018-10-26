<?php
if ($_SESSION['logado'] != 2 && $_SESSION['logado'] != 3) {
    ?>
    <script type="text/javascript">
        alert("Faça login para acessar esta página");
        document.location.href = "index.php?&pg=login";
    </script>
    <?php
}

?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="login" action="" method="post" enctype="">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Título:</label>
                        <input type="text" name="not_titulo" required="" class="form-control" max="128"/>
                    </div>
                </div>                          
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Subtitulo:</label>
                        <input type="text" name="not_subtitulo" class="form-control" max="256"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Texto:</label><br/>
                        <textarea name="text_texto" class="form-control" required=""></textarea>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Enviar notícia" id="enviar" name="enviar" class="btn btn-outline-dark">
                    </div>
                </div>
				<!-- <div class="form-row justify-content-center">
					<div class="form-group col-md-3 text-center">
						<a href="index.php?&pg=editarusuario" class="btn btn-link">Voltar</a>
					</div>
				</div> -->
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST["enviar"])) {
    require_once ("db/classes/DAO/usuarioDAO.class.php");
    require_once ("db/classes/Entidade/usuario.class.php");
    $usuarioDAO = new usuarioDAO();
    $usuario = new usuario();

    require_once ("db/classes/DAO/textonoticiasDAO.class.php");
    require_once ("db/classes/Entidade/textonoticias.class.php");
    $textonoticiasDAO = new textonoticiasDAO();
    $textonoticias = new textonoticias();

    require_once ("db/classes/DAO/noticiasDAO.class.php");
    require_once ("db/classes/Entidade/noticias.class.php");
    $noticiasDAO = new noticiasDAO();
    $noticias = new noticias();

    $dados = $usuarioDAO->pegarInfos($_SESSION['cod_usuario']);

    $noticias->setNot_autor($dados['us_nome']);
    $noticias->setNot_titulo($_POST['not_titulo']);
    $noticias->setNot_subtitulo($_POST['not_subtitulo']);

    $textonoticias->setText_texto($_POST['text_texto']);

    if($verifsenha == true){
        $usuario->setUs_nome($_POST["usNome"]);
        $usuario->setUs_email($_POST["usEmail"]);
        $usuario->setUs_sexo($_POST["slSexo"]);
        if ($usuarioDAO->cadastrar($usuario)) {
            $codUsu = $usuarioDAO->consultarCodUsuario($_POST['usEmail']);
            $senha->setSe_senha($_POST['usSenhaRep']);
            $senha->setUs_cod($codUsu);
            if ($senhaDAO->cadastrar($senha)) {
                ?>
                <script type="text/javascript">
                    alert("Cadastrado com sucesso!");
                    document.location.href = "index.php?&pg=login";
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert("Erro ao cadastrar");
                </script>
                <?php
            }
        }
    }else{
        ?>
        <!-- <script type="text/javascript">
            alert("Há algum problema com a senha, por favor, verifique <?php echo $verifsenha; ?>");
        </script> -->
        <?php
}
}
?>
