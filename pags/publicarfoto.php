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
            <form name="publicarfoto" action="" method="post" enctype="multipart/form-data">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Título:</label>
                        <input type="text" name="gal_titulo" required="" class="form-control" max="128"/>
                    </div>
                </div>                          
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Descrição:</label>
                        <input type="text" name="gal_desc" class="form-control" max="256"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Inserir imagem:</label><br/>
                        <input type="file" name="gal_img" class="form-control" accept="image/png, image/jpeg" required=""/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Enviar foto" id="enviar" name="enviar" class="btn btn-outline-dark">
                    </div>
                </div>
				<div class="form-row justify-content-center">
					<div class="form-group col-md-3 text-center">
						<a href="index.php" class="btn btn-link">Voltar</a>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST["enviar"])) {
    require_once ("db/classes/DAO/galeriaDAO.class.php");
    require_once ("db/classes/Entidade/galeria.class.php");
    $galeriaDAO = new galeriaDAO();
    $galeria = new galeria();

    $galeria->setGal_titulo($_POST['gal_titulo']);

    if(isset($_POST['gal_desc'])){
        $galeria->setGal_desc($_POST['gal_desc']);
    }else{
        $noticias->setGal_desc('NULL');
    }
    
    //Fotos
    $extensao = pathinfo ($_FILES['gal_img']['name'], PATHINFO_EXTENSION);
    $extensao = '.' . strtolower ($extensao);

    $data = date("Y/m/d");
    $hora = date("H:i:s");
    $novadata = str_replace("/", "", $data);
    $novahora = str_replace(":", "", $hora);

    $nomeimagem = 'gal' . '_' . $novadata . $novahora . $extensao;
    
    $a = move_uploaded_file($_FILES['gal_img']['tmp_name'], 'img/galeria/' . $nomeimagem);

    $galeria->setGal_img($nomeimagem);

    if ($galeriaDAO->inserirfoto($galeria)) {
        ?>
        <script type="text/javascript">
            alert("Foto enviada com sucesso!");
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            alert("Desculpe, houve um erro ao enviar a foto, contate o Webmaster para resolvê-lo.");
        </script>
        <?php
    }
}
?>