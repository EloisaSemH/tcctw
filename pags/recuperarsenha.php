<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="login" action="index.php?&pg=editandousuario" method="post" enctype="">                            
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Por favor, insira seu email:</label>
                        <input type="email" name="us_email" required="" placeholder="nome@email.com" class="form-control"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Enviar" id="enviar" name="enviar" class="btn btn-outline-dark">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['enviar'])) {
    $mail = $_POST['us_email'];
    $mailCript = base64_encode($_POST['us_email']);
    $mensagem = "Você está recebendo este e-mail porque foi solicitada a alteração de senha para o site Italianos em Itu. Clique no link abaixo para redefinir sua senha. <br/><a href='http://localhost/logSystem/redefinirSenha.php?conta={$mailCript}'>Recuperar Senha</a>";
    
    require_once("pags/enviarEmail.php");

    enviarEmail($_POST['us_email'], "Prezado", "Recuperação de senha", $mensagem);
}
?>