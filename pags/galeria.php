<?php //&

    if(isset($_GET['pagina'])){
        $pg = $_GET['pagina'];
    }else{
        ?>
        <script type="text/javascript">
            document.location.href = "index.php?&pg=galeria&pagina=1";
        </script>
        <?php
    }

    require_once ("db/classes/DAO/galeriaDAO.class.php");
    $galeriaDAO = new galeriaDAO();

    $numgaleria = $galeriaDAO->contarFotos();

    $qntporpag = 12;

    $numpags = ceil($numgaleria/$qntporpag);

    $inicio = ($qntporpag*$pg)-$qntporpag;
?>
<div class="container-fluid mt-2">
    <div class="container">
        <div class="row">
            <?php $galeriaDAO->pegarFotos($inicio, $qntporpag); ?>
        </div>
    </div>
</div>