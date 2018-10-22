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
                        <input type="text" name="not_texto" class="form-control" required=""/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Atualizar" id="atualizar" name="atualizar" class="btn btn-outline-dark">
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
if (isset($_POST["atualizar"])) {
    require_once ("db/classes/Entidade/usuario.class.php");
    require_once ("db/classes/DAO/usuarioDAO.class.php");
    $usuarioDAO = new usuarioDAO();
    $usuario = new usuario();

    $dados = $usuarioDAO->pegarInfos($_SESSION['cod_usuario']);

    if ($usuarioDAO->atualizarUsuario($usuario)) {
        ?>
        <script type="text/javascript">
            alert("Usuário atualizado com sucesso!");
            document.location.href = "index.php?&pg=adm";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Desculpe, houve um erro ao atualizar o usuário");
            // document.location.href = "index.php?&pg=editarusuario";
        </script>
        <?php
    }
    

}
?>