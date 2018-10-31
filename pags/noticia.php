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

    $noticia = $noticiasDAO->pegarNoticia($not_cod);

    $textonoticia = $textonoticiasDAO->pegarTextoNoticia($not_cod);
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="noticia" action="" method="post" enctype="">
                <div class="form-row justify-content-center">
                    <div class="p-3 mb-2 bg-white text-dark"><?php if($noticia['not_cat'] == 'not'){
                        echo 'NOTÍCIA';
                    }elseif($noticia['not_cat'] == 'eve'){
                        echo 'EVENTO';
                    } ?></div>                    
                </div>                
                <div class="form-row justify-content-center">
                    <div class="p-3 mb-2 bg-white text-dark"><?php echo $noticia['not_titulo']; ?></div>
                </div>  
                <div class="form-row justify-content-center">
                    <?php if($noticia['not_subtitulo'] !== '' && $noticia['not_subtitulo'] !== ' ' && $noticia['not_subtitulo'] !== NULL){ ?>
                        <div class="p-3 mb-2 bg-white text-dark"><?php echo $noticia['not_subtitulo'] ?></div>
                    <?php } ?>
                </div>
                <div class="form-row justify-content-center">
                    <div class="p-3 mb-2 bg-white text-dark"><?php echo $textonoticia['text_texto']; ?></div>
                </div>
                
				<div class="form-row justify-content-center">
					<div class="form-group col-md-3 text-center">
						<a href="index.php?&pg=noticias&pagina=1" class="btn btn-link">Voltar</a>
                        
                        <?php
                            if($_SESSION['logado'] == 2 || $_SESSION['logado'] == 3){
                                echo '<a class="btn btn-link" href="#">Editar</a>';
                            }
                        ?>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>