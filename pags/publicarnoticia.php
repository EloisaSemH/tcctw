<?php
if ($_SESSION['logado'] != 1 && $_SESSION['logado'] != 2 && $_SESSION['logado'] != 3) {
    ?>
    <script type="text/javascript">
        alert("Faça login para acessar esta página");
        document.location.href = "index.php?&pg=login";
    </script>
    <?php
}

require_once ("db/classes/DAO/usuarioDAO.class.php");
$usuarioDAO = new usuarioDAO();

$dados = $usuarioDAO->pegarInfos($_SESSION['cod_usuario']);

if($dados['us_sexo'] == 'f'){
    $sexo = '1';
}elseif($dados['us_sexo'] == 'M'){
    $sexo = '2';    
}else{
    $sexo = 'Outro';
}

$data = date('d/m/Y', strtotime($dados['us_data']));

?>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="login" action="" method="post" enctype="">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Nome:</label>
                        <input type="text" name="us_nome" required="" class="form-control" value="<?php echo $dados['us_nome']; ?>"/>
                    </div>
                </div>                          
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Email:</label>
                        <input type="email" name="us_email" required="" placeholder="nome@email.com" class="form-control" value="<?php echo $dados['us_email']; ?>"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Gênero:</label>
                        <select name="us_sexo">
                        <?php if($sexo == 1){ ?>
                            <option value="f" selected>Feminino</option>                            
                            <option value="m">Masculino</option>                                                        
                        <?php }elseif($sexo == 2){ ?>
                            <option value="f">Feminino</option>                            
                            <option value="m " selected>Masculino</option>                                                        
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Atualizar" id="atualizar" name="atualizar" class="btn btn-outline-dark">
                    </div>
                </div>
				<div class="form-row justify-content-center">
					<div class="form-group col-md-3 text-center">
						<a href="index.php?&pg=editarusuario" class="btn btn-link">Voltar</a>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST["atualizar"])) {
    require_once ("db/classes/Entidade/usuario.class.php");
    $usuario = new usuario();

    $usuario->setUs_cod($dados["us_cod"]);
    $usuario->setUs_nome($_POST["us_nome"]);
    $usuario->setUs_email($_POST["us_email"]);
    $usuario->setUs_sexo($_POST["us_sexo"]);
    $usuario->setUs_tipo($dados["us_tipo"]);

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