<?php //&
    if(isset($_GET['id'])){
        $not_cod = $_GET['id'];
    }else{
        ?>
        <script type="text/javascript">
            document.location.href = "index.php?&pg=noticias&pagina=1";
        </script>
        <?php
    }

    require_once ("db/classes/DAO/noticiasDAO.class.php");
    require_once ("db/classes/DAO/textonoticiasDAO.class.php");
    $noticiasDAO = new noticiasDAO();
    $textonoticiasDAO = new textonoticiasDAO();

    require_once ("db/classes/DAO/comentarioDAO.class.php");
    require_once ("db/classes/Entidade/comentario.class.php");
    $comentarioDAO = new comentarioDAO();
    $comentario = new comentario();

    require_once ("db/classes/DAO/usuarioDAO.class.php");
    $usuarioDAO = new usuarioDAO();

    $noticia = $noticiasDAO->pegarNoticia($not_cod);

    $textonoticia = $textonoticiasDAO->pegarTextoNoticia($not_cod);
    $data = date("d/m/Y", strtotime($noticia['not_data']));
    $hora = date("H:i", strtotime($noticia['not_hora']));
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="noticia" action="" method="post" enctype="">
                <div class="form-row justify-content-center">
                    <?php if (file_exists('img/noticias/' . $noticia['not_img']) && !is_null($noticia['not_img'])) { ?>
                        <img src="img/noticias/<?= $noticia['not_img']; ?>" class=""/>
                    <?php } ?>
                </div> 
                <div class="form-row justify-content-center">
                    <div class="p-3 mb-2 bg-white text-dark"><?php if($noticia['not_cat'] == 'not'){
                        echo 'NOTÍCIA';
                    }elseif($noticia['not_cat'] == 'eve'){
                        echo 'EVENTO';
                    } ?></div>                    
                </div>                
                
                <div class="form-row justify-content-center">
                    <div class="p-2 mb-2 bg-white text-dark"><h5><?= $noticia['not_titulo']; ?></h5></div>
                </div>  
                <?php if($noticia['not_subtitulo'] != ''){ ?>
                    <div class="form-row justify-content-center">
                        <div class="p-3 mb-2 bg-white text-dark"><?= $noticia['not_subtitulo']; ?></div>
                    </div>
                <?php } ?>
                <div class="form-row justify-content-center">
                    <div class="bg-white text-dark">Publicado por: <?= $noticia['not_autor']; ?></div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="mb-2 bg-white text-dark"><?= $data . ' às ' . $hora; ?></div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="p-3 mb-2 bg-white text-dark"><?= $textonoticia['text_texto']; ?></div>
                </div>
                
				<div class="form-row justify-content-center">
					<div class="form-group col-md-3 text-center">
						<a href="index.php" class="btn btn-link">Voltar</a>
                        <?php
                            if($_SESSION['logado'] == 2 || $_SESSION['logado'] == 3){
                                echo '<a class="btn btn-link" href="index.php?&pg=editarnoticia&id=' . $not_cod . '">Editar</a>';
                            }
                        ?>
					</div>
				</div>
            </form>
            <?php 
            if(isset($_POST['excluirComentario'])){
                    // $comentario->setCom_cod($_POST['codComent']);
                $comcod = $_POST['codComent'];
                // if ($comentarioDAO->excluirComentario($comcod)) {
                    ?>
                    <script type="text/javascript">
                        txt;
                        var res = confirm("Tem certeza que quer excluir esse comentario?");
                        if(res == true){
                            var txt = 1;                            
                        }else if(res == false){
                        }
                    </script>
                <!-- <form name="comentarioexcluir" action="" method="post" enctype="">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <div class="alert alert-warning" role="alert">Você tem certeza que quer excluir o comentário?<br/>(A ação não poderá ser desfeita)
                            <input type="submit" value="Sim" id="confirmaexcluirSIM" name="confirmaexcluirSIM" class="btn btn-outline-danger mt-1">
                            <input type="submit" value="Cancelar" id="confirmaexcluirNAO" name="confirmaexcluirNAO" class="btn btn-outline-secondary mt-1">
                        </div>
                    </div>
                </div>
                </form> -->
                <?php
                echo $variavelphp = "<script>document.write(txt)</script>";
                
                if($variavelphp == "1"){
                    echo 'pqp';
                    if ($comentarioDAO->excluirComentario($comcod)) {
                        ?>
                        <script type="text/javascript">
                            alert("Comentário excluida com sucesso!");
                            document.location.href = "#";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Desculpe, houve um erro ao comentário a notícia, contate o Webmaster para resolvê-lo. Código: EXCOM01");
                        </script>
                        <?php
                    }
                }
            }

            if($_SESSION['logado'] != 0){?>
                <form name="enviarcomentario" action="" method="post" enctype="">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3">
                            <label>Insira seu comentário:</label><br/>
                            <textarea name="com_texto" class="form-control" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3 text-center">
                            <input type="submit" value="Enviar comentário" id="enviar" name="enviar" class="btn btn-outline-dark">
                        </div>
                    </div>
                </form>
                <?php
                    if(isset($_POST['enviar'])){
                        $autor = $usuarioDAO->pegarInfos($_SESSION['cod_usuario']);

                        $comentario->setCom_not_cod($noticia['not_cod']);
                        $comentario->setCom_us_cod($_SESSION['cod_usuario']);
                        $comentario->setCom_autor($autor['us_nome']);
                        $comentario->setCom_texto($_POST['com_texto']);
                        $comentario->setCom_data(date("Y/m/d"));
                        $comentario->setCom_hora(date("H:i:s"));

                        if ($comentarioDAO->enviarComentario($comentario)) {
                            ?>
                            <script type="text/javascript">
                                alert("Comentário enviado com sucesso!");
                                document.location.href = "#";
                            </script>
                            <?php
                        } else {
                            ?>
                            <script type="text/javascript">
                                alert("Desculpe, houve algum erro ao enviar seu comentário.");
                            </script>
                            <?php
                        }
                    }
            }
            $retorno = $comentarioDAO->pegarComentarios($noticia['not_cod'], $_SESSION['cod_usuario'], $_SESSION['logado']);
            ?>
        </div>
    </div>
</div>