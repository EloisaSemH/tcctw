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
            <?php if($_SESSION['logado'] != 0){?>
                <form name="comentarios" action="" method="post" enctype="">
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
                        $comentario->setCom_not_cod($noticia['not_cod']);
                        $comentario->setCom_us_cod($_SESSION['cod_usuario']);
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
                $qnt = $comentarioDAO->contarNumeroComentarios($noticia['not_cod']);
                $retorno = $comentarioDAO->pegarComentarios($noticia['not_cod']);
                echo $qnt;
                print_r($retorno);
// die();
$listaComentario = $comentarioController->RetornarComentario('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                foreach($retorno as $dado){
                    $usu = $usuarioDAO->pegarInfos($dado['com_us_cod']);
                    $dataComent = date("d/m/Y", strtotime($dado['com_data']));
                    $horaComent = date("H:i", strtotime($dado['com_hora']));
                    ?>
                
                    <div class="form-row justify-content-center">
                        <div class="bg-white text-dark"><?= $usu['us_nome']; ?></div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="bg-white text-dark"><?= $dataComent . ' às ' . $horaComent; ?></div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="mb-3 bg-white text-dark"><?= $dado['com_texto']; ?></div>
                    </div>
                    <div class="form-row justify-content-center">
                        <?php if($_SESSION['cod_usuario']  === $usu['us_cod'] || $_SESSION['logado'] == 3){?>
                            <form action="" method="post">
                                <button name="excluirComentario" class="btn btn-danger mb-4"><i class="far fa-trash-alt float-right text-dark"></i></button>
                            <?php if(isset($_POST['excluirComentario'])){ ?>
                                <div class="alert alert-danger justify-content-center" role="alert">
                                    <label>Você realmente deseja excluir o comentário?</label><br/>
                                    <input type="submit" value="Sim" name="excluirComentarioSIM" class="btn btn-outline-danger mb-4">
                                    <input type="submit" value="Cancelar" name="excluirComentarioNAO" class="btn btn-outline-dark mb-4"> 
                                </div>
                            </form>
                            <?php // }
                            //     if(isset($_POST['excluirComentarioSIM'])){
                            //         $comentario->setCom_cod($dado['com_cod']);
                                    
                            //         if ($comentarioDAO->excluirComentario($comentario)) {
                            //             ?>
                                         <script type="text/javascript">
                            //                 alert("Comentário excluido com sucesso!");
                            //                 document.location.href = "#";
                            //             </script>
                                         <?php
                            //         } else {
                            //             ?>
                                         <script type="text/javascript">
                            //                 alert("Desculpe, houve algum erro ao excluido seu comentário.");
                            //             </script>
                                         <?php
                            //         }
                                }
                            }
                            ?>
                    </div>
                <?php } ?>
        </div>
    </div>
</div>