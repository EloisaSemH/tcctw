<!--Rodapé-->
<?php
  switch($_SESSION['logado']){
    case '2':
      $tipo = 2;
      break;
    case '3':
      $tipo = 3;
      break;
    default:
      $tipo = 0;
      break;
  }
?>
<footer class="page-footer mt-3">
  <div style="background-color: #3C4448;">
    <div class="container">
      <div class="row py-4 d-flex align-items-center">
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0 text-white">Italianos em Itu: da imigração à atualidade.</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="container text-center text-md-left mt-2">
    <div class="row mt-3 text-secondary">
      <!-- Sobre -->
      <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
        <h6 class="text-uppercase font-weight-bold text-dark">Sobre</h6>
        <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Site elaborado gratuitamente especialmente para o grupo Italianos em Itu, na intenção de divulgar o livro "Italianos em Itu: da imigração à atualidade".</p>
      </div>
    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-2">
        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold text-dark">Links Úteis</h6>
        <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p><a class="text-secondary" href="#!">Sua conta</a></p>
        <p><a class="text-secondary" href="https://www.facebook.com/pages/category/Nonprofit-Organization/Asilo-Mendicidade-Nossa-Senhora-da-Candel%C3%A1ria-175852372574937/">Asilo Mendicidade N. Sra. da Candelária</a></p>
        <p> <a class="text-secondary" href="#!" title="Em breve!">Compre o ebook!</a></p>
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
  <!-- Copyright -->
  <div  style="background-color: #3C4448;" class="footer-copyright text-center py-3 text-white">Site elaborado por: <a href="#" class="font-weight-bold text-white" target="_blank">Caio Andrade</a>, <a href="http://instagram.com/EloisaSemH" class="font-weight-bold text-white" target="_blank">Eloísa Carvalho</a>, <a href="#" class="font-weight-bold text-white" target="_blank">Enrique Gomes</a> e <a href="#" class="font-weight-bold text-white" target="_blank">Érica Vitória</a>. 2018 - Copyright</div>
  <!-- Copyright -->
</footer>
<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>