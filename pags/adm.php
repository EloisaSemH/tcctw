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

echo 'a '.$usuarioDAO->pegarInfos();

// print_r $dados;

?>

<div class="container mt-4">
    <div class="card">
        <div class="card-body text-justify">
            ADMINISTRADOR
            <a href="index.php?&pg=logout"><img src="imgs/sair.png" alt="sair" class="float-right "></a>
        </div>
    </div>
    <div class="card">
    <div class="container text-center text-md-left mt-2">
      <div class="row mt-3 text-secondary">
        <!-- Sobre -->
        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
          <h6 class="text-uppercase font-weight-bold text-dark">Sobre</h6>
          <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Uma breve e curta descriçao sobre o grupo Italianos em Itu e seu livro.</p>
        </div>
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-2">
          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold text-dark">Links Úteis</h6>
          <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><a class="text-secondary" href="#!">Sua conta</a></p>
          <p><a class="text-secondary" href="https://www.facebook.com/pages/category/Nonprofit-Organization/Asilo-Mendicidade-Nossa-Senhora-da-Candel%C3%A1ria-175852372574937/">Asilo Mendicidade N. Sra. da Candelária</a></p>
        
          <p> <a class="text-secondary" href="#!">nao sei oq colocar</a></p>
      </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-2">
          <!-- Contato -->
          <h6 class="text-uppercase font-weight-bold text-dark">Contato</h6>
          <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><i></i>Endereço</p>
          <p><i></i>Email</p>
          <p> <i></i>Telefone</p>
        </div>
      </div>
    </div>
    </div>
</div>